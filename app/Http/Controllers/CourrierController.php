<?php

namespace App\Http\Controllers;

use App\Accuse;
use App\CategorieCourrier;
use App\Consigne;
use App\Courrier;
use App\Document;
use App\EtatCourrier;
use App\Events\NewCourrierAddedEvent as EventsNewCourrierAddedEvent;
use App\Events\ChangeCourrierStateEvent as ChangeCourrierStateEvent;
use App\Events\ViewMessageEvent as ViewMessageEvent;
use App\Events\DistributionEvent as DistributionEvent;
use App\Events\ValidateCourrierEvent;
use App\Historique;
use App\Mail\CourrierAddedMail;
use App\ModeReception;
use App\PersonneMorale;
use App\PersonnePhysique;
use App\Priorite;
use App\Service;
use App\User;
use App\TypeOperation;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DataTables;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CourrierAdded;
use App\UserRole;
use Illuminate\Support\Facades\Mail;

class CourrierController extends Controller
{


    public function actionRef()
    {
        $edit = "";
        if (App::isLocale('en')) {
            $edit = "cliquer pour modifier";
        } else {
            $edit = "انقر للتحديث";
        }

        return $edit;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $personne_physiques = PersonnePhysique::orderBy('nom')->where([['nom', '!=', 'null']])->get();
        $personne_morales = PersonneMorale::orderBy('raison_social')->where([['raison_social', '!=', 'null']])->get();
        $services = Service::orderBy('nom')->get();

        $modes_recpetions = ModeReception::orderBy('nom')->get();
        $priorites = Priorite::orderBy('nom')->get();

        $categorie_courrier = CategorieCourrier::orderBy('nom')->get();

        event(new ChangeCourrierStateEvent());

        return view('courriers.entrants.show.index')->with([
            'personne_physiques' => $personne_physiques,
            'personne_morales' => $personne_morales,
            'services' => $services,
            'modes_recpetions' => $modes_recpetions,
            'priorites' => $priorites,
            'categorie_courrier' => $categorie_courrier,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actu_date = Carbon::now()->format('d/m/Y');

        $modes_recpetion = ModeReception::orderBy('nom')->pluck('nom', 'id');
        $priorites = Priorite::orderBy('nom')->pluck('nom', 'id');
        $categorie_courrier = CategorieCourrier::orderBy('nom')->pluck('nom', 'id');
        $services = Service::orderBy('nom')->pluck('nom', 'id');
        $presidential_services = Service::where('ref', 'President')->orWhere('ref', 'DG')->orderBy('nom')->pluck('nom', 'id');
        $personne_physiques = PersonnePhysique::orderBy('nom')->get();
        $personne_morales = PersonneMorale::orderBy('raison_social')->get();
        $courrier = new Courrier();
        return view('courriers.entrants.create.index_create_ce')->with([
            'actu_date' => $actu_date,
            'courrier' => $courrier,
            'services' => $services,
            'personne_physiques' => $personne_physiques,
            'personne_morales' => $personne_morales,
            'modes_recpetion' => $modes_recpetion,
            'categorie_courrier' => $categorie_courrier,
            'presidential_services' => $presidential_services,
            'priorites' => $priorites
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'objet' => 'required',
            'ref' => 'required|unique:courriers,ref',
            'date_reception' => 'required',
            // 'documents_ulpoad_input' => 'required|max:10000|mimes:pdf,png,jpeg'
        ]);

        $courrier = new Courrier();
        $brouillon_etat =  EtatCourrier::where('nom', 'brouillon')->first();
        $courrier->ref = $request->ref;
        $courrier->type = "entrant";
        $courrier->mode_reception_id = $request->mode_reception_id;
        $courrier->date_reception = $request->date_reception;
        $courrier->date_courrier = $request->date_courrier;
        $courrier->objet = $request->objet;

        if (!$request->delai != null) {

            $courrier->delai = $request->delai;
        }

        $courrier->etat_id = $brouillon_etat->id;
        $courrier->priorite_id = $request->priorites_id;
        $courrier->categorie_courrier_id = $request->categorie_courrier_id;

        //insert expediteur
        //create personne physique
        if ($request->type_expediteur == "personne_physique") {
            if ($request->nom_personne_physique == null) {
                $courrier->personne_physique_id = $request->personne_physique_id_from_db;
            } else {
                $personne_physique = new PersonnePhysique();
                $personne_physique->nom = $request->nom_personne_physique;
                $personne_physique->prenom = $request->prenom_personne_physique;
                $personne_physique->cine = $request->cine_personne_physique;
                $personne_physique->adresse = $request->adresse_personne_physique;
                $personne_physique->adresse = $request->adresse_personne_physique;
                $personne_physique->tel_fixe = $request->tel_fixe_personne_physique;
                $personne_physique->tel_mobile = $request->tel_mobile_personne_physique;
                $personne_physique->email = $request->email_personne_physique;

                $personne_physique->save();

                if ($personne_physique->save()) {
                    $courrier->personne_physique_id = $personne_physique->id;
                }
            }
        }

        if ($request->type_expediteur == "personne_morale") {

            if ($request->raison_social == null) {
                $courrier->personne_morale_id = $request->personne_morale_id_from_db;
            } else {
                $personne_morale = new PersonneMorale();
                $personne_morale->raison_social = $request->raison_social;
                $personne_morale->rc = $request->rc;
                $personne_morale->adresse = $request->adresse;
                $personne_morale->tel_fix = $request->tel_fix_personne_morale;
                $personne_morale->tel_mobile = $request->tel_mobile_personne_morale;
                $personne_morale->fax = $request->fax_personne_morale;
                $personne_morale->email = $request->email_personne_morale;

                $personne_morale->save();

                if ($personne_morale->save()) {
                    //insert representant data if exists
                    if ($request->nom_representant != null) {
                        $representant = new PersonnePhysique();

                        $representant->is_represantant = 1;
                        $representant->nom = $request->nom_representant;
                        $representant->prenom = $request->prenom_representant;
                        $representant->cine = $request->cine_representant;
                        $representant->role_en_entreprise = $request->role_representant;
                        $representant->tel_fixe = $request->tel_fix_representant;
                        $representant->tel_mobile = $request->tel_mobile_representant;
                        $representant->email = $request->email_representant;
                        $representant->adresse = $request->adresse_representant;
                        $representant->personne_morale_id = $personne_morale->id;

                        $representant->save();
                    }

                    $courrier->personne_morale_id = $personne_morale->id;
                }
            }
        }


        $courrier->save();
        //services
        if ($request->has('services_ids')) {
            $services_ids =  $request->services_ids;
            for ($i = 0; $i < count($services_ids); $i++) {
                $courrier->services()->attach($services_ids[$i]);
            }
        }


        //store documents
        if (isset($request->types_documents)) {
            $piece_file_names = array();
            $document_types_ids =  $request->types_documents;
            $document_noms =  $request->intitules;
            $document_modes_receptions =  $request->modes_receptions;
            $date_reception_doc_input =  $request->date_reception_doc_input;



            if ($request->hasFile('documents_ulpoad_input')) {
                $files =  $request->documents_ulpoad_input;
                foreach ($files as $file) {
                    // Get filename with the extension
                    $filenameWithExt = $file->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $file->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                    array_push($piece_file_names, $fileNameToStore);
                    // Upload Image
                    $path = $file->storeAs('courriers/entrants/' . $courrier->id, $fileNameToStore);
                }
            }


            for ($i = 0; $i < count($document_types_ids); $i++) {
                $document_courrier = new Document();

                if ($document_noms[$i] == "") {
                    $document_courrier->nom_document = "Document sans nom";
                } else {
                    $document_courrier->nom_document = $document_noms[$i];
                }

                if (count($piece_file_names) > 0) {
                    $document_courrier->path = $piece_file_names[$i];
                } else {
                    $document_courrier->path = '';
                }

                $document_courrier->type_document_id = $document_types_ids[$i];
                $document_courrier->mode_reception_id = $document_modes_receptions[$i];
                $document_courrier->date_reception = $date_reception_doc_input[$i];
                $document_courrier->courrier_id = $courrier->id;

                $document_courrier->save();
            }
        }

        // if ($request->hasfile('date_reception_doc_input')) {
        //     $path = $request->file('avatar')->store('avatars');
        // }


        //insert accuse reception
        if (isset($request->date_accuse_receptions)) {
            $accuse_reception_names = array();

            $date_accuses_receptions = $request->date_accuse_receptions;

            if ($request->hasFile('accuse_reception_uploads')) {
                $files_accuse =  $request->accuse_reception_uploads;
                foreach ($files_accuse as $file) {
                    // Get filename with the extension
                    $filenameWithExt = $file->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $file->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                    array_push($accuse_reception_names, $fileNameToStore);
                    // Upload Image
                    $path = $file->storeAs('courriers/entrants/accuses_receptions/' . $courrier->id, $fileNameToStore);
                }
            }


            for ($i = 0; $i < count($date_accuses_receptions); $i++) {
                $accuse_reception  = new Accuse();

                $accuse_reception->type = "reception";
                $accuse_reception->date = $date_accuses_receptions[$i];
                $accuse_reception->date = $date_accuses_receptions[$i];
                $accuse_reception->user_id = Auth::user()->id;
                $accuse_reception->courrier_id = $courrier->id;

                if (count($accuse_reception_names) > 0) {
                    $accuse_reception->path = $accuse_reception_names[$i];
                } else {
                    $accuse_reception->path = '';
                }

                $accuse_reception->save();
            }
        }

        if ($courrier->save()) {

            // $users_to_notify = User::whereHas('role', function($query){
            //     $query->where('role_name','president');
            // })->first();

            //Mail::to($users_to_notify->email)->send(new CourrierAddedMail());


            //call event for adding new courrier
            event(new EventsNewCourrierAddedEvent($courrier, "create"));


            return redirect('/courriers-entrants')->with('success', 'Courrier ajouté avec succès');
        } else {
            return "error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $modes_recpetion = ModeReception::orderBy('nom')->pluck('nom', 'id');
        $priorites = Priorite::orderBy('nom')->pluck('nom', 'id');
        $categorie_courrier = CategorieCourrier::orderBy('nom')->pluck('nom', 'id');
        $services = Service::orderBy('nom')->pluck('nom', 'id');
        $courrier = Courrier::with('personnePhysique', 'personneMorale', 'remarqueConsigne')->findOrFail($id);
        $courrier->ref_sortant = '';

        if ($courrier->courrier_sortant_id != null) {
            $courrier_sortant = Courrier::findOrFail($courrier->courrier_sortant_id);
            $courrier->ref_sortant = $courrier_sortant->ref;
        }

        $historique = Historique::where('courrier_id', '=', $id)->orderBy('created_at', 'desc')->get();

        //mark as read notification
        Auth::user()->unreadNotifications->where('data.element_id', $courrier->id)->markAsRead();

        //pivot message mark asread
        $service =  Auth::user()->service;
        // return $courrier->services->find($service->id)->pivot->vu;
        event(new ViewMessageEvent($courrier, $service));

        return  view('courriers.entrants.edit.index_edit_ce')->with([
            'courrier' => $courrier,
            'modes_recpetion' => $modes_recpetion,
            'priorites' => $priorites,
            'categorie_courrier' => $categorie_courrier,
            'services' => $services,
            'historique' => $historique,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $action = "ajouter";
        $type_element = "Courrier Entrant";

        $document_ids_request_array = [];
        $document_ids_from_db_array = [];
        $document_ids_difference_array = []; //get the documents deleted

        $accuse_reception_ids_request_array = [];
        $accuse_ids_from_db_array = [];
        $accuse_ids_difference_array = [];


        $courrier_to_edit = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'remarqueConsigne')->findorfail($id);

        $courrier_to_edit->objet = $request->objet;
        $courrier_to_edit->date_reception = $request->date_reception;
        $courrier_to_edit->date_courrier = $request->date_courrier;
        $courrier_to_edit->delai = $request->delai;
        $courrier_to_edit->mode_reception_id = $request->mode_reception_id;
        $courrier_to_edit->priorite_id = $request->priorite_id;
        $courrier_to_edit->categorie_courrier_id = $request->categorie_courrier_id;

        //update personne physique
        if (isset($request->personne_physique_id)) {
            $personne_phys_to_edit = PersonnePhysique::findorfail($request->personne_physique_id);
            $personne_phys_to_edit->nom = $request->nom_personne_physique;
            $personne_phys_to_edit->prenom = $request->prenom_personne_physique;
            $personne_phys_to_edit->cine = $request->cine_personne_physique;
            $personne_phys_to_edit->adresse = $request->adresse_personne_physique;
            $personne_phys_to_edit->tel_mobile = $request->tel_mobile_personne_physique;
            $personne_phys_to_edit->email = $request->email_personne_physique;
            $personne_phys_to_edit->save();
        }


        //personne morale and representant data
        if (isset($request->personne_morale_id)) {
            $personne_morale_to_edit = PersonneMorale::findorfail($request->personne_morale_id);
            $personne_morale_to_edit->raison_social = $request->raison_social_personne_morale;
            $personne_morale_to_edit->rc = $request->rc_personne_morale;
            $personne_morale_to_edit->adresse = $request->adresse_personne_morale;
            $personne_morale_to_edit->tel_fix = $request->tel_fix_personne_morale;
            $personne_morale_to_edit->tel_mobile = $request->tel_mobile_personne_morale;
            $personne_morale_to_edit->fax = $request->fax_personne_morale;
            $personne_morale_to_edit->email = $request->email_personne_morale;
            $personne_morale_to_edit->save();


            //representant
            if (isset($request->representant_id)) {
                $representant = PersonnePhysique::findorfail($request->representant_id);
            } else {
                $representant = new PersonnePhysique();
            }

            $representant->nom = $request->nom_representant;
            $representant->prenom = $request->prenom_representant;
            $representant->cine = $request->cine_representant;
            $representant->adresse = $request->adresse_representant;
            $representant->tel_mobile = $request->tel_mobile_representant;
            $representant->email = $request->email_representant;
            $representant->is_represantant = 1;
            $representant->personne_morale_id = $request->personne_morale_id;
            $representant->save();
        }



        //manage docuemnt fournis
        $documents_from_database = array();
        $array_diff = array();
        $still_in_table = array();
        if (isset($request->documents_ids)) {
            $still_in_table = $request->documents_ids;
        }



        foreach ($courrier_to_edit->piece as $item) {
            array_push($documents_from_database, $item->id);
        }


        if (count($still_in_table)  == 0) {
            $array_diff = $documents_from_database;
        } else {
            $array_diff = (array) array_diff($documents_from_database, $still_in_table);
        }


        if (count($array_diff) > 0) {
            foreach ($array_diff as $item) {
                $document_to_delete = Document::find($item);

                Storage::delete('courriers/sortants/' . $id . '/' . $document_to_delete->path);
                $document_to_delete->delete();
            }
        }


        if (isset($request->types_documents_fournis)) {
            $piece_file_names = array();
            $document_types_ids =  $request->types_documents_fournis;
            $document_noms =  $request->intitules_documents_fournis;
            $document_modes_receptions =  $request->modes_receptions_documents_fournis;
            $date_reception_doc_input =  $request->date_reception_documents_fournis;

            if ($request->hasFile('documents_ulpoad_documents_fournis')) {
                $files =  $request->documents_ulpoad_documents_fournis;
                foreach ($files as $file) {
                    // Get filename with the extension
                    $filenameWithExt = $file->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $file->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                    array_push($piece_file_names, $fileNameToStore);
                    // Upload Image
                    $path = $file->storeAs('courriers/entrants/' . $courrier_to_edit->id, $fileNameToStore);
                }
            }

            for ($i = 0; $i < count($document_types_ids); $i++) {
                $document_courrier = new Document();

                if ($document_noms[$i] == "") {
                    $document_courrier->nom_document = "Document sans nom";
                } else {
                    $document_courrier->nom_document = $document_noms[$i];
                }

                if (count($piece_file_names) > 0) {
                    $document_courrier->path = $piece_file_names[$i];
                } else {
                    $document_courrier->path = '';
                }

                $document_courrier->type_document_id = $document_types_ids[$i];
                $document_courrier->mode_reception_id = $document_modes_receptions[$i];
                $document_courrier->date_reception = $date_reception_doc_input[$i];
                $document_courrier->courrier_id = $courrier_to_edit->id;
                $document_courrier->save();
            }
        }


        //accuse reception 
        $accuse_reception_ids_request_array = $request->accuse_reception_ids;


        foreach ($courrier_to_edit->accuse as $accuse) {
            array_push($accuse_ids_from_db_array, $accuse->id);
        }


        if (isset($request->accuse_reception_ids)) {
            $accuse_ids_difference_array = array_diff($accuse_ids_from_db_array, $accuse_reception_ids_request_array);



            if (count($accuse_ids_difference_array) > 0) {
                foreach ($accuse_ids_difference_array as  $accuse_to_remove) {

                    $accuse_to_delete = Accuse::find($accuse_to_remove);

                    if ($accuse_to_delete->path != null) {

                        File::delete(storage_path() . '/courriers/entrants/accuses_receptions/' . $courrier_to_edit->id . '/' . $accuse_to_delete->path);
                        //Storage::disk('local')->delete('courriers/entrants/' . $courrier_to_edit . '/' . $piece_to_delete->path);
                    }

                    $accuse_to_delete->delete();
                }
            }
        }
        //added new accuse
        $still_in_table_accuse = array();
        $accuses_from_database = array();
        $array_diff_accuse = array();

        if (isset($request->accuse_reception_ids)) {
            $still_in_table_accuse = $request->accuse_reception_ids;
        }



        foreach ($courrier_to_edit->accuse as $item) {
            array_push($accuses_from_database, $item->id);
        }


        if (count($still_in_table_accuse)  == 0) {
            $array_diff_accuse = $accuses_from_database;
        } else {
            $array_diff_accuse = (array) array_diff($accuses_from_database, $still_in_table_accuse);
        }


        if (count($array_diff_accuse) > 0) {
            foreach ($array_diff_accuse as $item) {
                $accuse_to_delete = Accuse::find($item);
                Storage::delete('courriers/entrants/accuses_receptions/' . $id . '/' . $accuse_to_delete->path);
                $accuse_to_delete->delete();
            }
        }


        if (isset($request->date_accuse_receptions)) {
            $date_accuse_receptions = $request->date_accuse_receptions;
            $accuse_file_names = array();


            if ($request->hasFile('accuse_reception_uploads')) {
                $files =  $request->accuse_reception_uploads;

                foreach ($files as $file) {

                    // Get filename with the extension
                    $filenameWithExt = $file->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $file->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                    array_push($accuse_file_names, $fileNameToStore);
                    // Upload Image
                    $path = $file->storeAs('courriers/entrants/accuses_receptions/' . $courrier_to_edit->id, $fileNameToStore);
                }
            }


            for ($i = 0; $i < count($date_accuse_receptions); $i++) {
                $accuse = new Accuse();
                if (count($accuse_file_names) > 0) {
                    $accuse->path = $accuse_file_names[$i];
                } else {
                    $accuse->path = '';
                }

                $accuse->date = $date_accuse_receptions[$i];
                $accuse->user_id = Auth::user()->id;
                $accuse->courrier_id = $courrier_to_edit->id;


                $accuse->save();
            }
        }


        //services
        if (isset($request->service_input_id)) {
            $courrier_to_edit->services()->detach();
            $services_ids =  $request->service_input_id;
            $messages = $request->messages;
            for ($i = 0; $i < count($services_ids); $i++) {
                $courrier_to_edit->services()->attach($services_ids[$i], ['message' => $messages[$i], 'vu' => 0]);
                event(new DistributionEvent(Auth::user()->username, $action, $type_element, $courrier_to_edit->id, $services_ids));
            }
        }


        //remarques et consignes
        //detach all elements first 
        $courrier_to_edit->remarqueConsigne()->delete();

        if (isset($request->consignes_added_message)) {

            $consigne_array = $request->consignes_added_message;

            foreach ($consigne_array as $csgn) {
                $consigne = new Consigne();
                $consigne->message = $csgn;
                $consigne->user_id = Auth::user()->id;
                $consigne->courrier_id = $courrier_to_edit->id;
                $consigne->save();
            }
        }



        $courrier_to_edit->save();

        if ($courrier_to_edit->save()) {
            //add to history
            $this->addToHistory('update', $courrier_to_edit->id, Auth::user()->id);
            return redirect("/courriers-entrants" . "/" . $courrier_to_edit->id . "/edit")->with('success', 'Courrier modifié avec succès');
        }
    }



    public function deleteCourrier(Request $request)
    {
        $courrier_ids_array = $request->ids;
        $courrier_to_delete = Courrier::whereIn('id', $courrier_ids_array);
        if ($courrier_to_delete->delete()) {
            return response()->json('success');
        } else {
            return response()->json('error');
        }
    }



    //validate courrier
    public function validateCourrier(Request $request)
    {
        $type_element = "Courrier Entrant";
        $services_ids = [];
        $action = "";
        $courriers_ids = $request->courriers_ids;
        $state_name = $request->state;
        $state_db = EtatCourrier::where('nom', $request->state)->first();
        $values = Courrier::whereIn('id', $courriers_ids)->update(['etat_id' => $state_db->id]);
        //$president_role = UserRole::where('role_name','president')->first();


        if ($state_name == "en_cours") { //validate
            $action = "ajouter";
            //$this->addToHistory('validate', $courriers_ids[$i], Auth::user()->id);                    
        }

        if ($state_name == "cloturer") { //cloturer
            $action = "cloturer";
            //$this->addToHistory('cloture', $courriers_ids[$i], Auth::user()->id);                   
        }

        for ($i = 0; $i < count($courriers_ids); $i++) {
            $courrier = Courrier::find($courriers_ids[$i]);

            $services_courrier =  $courrier->services;

            foreach ($services_courrier as $service) {
                array_push($services_ids, $service->id);
            }

            $bo_service = Service::where('ref', 'B.O')->first();

            array_push($services_ids, $bo_service->id);

            event(new ValidateCourrierEvent(Auth::user()->username, Auth::user()->id, $action, $type_element, $courriers_ids[$i], $services_ids));
        }


        return response()->json();
    }


    public function tousCourrier(Request $request)
    {
        $courriers = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'priorite')->withCount('piece')->where([['type', '=', 'entrant']])->orderBy('created_at', 'desc');

        if ($request->ajax()) {
            $datatables = Datatables::eloquent($courriers)

                ->addColumn('objet', function ($courriers) {
                    return $courriers->objet ? Str::limit($courriers->objet, 100, '...') : '';
                })

                ->addColumn('expediteur', function (Courrier $courrier) {
                    if ($courrier->personnePhysique != null) {
                        return $courrier->personnePhysique->full_name;
                    }


                    if ($courrier->personneMorale != null) {
                        return $courrier->personneMorale->raison_sociale;
                    }

                    if ($courrier->personneMorale == null && $courrier->personnePhysique == null) {
                        return "";
                    }
                })

                ->addColumn('pj', function (Courrier $courrier) {
                    if ($courrier->piece()->exists()) {
                        return '<i class="fa fa-paperclip" style="font-size: 20px;color: #1b3398;" data-toggle="tooltip" data-html="true"   data-placement="left" title="Nombre Documents : ' . $courrier->piece_count . '"></i>';
                    } else {
                        return "";
                    }
                })

                ->addColumn('ref', function ($courriers) {

                    return '<a class="ref-show"  href="courriers-entrants/' . $courriers->id . '/edit" data-toggle="tooltip" data-html="true"   data-placement="right" title="' . $this->actionRef() . '">' . $courriers->ref . '</a>';
                })
                ->addColumn('priorite', function (Courrier $courrier) {
                    if ($courrier->priorite != null) {
                        return $courrier->priorite->priorite_icon;
                    }
                })
                ->addColumn('categorie', function (Courrier $courrier) {
                    if ($courrier->categorie != null) {
                        return $courrier->categorie->nom;
                    }
                })

                ->addColumn('checkbox', function ($courriers) {
                    return '<input style="text-align: center;" type="checkbox" id="courriersEntrantTous_' . $courriers->id . '" name="checkbox_tous" class="demande-en-cours-checkbox chk-col-green" value="' . $courriers->id . '"  data-numero ="' . $courriers->ref . '" data-id="' . $courriers->id . '" class="chk-col-green"><label for="courriersEntrantTous_' . $courriers->id . '" class="block" ></label>';
                })

                ->addColumn('etat', function (Courrier $courrier) {
                    return $courrier->etat->etat_nom;
                    // switch ($courriers->etat->nom) {
                    //     case 'en_cours':
                    //         if (App::isLocale('en')) {
                    //             return "<b style='color : #009dc5'>En cours</b>";
                    //         } else {
                    //             return "<b style='color : #009dc5'>الحالية</b>";
                    //         }


                    //         break;
                    //     case 'brouillon':
                    //         if (App::isLocale('en')) {
                    //             return "<b style='color : #7dd8fb'>Brouillon</b>";
                    //         } else {
                    //             return "<b style='color : #009dc5'>مسودة</b>";
                    //         }
                    //         break;
                    //     case 'en_retard':
                    //         return "<b style='color : #ff3200'>En retard</b>";
                    //         break;
                    //     case 'cloturer':
                    //         return "<b style='color : #9fd037'>Cloturé</b>";
                    //         break;

                    //     default:
                    //         return '';
                    //         break;
                    // }
                })
                ->rawColumns(['pj', 'checkbox', 'ref', 'etat', 'priorite']);
        }


        //nature experediteur
        if ($nature_expediteur = $request->get('nature_expediteur')) {
            if ($nature_expediteur == "all") {
            } else {
                if ($nature_expediteur == "personne_morale") {
                    $courriers->where('personne_morale_id', '!=', null);
                } else {
                    $courriers->where('personne_physique_id', '!=', null);
                }
            }
        }

        //expediteur
        if ($expediteur = $request->get('expediteur')) {
            if ($expediteur == "all") {
            } else {
                if (Str::contains($expediteur, 'personnePhysique')) {
                    $courriers->whereHas('personnePhysique', function ($query) use ($expediteur) {
                        $query->where('id', '=', Str::substr($expediteur, 17));
                    });
                }


                if (Str::contains($expediteur, 'personneMorale')) {
                    $courriers->whereHas('personneMorale', function ($query) use ($expediteur) {
                        $query->where('id', '=', Str::substr($expediteur, 15));
                    });
                }
            }
        }

        //service
        if ($services = $request->get('services')) {
            if ($services == "all") {
            } else {
                $courriers->whereHas('services', function ($query) use ($services) {
                    $query->where('services.id', '=', $services);
                });
            }
        }


        //mode reception
        if ($mode_reception = $request->get('mode_reception')) {
            if ($mode_reception == "all") {
            } else {

                $courriers->whereHas('modeReception', function ($query) use ($mode_reception) {
                    $query->where('id', '=', $mode_reception);
                });
            }
        }


        //priorite
        if ($priorite = $request->get('priorite')) {
            if ($priorite == "all") {
            } else {

                $courriers->whereHas('priorite', function ($query) use ($priorite) {
                    $query->where('id', '=', $priorite);
                });
            }
        }


        //categorie courrier
        if ($categorie_courrier = $request->get('categorie_courrier')) {
            if ($categorie_courrier == "all") {
            } else {
                $courriers->whereHas('categorie', function ($query) use ($categorie_courrier) {
                    $query->where('id', '=', $categorie_courrier);
                });
            }
        }


        //avis
        if ($avis = $request->get('avis')) {
            if ($avis == "all") {
            } else {
                $courriers->where('avis', '=', $avis);
            }
        }



        //filter with daterange
        if ($daterange = $request->get('date_reception')) {
            $daterange_splite = explode('-', trim($daterange));
            $date_start = $daterange_splite[0];
            $date_start_formatted = date("Y-m-d", strtotime($date_start));
            $date_end = str_replace('/', '-', trim($daterange_splite[1]));
            $date_end_formatted = date("Y-m-d", strtotime($date_end));


            $courriers->where([
                ['date_reception', '>=', $date_start_formatted],
                ['date_reception', '<=', $date_end_formatted],
            ]);
        }



        return $datatables->make(true);
    }


    public function brouillonCourrier(Request $request)
    {
        $brouillon_etat =  EtatCourrier::where('nom', 'brouillon')->first();

        $courriers = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'priorite', 'etat')->withCount('piece')->where([['type', '=', 'entrant'], ['etat_id', '=', $brouillon_etat->id]])->orderBy('created_at', 'desc');

        // return $courriers;
        if ($request->ajax()) {
            $datatables = Datatables::eloquent($courriers)

                ->addColumn('objet', function ($courriers) {
                    return $courriers->objet ? Str::limit($courriers->objet, 100, '...') : '';
                })

                ->addColumn('expediteur', function (Courrier $courrier) {
                    if ($courrier->personnePhysique != null) {
                        return $courrier->personnePhysique->full_name;
                    }


                    if ($courrier->personneMorale != null) {
                        return $courrier->personneMorale->raison_sociale;
                    }

                    if ($courrier->personneMorale == null && $courrier->personnePhysique == null) {
                        return "";
                    }
                })

                ->addColumn('pj', function (Courrier $courrier) {
                    if ($courrier->piece()->exists()) {
                        return '<i class="fa fa-paperclip" style="font-size: 20px;color: #1b3398;" data-toggle="tooltip" data-html="true"   data-placement="left" title="Nombre Documents : ' . $courrier->piece_count . '"></i>';
                    } else {
                        return "";
                    }
                })

                ->addColumn('priorite', function (Courrier $courrier) {
                    if ($courrier->priorite != null) {
                        return $courrier->priorite->priorite_icon;
                    }
                })

                ->addColumn('categorie', function (Courrier $courrier) {
                    if ($courrier->categorie != null) {
                        return $courrier->categorie->nom;
                    }
                })

                ->addColumn('ref', function ($courriers) {
                    return '<a class="ref-show"  href="courriers-entrants/' . $courriers->id . '/edit" data-toggle="tooltip" data-html="true"   data-placement="right" title="' . $this->actionRef() . '">' . $courriers->ref . '</a>';
                })

                ->addColumn('checkbox', function ($courriers) {
                    return '<input style="text-align: center;" type="checkbox" id="courriersEntrantBrouillon_' . $courriers->id . '" name="checkbox_brouillon" class="demande-en-cours-checkbox chk-col-green" value="' . $courriers->id . '"  data-numero ="' . $courriers->ref . '" data-id="' . $courriers->id . '" class="chk-col-green"><label for="courriersEntrantBrouillon_' . $courriers->id . '" class="block" ></label>';
                })
                ->rawColumns(['pj', 'checkbox', 'ref', 'priorite']);
        }


        //nature experediteur
        if ($nature_expediteur = $request->get('nature_expediteur')) {
            if ($nature_expediteur == "all") {
            } else {
                if ($nature_expediteur == "personne_morale") {
                    $courriers->where('personne_morale_id', '!=', null);
                } else {
                    $courriers->where('personne_physique_id', '!=', null);
                }
            }
        }

        //expediteur
        if ($expediteur = $request->get('expediteur')) {
            if ($expediteur == "all") {
            } else {
                if (Str::contains($expediteur, 'personnePhysique')) {
                    $courriers->whereHas('personnePhysique', function ($query) use ($expediteur) {
                        $query->where('id', '=', Str::substr($expediteur, 17));
                    });
                }


                if (Str::contains($expediteur, 'personneMorale')) {
                    $courriers->whereHas('personneMorale', function ($query) use ($expediteur) {
                        $query->where('id', '=', Str::substr($expediteur, 15));
                    });
                }
            }
        }

        //service
        if ($services = $request->get('services')) {
            if ($services == "all") {
            } else {

                $courriers->whereHas('services', function ($query) use ($services) {
                    $query->where('services.id', '=', $services);
                });
            }
        }


        //mode reception
        if ($mode_reception = $request->get('mode_reception')) {
            if ($mode_reception == "all") {
            } else {

                $courriers->whereHas('modeReception', function ($query) use ($mode_reception) {
                    $query->where('id', '=', $mode_reception);
                });
            }
        }


        //priorite
        if ($priorite = $request->get('priorite')) {
            if ($priorite == "all") {
            } else {
                $courriers->whereHas('priorite', function ($query) use ($priorite) {
                    $query->where('id', '=', $priorite);
                });
            }
        }


        //categorie courrier
        if ($categorie_courrier = $request->get('categorie_courrier')) {
            if ($categorie_courrier == "all") {
            } else {
                $courriers->whereHas('categorie', function ($query) use ($categorie_courrier) {
                    $query->where('id', '=', $categorie_courrier);
                });
            }
        }


        //filter with daterange
        if ($daterange = $request->get('date_reception')) {

            $daterange_splite = explode('-', trim($daterange));
            $date_start = $daterange_splite[0];
            $date_start_formatted = date("Y-m-d", strtotime($date_start));
            $date_end = str_replace('/', '-', trim($daterange_splite[1]));
            $date_end_formatted = date("Y-m-d", strtotime($date_end));


            $courriers->where([
                ['date_reception', '>=', $date_start_formatted],
                ['date_reception', '<=', $date_end_formatted],
            ]);
        }


        return $datatables->make(true);
    }


    public function enCoursCourrier(Request $request)
    {
        $en_cours_etat =  EtatCourrier::where('nom', 'en_cours')->first();
        $actu_date = Carbon::now()->format('Y-m-d');
        $courriers = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'priorite')->withCount('piece')->where([['type', '=', 'entrant'], ['etat_id', '=', $en_cours_etat->id]])->orderBy('created_at', 'desc');

        if ($request->ajax()) {
            $datatables = Datatables::eloquent($courriers)

                ->addColumn('objet', function ($courriers) {
                    return $courriers->objet ? Str::limit($courriers->objet, 100, '...') : '';
                })

                ->addColumn('expediteur', function (Courrier $courrier) {
                    if ($courrier->personnePhysique != null) {
                        return $courrier->personnePhysique->full_name;
                    }


                    if ($courrier->personneMorale != null) {
                        return $courrier->personneMorale->raison_sociale;
                    }

                    if ($courrier->personneMorale == null && $courrier->personnePhysique == null) {
                        return "";
                    }
                })

                ->addColumn('pj', function (Courrier $courrier) {
                    if ($courrier->piece()->exists()) {
                        return '<i class="fa fa-paperclip" style="font-size: 20px;color: #1b3398;" data-toggle="tooltip" data-html="true"   data-placement="left" title="Nombre Documents : ' . $courrier->piece_count . '"></i>';
                    } else {
                        return "";
                    }
                })

                ->addColumn('ref', function ($courriers) {
                    return '<a class="ref-show"  href="courriers-entrants/' . $courriers->id . '/edit" data-toggle="tooltip" data-html="true"   data-placement="right" title="' . $this->actionRef() . '">' . $courriers->ref . '</a>';
                })

                ->addColumn('priorite', function (Courrier $courrier) {
                    if ($courrier->priorite != null) {
                        return $courrier->priorite->priorite_icon;
                    }
                })

                ->addColumn('categorie', function (Courrier $courrier) {
                    if ($courrier->categorie != null) {
                        return $courrier->categorie->nom;
                    }
                })

                ->addColumn('courrier_sortant', function ($courriers) {
                    if ($courriers->courrier_sortant_id  != null) {
                        $courrier_sortant = Courrier::find($courriers->courrier_sortant_id);
                        return '<a  href="courriers-sortants/' . $courrier_sortant->id . '/edit" >' . $courrier_sortant->ref . '</a>';
                    } else {
                        return '';
                    }
                })

                ->addColumn('checkbox', function ($courriers) {
                    return '<input style="text-align: center;" type="checkbox" id="courriersEntrantEnCours_' . $courriers->id . '" name="checkbox_en_cours" class="demande-en-cours-checkbox chk-col-green" value="' . $courriers->id . '"  data-numero ="' . $courriers->ref . '" data-id="' . $courriers->id . '" class="chk-col-green"><label for="courriersEntrantEnCours_' . $courriers->id . '" class="block" ></label>';
                })
                ->rawColumns(['pj', 'checkbox', 'ref', 'courrier_sortant', 'priorite']);
        }


        //nature experediteur
        if ($nature_expediteur = $request->get('nature_expediteur')) {
            if ($nature_expediteur == "all") {
            } else {
                if ($nature_expediteur == "personne_morale") {
                    $courriers->where('personne_morale_id', '!=', null);
                } else {
                    $courriers->where('personne_physique_id', '!=', null);
                }
            }
        }

        //expediteur
        if ($expediteur = $request->get('expediteur')) {
            if ($expediteur == "all") {
            } else {
                if (Str::contains($expediteur, 'personnePhysique')) {
                    $courriers->whereHas('personnePhysique', function ($query) use ($expediteur) {
                        $query->where('id', '=', Str::substr($expediteur, 17));
                    });
                }


                if (Str::contains($expediteur, 'personneMorale')) {
                    $courriers->whereHas('personneMorale', function ($query) use ($expediteur) {
                        $query->where('id', '=', Str::substr($expediteur, 15));
                    });
                }
            }
        }

        //service
        if ($services = $request->get('services')) {
            if ($services == "all") {
            } else {

                $courriers->whereHas('services', function ($query) use ($services) {
                    $query->where('services.id', '=', $services);
                });
            }
        }


        //mode reception
        if ($mode_reception = $request->get('mode_reception')) {
            if ($mode_reception == "all") {
            } else {

                $courriers->whereHas('modeReception', function ($query) use ($mode_reception) {
                    $query->where('id', '=', $mode_reception);
                });
            }
        }

        //priorite
        if ($priorite = $request->get('priorite')) {
            if ($priorite == "all") {
            } else {

                $courriers->whereHas('priorite', function ($query) use ($priorite) {
                    $query->where('id', '=', $priorite);
                });
            }
        }

        //categorie courrier
        if ($categorie_courrier = $request->get('categorie_courrier')) {
            if ($categorie_courrier == "all") {
            } else {
                $courriers->whereHas('categorie', function ($query) use ($categorie_courrier) {
                    $query->where('id', '=', $categorie_courrier);
                });
            }
        }


        //filter with daterange
        if ($daterange = $request->get('date_reception')) {

            $daterange_splite = explode('-', trim($daterange));
            $date_start = $daterange_splite[0];
            $date_start_formatted = date("Y-m-d", strtotime($date_start));
            $date_end = str_replace('/', '-', trim($daterange_splite[1]));
            $date_end_formatted = date("Y-m-d", strtotime($date_end));


            $courriers->where([
                ['date_reception', '>=', $date_start_formatted],
                ['date_reception', '<=', $date_end_formatted],
            ]);
        }


        //avis
        if ($avis = $request->get('avis')) {
            if ($avis == "all") {
            } else {
                $courriers->where('avis', '=', $avis);
            }
        }

        return $datatables->make(true);
    }


    public function enRetardCourrier(Request $request)
    {
        $en_retard_etat =  EtatCourrier::where('nom', 'en_retard')->first();
        $actu_date = Carbon::now()->format('Y-m-d');

        $courriers = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'priorite')->withCount('piece')->where([['etat_id', '=', $en_retard_etat->id]])->orderBy('created_at', 'desc');

        if ($request->ajax()) {
            $datatables = Datatables::eloquent($courriers)

                ->addColumn('objet', function ($courriers) {
                    return $courriers->objet ? Str::limit($courriers->objet, 100, '...') : '';
                })

                ->addColumn('expediteur', function (Courrier $courrier) {
                    if ($courrier->personnePhysique != null) {
                        return $courrier->personnePhysique->full_name;
                    }


                    if ($courrier->personneMorale != null) {
                        return $courrier->personneMorale->raison_sociale;
                    }

                    if ($courrier->personneMorale == null && $courrier->personnePhysique == null) {
                        return "";
                    }
                })

                ->addColumn('pj', function (Courrier $courrier) {
                    if ($courrier->piece()->exists()) {
                        return '<i class="fa fa-paperclip" style="font-size: 20px;color: #1b3398;" data-toggle="tooltip" data-html="true"   data-placement="left" title="Nombre Documents : ' . $courrier->piece_count . '"></i>';
                    } else {
                        return "";
                    }
                })

                ->addColumn('priorite', function (Courrier $courrier) {
                    if ($courrier->priorite != null) {
                        return $courrier->priorite->priorite_icon;
                    }
                })

                ->addColumn('categorie', function (Courrier $courrier) {
                    if ($courrier->categorie != null) {
                        return $courrier->categorie->nom;
                    }
                })


                ->addColumn('ref', function ($courriers) {
                    return '<a  class="ref-show" href="courriers-entrants/' . $courriers->id . '/edit" data-toggle="tooltip" data-html="true"   data-placement="right" title="' . $this->actionRef() . '">' . $courriers->ref . '</a>';
                })

                ->addColumn('checkbox', function ($courriers) {
                    return '<input style="text-align: center;" type="checkbox" id="courriersEntrantEnRetard_' . $courriers->id . '" name="checkbox_en_retard" class="demande-en-retard-checkbox chk-col-green" value="' . $courriers->id . '"  data-numero ="' . $courriers->ref . '" data-id="' . $courriers->id . '" class="chk-col-green"><label for="courriersEntrantEnRetard_' . $courriers->id . '" class="block" ></label>';
                })
                ->rawColumns(['pj', 'checkbox', 'ref', 'priorite']);
        }


        //nature experediteur
        if ($nature_expediteur = $request->get('nature_expediteur')) {
            if ($nature_expediteur == "all") {
            } else {
                if ($nature_expediteur == "personne_morale") {
                    $courriers->where('personne_morale_id', '!=', null);
                } else {
                    $courriers->where('personne_physique_id', '!=', null);
                }
            }
        }

        //expediteur
        if ($expediteur = $request->get('expediteur')) {
            if ($expediteur == "all") {
            } else {
                if (Str::contains($expediteur, 'personnePhysique')) {
                    $courriers->whereHas('personnePhysique', function ($query) use ($expediteur) {
                        $query->where('id', '=', Str::substr($expediteur, 17));
                    });
                }


                if (Str::contains($expediteur, 'personneMorale')) {
                    $courriers->whereHas('personneMorale', function ($query) use ($expediteur) {
                        $query->where('id', '=', Str::substr($expediteur, 15));
                    });
                }
            }
        }

        //service
        if ($services = $request->get('services')) {
            if ($services == "all") {
            } else {

                $courriers->whereHas('services', function ($query) use ($services) {
                    $query->where('services.id', '=', $services);
                });
            }
        }


        //mode reception
        if ($mode_reception = $request->get('mode_reception')) {
            if ($mode_reception == "all") {
            } else {

                $courriers->whereHas('modeReception', function ($query) use ($mode_reception) {
                    $query->where('id', '=', $mode_reception);
                });
            }
        }

        //priorite
        if ($priorite = $request->get('priorite')) {
            if ($priorite == "all") {
            } else {

                $courriers->whereHas('priorite', function ($query) use ($priorite) {
                    $query->where('id', '=', $priorite);
                });
            }
        }


        //categorie courrier
        if ($categorie_courrier = $request->get('categorie_courrier')) {
            if ($categorie_courrier == "all") {
            } else {
                $courriers->whereHas('categorie', function ($query) use ($categorie_courrier) {
                    $query->where('id', '=', $categorie_courrier);
                });
            }
        }


        //filter with daterange
        if ($daterange = $request->get('date_reception')) {

            $daterange_splite = explode('-', trim($daterange));
            $date_start = $daterange_splite[0];
            $date_start_formatted = date("Y-m-d", strtotime($date_start));
            $date_end = str_replace('/', '-', trim($daterange_splite[1]));
            $date_end_formatted = date("Y-m-d", strtotime($date_end));


            $courriers->where([
                ['date_reception', '>=', $date_start_formatted],
                ['date_reception', '<=', $date_end_formatted],
            ]);
        }


        //avis
        if ($avis = $request->get('avis')) {
            if ($avis == "all") {
            } else {
                $courriers->where('avis', '=', $avis);
            }
        }

        return $datatables->make(true);
    }



