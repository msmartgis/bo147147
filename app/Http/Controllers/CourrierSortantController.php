<?php

namespace App\Http\Controllers;

use App\Accuse;
use App\CategorieCourrier;
use App\Consigne;
use App\Courrier;
use App\Document;
use App\EtatCourrier;
use App\Historique;
use App\ModeReception;
use App\PersonneMorale;
use App\PersonnePhysique;
use App\Service;
use App\TypeOperation;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CourrierAdded;

class CourrierSortantController extends Controller
{
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
        $categorie_courrier = CategorieCourrier::orderBy('nom')->get();
        return view('courriers.sortants.show_sortant.index_sortant')->with([
            'personne_physiques' => $personne_physiques,
            'personne_morales' => $personne_morales,
            'services' => $services,
            'categorie_courrier' => $categorie_courrier,
            'modes_recpetions' => $modes_recpetions
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
        $categorie_courrier = CategorieCourrier::orderBy('nom')->pluck('nom', 'id');
        $modes_recpetion = ModeReception::orderBy('nom')->pluck('nom', 'id');
        $services = Service::orderBy('nom')->pluck('nom', 'id');
        $personne_physiques = PersonnePhysique::orderBy('nom')->get();
        $personne_morales = PersonneMorale::orderBy('raison_social')->get();
        $courrier = new Courrier();
        return view('courriers.sortants.create.index_create_cs')->with([
            'actu_date' => $actu_date,
            'courrier' => $courrier,
            'services' => $services,
            'personne_physiques' => $personne_physiques,
            'personne_morales' => $personne_morales,
            'categorie_courrier' => $categorie_courrier,
            'modes_recpetion' => $modes_recpetion
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
            'ref' => 'required',
        ]);
        $brouillon_etat =  EtatCourrier::where('nom', 'brouillon')->first();
        $courrier = new Courrier();
        $courrier->type = 'sortant';
        $courrier->ref = $request->ref;
        $courrier->date_envoie = $request->date_envoi;
        $courrier->objet = $request->objet;
        $courrier->etat_id = $brouillon_etat->id;
        $courrier->categorie_courrier_id = $request->categorie_courrier_id;
      

        if (isset($request->courrier_entrant_id)) {
           
            //update courrier entrant 
            $courrier->courrier_entrant_id = $request->courrier_entrant_id;

            if (isset($request->personne_physique_from_entrant_id)) {
                $courrier->personne_physique_id = $request->personne_physique_from_entrant_id;
            }

            if (isset($request->personne_morale_from_entrant_id)) {
                $courrier->personne_morale_id = $request->personne_morale_from_entrant_id;
            }
           
        } else {
        
            //insert destinataire
            //create personne physique
            if ($request->type_destinataire == "personne_physique") {
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

            if ($request->type_destinataire == "personne_morale") {
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
        }

       

        $courrier->save();
        
        if ($courrier->save()) {
            if (isset($request->courrier_entrant_id)) {
                $courrier_entrant_to_update = Courrier::find($request->courrier_entrant_id);
                $courrier_entrant_to_update->courrier_sortant_id = $courrier->id;
                $courrier_entrant_to_update->save();

               
            }
        }


         //services
         if ($request->has('services_ids')) {
            $services_ids =  $request->services_ids;
            $messages = $request->messages;
            for ($i = 0; $i < count($services_ids); $i++) {
                $courrier->services()->attach($services_ids[$i], ['message' => $messages[$i], 'vu' => 0]);
            }
        }


        //store documents
        if (isset($request->types_documents)) {
            $piece_file_names = array();
            $document_types_ids =  $request->types_documents;
            $document_noms =  $request->intitules;
            $document_modes_envoi =  $request->modes_envoi;
            $date_envoi_doc_input =  $request->date_envoi_doc_input;

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
                    $path = $file->storeAs('courriers/sortants/' . $courrier->id, $fileNameToStore);
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
                $document_courrier->mode_reception_id = $document_modes_envoi[$i];
                $document_courrier->mode_reception_id = $document_modes_envoi[$i];
                $document_courrier->date_reception = $date_envoi_doc_input[$i];
                $document_courrier->courrier_id = $courrier->id;
                $document_courrier->save();
            }
        }

      

        //insert accuse envoi
        if (isset($request->date_accuse_envoi)) {
            $accuse_envoi_names = array();

            $date_accuses_envoi = $request->date_accuse_envoi;
            if ($request->hasFile('accuse_envoi_uploads')) {
                $files_accuse =  $request->accuse_envoi_uploads;
                foreach ($files_accuse as $file) {
                    // Get filename with the extension
                    $filenameWithExt = $file->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $file->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                    array_push($accuse_envoi_names, $fileNameToStore);
                    // Upload Image
                    $path = $file->storeAs('courriers/sortants/accuses_envois/' . $courrier->id, $fileNameToStore);
                }
            }


            for ($i = 0; $i < count($date_accuses_envoi); $i++) {
                $accuse_envoi  = new Accuse();
                $accuse_envoi->type = "envoi";
                $accuse_envoi->date = $date_accuses_envoi[$i];
                $accuse_envoi->date = $date_accuses_envoi[$i];
                $accuse_envoi->user_id = Auth::user()->id;
                $accuse_envoi->courrier_id = $courrier->id;

                if (count($accuse_envoi_names) > 0) {
                    $accuse_envoi->path = $accuse_envoi_names[$i];
                } else {
                    $accuse_envoi->path = '';
                }
                $accuse_envoi->save();
            }
        }

        
        if ($courrier->save()) {
            $users_to_notify = User::whereHas('role', function($query){
                $query->where('role_name','president');
            })->get();      
           
            //Notification::send($users_to_notify, new CourrierAdded($courrier));
            //add to history
            $this->addToHistory('create', $courrier->id, Auth::user()->id);
            return redirect('/courriers-sortants')->with('success', 'Courrier ajouté avec succès');
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
        $services = Service::orderBy('nom')->pluck('nom', 'id');
        $courrier = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'remarqueConsigne')->findOrFail($id);
        $categorie_courrier = CategorieCourrier::orderBy('nom')->pluck('nom', 'id');
        $historique = Historique::where('courrier_id', '=', $id)->orderBy('created_at', 'desc')->get();

        $courrier->ref_entrant = '';
        if ($courrier->courrier_entrant_id != null) {
            $courrier_entrant = Courrier::findOrFail($courrier->courrier_entrant_id);
            $courrier->ref_entrant = $courrier_entrant->ref;
        }


        //mark as read notification
        Auth::user()->unreadNotifications->where('data.id', $courrier->id)->markAsRead();

        return  view('courriers.sortants.edit.index_edit_cs')->with([
            'courrier' => $courrier,
            'modes_recpetion' => $modes_recpetion,
            'services' => $services,
            'historique' => $historique,
            'categorie_courrier' => $categorie_courrier,
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
        $document_ids_request_array = [];
        $document_ids_from_db_array = [];
        $document_ids_difference_array = []; //get the documents deleted

        $accuse_reception_ids_request_array = [];
        $accuse_ids_from_db_array = [];
        $accuse_ids_difference_array = [];


        $courrier_to_edit = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'services', 'remarqueConsigne')->findorfail($id);

        $courrier_to_edit->objet = $request->objet;
        $courrier_to_edit->date_envoie = $request->date_envoi;
        $courrier_to_edit->mode_reception_id = $request->mode_reception_id;
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
                    $path = $file->storeAs('courriers/sortants/' . $courrier_to_edit->id, $fileNameToStore);
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
                $document_courrier->courrier_id = $courrier_to_edit->id;
                $document_courrier->save();
            }
        }

        //accuse envoi 
        $still_in_table_accuse = array();
        $accuses_from_database = array();
        $array_diff_accuse = array();

        if (isset($request->accuse_envoi_ids)) {
            $still_in_table_accuse = $request->accuse_envoi_ids;
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
                Storage::delete('courriers/sortants/accuses_envois/' . $id . '/' . $accuse_to_delete->path);
                $accuse_to_delete->delete();
            }
        }


        if (isset($request->date_accuse_envois)) {

            $date_accuse_envois = $request->date_accuse_envois;
            $accuse_file_names = array();


            if ($request->hasFile('accuse_envoi_uploads')) {
                $files =  $request->accuse_envoi_uploads;

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
                    $path = $file->storeAs('courriers/sortants/accuses_envois/' . $courrier_to_edit->id, $fileNameToStore);
                }
            }


            for ($i = 0; $i < count($date_accuse_envois); $i++) {
                $accuse = new Accuse();



                if (count($accuse_file_names) > 0) {
                    $accuse->path = $accuse_file_names[$i];
                } else {
                    $accuse->path = '';
                }

                $accuse->date = $date_accuse_envois[$i];
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
                $courrier_to_edit->services()->attach($services_ids[$i], ['message' => $messages[$i]]);
            }
        }