    public function clotureCourrier(Request $request)
    {
        $actu_date = Carbon::now()->format('Y-m-d');
        $cloture_etat =  EtatCourrier::where('nom', 'cloturer')->first();

        $courriers = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'priorite')->withCount('piece')->where([['type', '=', 'entrant'], ['etat_id', '=', $cloture_etat->id]])->orderBy('created_at', 'desc');

        if ($request->ajax()) {
            $datatables = Datatables::eloquent($courriers)

                ->addColumn('objet', function ($courriers) {
                    return $courriers->objet ? Str::limit($courriers->objet, 100, '...') : '';
                })

                ->addColumn('expediteur', function (Courrier $courrier) {
                    if ($courrier->personnePhysique != null) {
                        return $courrier->personnePhysique->full_name;
                    }


                    if ($courrier->personneMorale != null) {
                        return $courrier->personneMorale->raison_sociale;
                    }

                    if ($courrier->personneMorale == null && $courrier->personnePhysique == null) {
                        return "";
                    }
                })

                ->addColumn('pj', function (Courrier $courrier) {
                    if ($courrier->piece()->exists()) {
                        return '<i class="fa fa-paperclip" style="font-size: 20px;color: #1b3398;" data-toggle="tooltip" data-html="true"   data-placement="left" title="Nombre Documents : ' . $courrier->piece_count . '"></i>';
                    } else {
                        return "";
                    }
                })

                ->addColumn('priorite', function (Courrier $courrier) {
                    if ($courrier->priorite != null) {
                        return $courrier->priorite->priorite_icon;
                    }
                })

                ->addColumn('categorie', function (Courrier $courrier) {
                    if ($courrier->categorie != null) {
                        return $courrier->categorie->nom;
                    }
                })

                ->addColumn('ref', function ($courriers) {
                    return '<a  class="ref-show" href="courriers-entrants/' . $courriers->id . '/edit" data-toggle="tooltip" data-html="true"   data-placement="right" title="' . $this->actionRef() . '">' . $courriers->ref . '</a>';
                })

                ->addColumn('checkbox', function ($courriers) {
                    return '<input style="text-align: center;" type="checkbox" id="courriersEntrantCloture_' . $courriers->id . '" name="checkbox_cloture" class="demande-cloture-checkbox chk-col-green" value="' . $courriers->id . '"  data-numero ="' . $courriers->ref . '" data-id="' . $courriers->id . '" class="chk-col-green"><label for="courriersEntrantCloture_' . $courriers->id . '" class="block" ></label>';
                })

                ->addColumn('courrier_sortant', function ($courriers) {
                    if ($courriers->courrier_sortant_id  != null) {
                        $courrier_sortant = Courrier::find($courriers->courrier_sortant_id);
                        return '<a  href="courriers-sortants/' . $courrier_sortant->id . '/edit" >' . $courrier_sortant->ref . '</a>';
                    } else {
                        return '';
                    }
                })
                ->rawColumns(['pj', 'checkbox', 'ref', 'courrier_sortant', 'priorite']);
        }


        //nature experediteur
        if ($nature_expediteur = $request->get('nature_expediteur')) {
            if ($nature_expediteur == "all") {
            } else {
                if ($nature_expediteur == "personne_morale") {
                    $courriers->where('personne_morale_id', '!=', null);
                } else {
                    $courriers->where('personne_physique_id', '!=', null);
                }
            }
        }

        //expediteur
        if ($expediteur = $request->get('expediteur')) {
            if ($expediteur == "all") {
            } else {
                if (Str::contains($expediteur, 'personnePhysique')) {
                    $courriers->whereHas('personnePhysique', function ($query) use ($expediteur) {
                        $query->where('id', '=', Str::substr($expediteur, 17));
                    });
                }


                if (Str::contains($expediteur, 'personneMorale')) {
                    $courriers->whereHas('personneMorale', function ($query) use ($expediteur) {
                        $query->where('id', '=', Str::substr($expediteur, 15));
                    });
                }
            }
        }

        //service
        if ($services = $request->get('services')) {
            if ($services == "all") {
            } else {

                $courriers->whereHas('services', function ($query) use ($services) {
                    $query->where('services.id', '=', $services);
                });
            }
        }


        //mode reception
        if ($mode_reception = $request->get('mode_reception')) {
            if ($mode_reception == "all") {
            } else {

                $courriers->whereHas('modeReception', function ($query) use ($mode_reception) {
                    $query->where('id', '=', $mode_reception);
                });
            }
        }