        $courrier_to_edit->save();

        if ($courrier_to_edit->save()) {
            //add to history
            $this->addToHistory('update', $courrier_to_edit->id, Auth::user()->id);
            return redirect("/courriers-sortants" . "/" . $courrier_to_edit->id . "/edit")->with('success', 'Courrier modifier avec succès');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function createSortant($id)
    {
        $actu_date = Carbon::now()->format('Y-m-d');
        $modes_recpetion = ModeReception::orderBy('nom')->pluck('nom', 'id');
        $services = Service::orderBy('nom')->pluck('nom', 'id');
        $personne_physiques = PersonnePhysique::orderBy('nom')->get();
        $personne_morales = PersonneMorale::orderBy('raison_social')->get();
        $courrier = new Courrier();
        $courrier_entrant = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'services', 'remarqueConsigne')->find($id);
        return view('courriers.sortants.create.index_create_cs')->with([
            'actu_date' => $actu_date,
            'courrier' => $courrier,
            'services' => $services,
            'personne_physiques' => $personne_physiques,
            'personne_morales' => $personne_morales,
            'modes_recpetion' => $modes_recpetion,
            'courrier_entrant' => $courrier_entrant
        ]);
    }

    //validate courrier
    public function validateCourrier(Request $request)
    {
        $courriers_ids = $request->courriers_ids;
        $state_id = $request->state;
        $values = Courrier::whereIn('id', $courriers_ids)->update(['etat_id' => $state_id]);
        if ($values) {
            for ($i = 0; $i < count($courriers_ids); $i++) {
                if ($state_id == "4eb0a1ba-a55e-40f0-bea1-bfc9b21cabc8") { //validate
                    $this->addToHistory('3b2d24db-b718-4425-a820-5630dd2843e1', $courriers_ids[$i], Auth::user()->id);
                }

                if ($state_id == "bfe54fe8-fc87-4fec-aaf0-1cb5beacf858") { //cloturer
                    $this->addToHistory('4a25a0b0-d216-446e-8342-c50272ec4631', $courriers_ids[$i], Auth::user()->id);
                }
            }
        }
        return response()->json();
    }

    public function tousCourrier(Request $request)
    {
        $courriers = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services')->withCount('piece')->where([['type', '=', 'sortant']])->orderBy('created_at', 'desc');

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
                    return '<a  href="courriers-sortants/' . $courriers->id . '/edit" data-toggle="tooltip" data-html="true"   data-placement="right" title="Objet : ' . $courriers->objet . '">' . $courriers->ref . '</a>';
                })

                ->addColumn('categorie', function (Courrier $courrier) {
                    if ($courrier->categorie != null) {
                        return $courrier->categorie->nom;
                    }
                })

                ->addColumn('checkbox', function ($courriers) {
                    return '<input style="text-align: center;" type="checkbox" id="courriersSortantTous_' . $courriers->id . '" name="checkbox_tous" class="demande-en-cours-checkbox chk-col-green" value="' . $courriers->id . '"  data-numero ="' . $courriers->ref . '" data-id="' . $courriers->id . '" class="chk-col-green"><label for="courriersSortantTous_' . $courriers->id . '" class="block" ></label>';
                })

                ->addColumn('etat', function ($courriers) {
                    switch ($courriers->etat->first()->nom) {
                        case 'en_cours':
                            return "<b style='color : #009dc5'>En cours</b>";
                            break;
                        case 'brouillon':
                            return "<b style='color : #7dd8fb'>Brouillon</b>";
                            break;
                        case 'cloturer':
                            return "<b style='color : #9fd037'>Cloturé</b>";
                            break;
                        default:
                            break;
                    }
                })


                ->addColumn('courrier_entrant', function ($courriers) {
                    if ($courriers->courrier_entrant_id  != null) {
                        $courrier_entrant = Courrier::find($courriers->courrier_entrant_id);
                        return '<a  href="courriers-entrants/' . $courrier_entrant->id . '/edit" >' . $courrier_entrant->ref . '</a>';
                    } else {
                        return '';
                    }
                })
                ->rawColumns(['pj', 'checkbox', 'ref', 'etat', 'courrier_entrant']);
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

        //categorie courrier
        if ($categorie_courrier = $request->get('categorie_courrier')) {
            if ($categorie_courrier == "all") {
            } else {
                $courriers->whereHas('categorie', function ($query) use ($categorie_courrier) {
                    $query->where('id', '=', $categorie_courrier);
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


        //avis
        if ($avis = $request->get('avis')) {
            if ($avis == "all") {
            } else {
                $courriers->where('avis', '=', $avis);
            }
        }


        //filter with daterange
        if ($daterange = $request->get('date_envoie')) {           
            $daterange_splite = explode('-', trim($daterange));
            $date_start = $daterange_splite[0];
            $date_start_formatted = date("Y-m-d", strtotime($date_start));
            $date_end = str_replace('/','-',trim($daterange_splite[1]));
            $date_end_formatted = date("Y-m-d", strtotime($date_end));


            $courriers->where([
                ['date_envoie', '>=',$date_start_formatted],
                ['date_envoie', '<=',$date_end_formatted],
            ]);
        }

        return $datatables->make(true);
    }


    public function brouillonCourrier(Request $request)
    {
        $brouillon_etat =  EtatCourrier::where('nom', 'brouillon')->first();
        $courriers = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services')->withCount('piece')->where([['type', '=', 'sortant'], ['etat_id', '=', $brouillon_etat->id]])->orderBy('created_at', 'desc');

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

                ->addColumn('categorie', function (Courrier $courrier) {
                    if ($courrier->categorie != null) {
                        return $courrier->categorie->nom;
                    }
                })

                ->addColumn('ref', function ($courriers) {
                    return '<a  href="courriers-sortants/' . $courriers->id . '/edit" >' . $courriers->ref . '</a>';
                })

                ->addColumn('checkbox', function ($courriers) {
                    return '<input style="text-align: center;" type="checkbox" id="courriersSortantBrouillon_' . $courriers->id . '" name="checkbox_brouillon" class="demande-en-cours-checkbox chk-col-green" value="' . $courriers->id . '"  data-numero ="' . $courriers->ref . '" data-id="' . $courriers->id . '" class="chk-col-green"><label for="courriersSortantBrouillon_' . $courriers->id . '" class="block" ></label>';
                })

                ->addColumn('courrier_entrant', function ($courriers) {
                    if ($courriers->courrier_entrant_id  != null) {
                        $courrier_entrant = Courrier::find($courriers->courrier_entrant_id);
                        return '<a  href="courriers-entrants/' . $courrier_entrant->id . '/edit" >' . $courrier_entrant->ref . '</a>';
                    } else {
                        return '';
                    }
                })
                ->rawColumns(['pj', 'checkbox', 'ref', 'courrier_entrant']);
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


        //categorie courrier
        if ($categorie_courrier = $request->get('categorie_courrier')) {
            if ($categorie_courrier == "all") {
            } else {
                $courriers->whereHas('categorie', function ($query) use ($categorie_courrier) {
                    $query->where('id', '=', $categorie_courrier);
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


        //avis
        if ($avis = $request->get('avis')) {
            if ($avis == "all") {
            } else {
                $courriers->where('avis', '=', $avis);
            }
        }


          //filter with daterange
          if ($daterange = $request->get('date_envoie')) {           
            $daterange_splite = explode('-', trim($daterange));
            $date_start = $daterange_splite[0];
            $date_start_formatted = date("Y-m-d", strtotime($date_start));
            $date_end = str_replace('/','-',trim($daterange_splite[1]));
            $date_end_formatted = date("Y-m-d", strtotime($date_end));


            $courriers->where([
                ['date_envoie', '>=',$date_start_formatted],
                ['date_envoie', '<=',$date_end_formatted],
            ]);
        }

        return $datatables->make(true);
    }


    public function enCoursCourrier(Request $request)
    {
        $en_cours_etat =  EtatCourrier::where('nom', 'en_cours')->first();
        $courriers = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services')->withCount('piece')->where([['type', '=', 'sortant'], ['etat_id', '=', $en_cours_etat->id]])->orderBy('created_at', 'desc');

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
                    return '<a  href="courriers-sortants/' . $courriers->id . '/edit" >' . $courriers->ref . '</a>';
                })

                ->addColumn('categorie', function (Courrier $courrier) {
                    if ($courrier->categorie != null) {
                        return $courrier->categorie->nom;
                    }
                })

                ->addColumn('checkbox', function ($courriers) {
                    return '<input style="text-align: center;" type="checkbox" id="courriersSortantEnCours_' . $courriers->id . '" name="checkbox_en_cours" class="demande-en-cours-checkbox chk-col-green" value="' . $courriers->id . '"  data-numero ="' . $courriers->ref . '" data-id="' . $courriers->id . '" class="chk-col-green"><label for="courriersSortantEnCours_' . $courriers->id . '" class="block" ></label>';
                })



                ->addColumn('courrier_entrant', function ($courriers) {
                    if ($courriers->courrier_entrant_id  != null) {
                        $courrier_entrant = Courrier::find($courriers->courrier_entrant_id);
                        return '<a  href="courriers-entrants/' . $courrier_entrant->id . '/edit" >' . $courrier_entrant->ref . '</a>';
                    } else {
                        return '';
                    }
                })

                ->rawColumns(['pj', 'checkbox', 'ref', 'courrier_entrant']);
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


        //categorie courrier
        if ($categorie_courrier = $request->get('categorie_courrier')) {
            if ($categorie_courrier == "all") {
            } else {
                $courriers->whereHas('categorie', function ($query) use ($categorie_courrier) {
                    $query->where('id', '=', $categorie_courrier);
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


        //avis
        if ($avis = $request->get('avis')) {
            if ($avis == "all") {
            } else {
                $courriers->where('avis', '=', $avis);
            }
        }


         //filter with daterange
         if ($daterange = $request->get('date_envoie')) {           
            $daterange_splite = explode('-', trim($daterange));
            $date_start = $daterange_splite[0];
            $date_start_formatted = date("Y-m-d", strtotime($date_start));
            $date_end = str_replace('/','-',trim($daterange_splite[1]));
            $date_end_formatted = date("Y-m-d", strtotime($date_end));


            $courriers->where([
                ['date_envoie', '>=',$date_start_formatted],
                ['date_envoie', '<=',$date_end_formatted],
            ]);
        }

        return $datatables->make(true);
    }



    public function clotureCourrier(Request $request)
    {
        $cloture_etat =  EtatCourrier::where('nom', 'cloturer')->first();
        $actu_date = Carbon::now()->format('Y-m-d');

        $courriers = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services')->withCount('piece')->where([['type', '=', 'sortant'], ['etat_id', '=', $cloture_etat->id]])->orderBy('created_at', 'desc');

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
                    return '<a  href="courriers-sortants/' . $courriers->id . '/edit" >' . $courriers->ref . '</a>';
                })

                ->addColumn('categorie', function (Courrier $courrier) {
                    if ($courrier->categorie != null) {
                        return $courrier->categorie->nom;
                    }
                })

                ->addColumn('checkbox', function ($courriers) {
                    return '<input style="text-align: center;" type="checkbox" id="courriersSortantCloture_' . $courriers->id . '" name="checkbox_cloture" class="demande-cloture-checkbox chk-col-green" value="' . $courriers->id . '"  data-numero ="' . $courriers->ref . '" data-id="' . $courriers->id . '" class="chk-col-green"><label for="courriersSortantCloture_' . $courriers->id . '" class="block" ></label>';
                })

                ->addColumn('courrier_entrant', function ($courriers) {
                    if ($courriers->courrier_entrant_id  != null) {
                        $courrier_entrant = Courrier::find($courriers->courrier_entrant_id);
                        return '<a  href="courriers-entrants/' . $courrier_entrant->id . '/edit" >' . $courrier_entrant->ref . '</a>';
                    } else {
                        return '';
                    }
                })
                ->rawColumns(['pj', 'checkbox', 'ref', 'courrier_entrant']);
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

        //categorie courrier
        if ($categorie_courrier = $request->get('categorie_courrier')) {
            if ($categorie_courrier == "all") {
            } else {
                $courriers->whereHas('categorie', function ($query) use ($categorie_courrier) {
                    $query->where('id', '=', $categorie_courrier);
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


        //avis
        if ($avis = $request->get('avis')) {
            if ($avis == "all") {
            } else {
                $courriers->where('avis', '=', $avis);
            }
        }


         //filter with daterange
         if ($daterange = $request->get('date_envoie')) {           
            $daterange_splite = explode('-', trim($daterange));
            $date_start = $daterange_splite[0];
            $date_start_formatted = date("Y-m-d", strtotime($date_start));
            $date_end = str_replace('/','-',trim($daterange_splite[1]));
            $date_end_formatted = date("Y-m-d", strtotime($date_end));


            $courriers->where([
                ['date_envoie', '>=',$date_start_formatted],
                ['date_envoie', '<=',$date_end_formatted],
            ]);
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