        //priorite
        if ($priorite = $request->get('priorite')) {
            if ($priorite == "all") {
            } else {

                $courriers->whereHas('priorite', function ($query) use ($priorite) {
                    $query->where('id', '=', $priorite);
                });
            }
        }


        //categorie courrier
        if ($categorie_courrier = $request->get('categorie_courrier')) {
            if ($categorie_courrier == "all") {
            } else {
                $courriers->whereHas('categorie', function ($query) use ($categorie_courrier) {
                    $query->where('id', '=', $categorie_courrier);
                });
            }
        }


        //filter with daterange
        if ($daterange = $request->get('date_reception')) {

            $daterange_splite = explode('-', trim($daterange));
            $date_start = $daterange_splite[0];
            $date_start_formatted = date("Y-m-d", strtotime($date_start));
            $date_end = str_replace('/', '-', trim($daterange_splite[1]));
            $date_end_formatted = date("Y-m-d", strtotime($date_end));


            $courriers->where([
                ['date_reception', '>=', $date_start_formatted],
                ['date_reception', '<=', $date_end_formatted],
            ]);
        }


        //avis
        if ($avis = $request->get('avis')) {
            if ($avis == "all") {
            } else {
                $courriers->where('avis', '=', $avis);
            }
        }

        return $datatables->make(true);
    }


    public function addToHistory($type_operation, $courrier_id, $user_id)
    {
        $new_history = new Historique();
        $operation = TypeOperation::where('nom', $type_operation)->first();

        $new_history->type_operation_id = $operation->id;
        $new_history->courrier_id = $courrier_id;
        $new_history->user_id = $user_id;

        $new_history->save();
    }
}
