<?php

namespace App\Http\Controllers;

use App\Accuse;
use App\Consigne;
use App\Courrier;
use App\Document;
use App\ModeReception;
use App\PersonneMorale;
use App\PersonnePhysique;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class CourrierController extends Controller
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
        return view('courriers.entrants.show.index')->with([
            'personne_physiques' => $personne_physiques,
            'personne_morales' => $personne_morales,
            'services' => $services,
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
        $actu_date = Carbon::now()->format('Y-m-d');

        $modes_recpetion = ModeReception::orderBy('nom')->pluck('nom', 'id');
        $services = Service::orderBy('nom')->pluck('nom', 'id');
        $personne_physiques = PersonnePhysique::orderBy('nom')->get();
        $personne_morales = PersonneMorale::orderBy('raison_social')->get();
        $courrier = new Courrier();
        return view('courriers.entrants.create.index_create_ce')->with([
            'actu_date' => $actu_date,
            'courrier' => $courrier,
            'services' => $services,
            'personne_physiques' => $personne_physiques,
            'personne_morales' => $personne_morales,
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
        $courrier = new Courrier();

        $courrier->ref = $request->ref;
        $courrier->mode_reception_id = $request->mode_reception_id;
        $courrier->date_reception = $request->date_reception;
        $courrier->objet = $request->objet;
        $courrier->delai = $request->delai;




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
            $messages = $request->messages;
            for ($i = 0; $i < count($services_ids); $i++) {
                $courrier->services()->attach($services_ids[$i], ['message' => $messages[$i]]);
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
        $services = Service::orderBy('nom')->pluck('nom', 'id');
        $courrier = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'remarqueConsigne')->findOrFail($id);
        return  view('courriers.entrants.edit.index_edit_ce')->with([
            'courrier' => $courrier,
            'modes_recpetion' => $modes_recpetion,
            'services' => $services
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


        $courrier_to_edit = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'remarqueConsigne')->findorfail($id);

        $courrier_to_edit->objet = $request->objet;
        $courrier_to_edit->date_reception = $request->date_reception;
        $courrier_to_edit->delai = $request->delai;
        $courrier_to_edit->mode_reception_id = $request->mode_reception_id;

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
        $document_ids_request_array = $request->documents_ids;

        foreach ($courrier_to_edit->piece as $piece) {
            array_push($document_ids_from_db_array, $piece->id);
        }

        if (isset($request->documents_ids)) {
            $document_ids_difference_array = array_diff($document_ids_from_db_array, $document_ids_request_array);

            if (count($document_ids_difference_array) > 0) {
                foreach ($document_ids_difference_array as  $doc_to_remove) {

                    $piece_to_delete = Document::find($doc_to_remove);

                    if ($piece_to_delete->path != null) {

                        File::delete(storage_path() . '/courriers/entrants/' . $courrier_to_edit->id . '/' . $piece_to_delete->path);
                        //Storage::disk('local')->delete('courriers/entrants/' . $courrier_to_edit . '/' . $piece_to_delete->path);
                    }

                    $piece_to_delete->delete();
                }
            }



            //add the freshly added files
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
            if (isset($request->date_accuse_receptions)) {
                $piece_file_names = array();
                $date_accuse_receptions =  $request->date_accuse_receptions;

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

                        array_push($piece_file_names, $fileNameToStore);
                        // Upload Image
                        $path = $file->storeAs('courriers/entrants/accuses_reception' . $courrier_to_edit->id, $fileNameToStore);
                    }
                }


                for ($i = 0; $i < count($date_accuse_receptions); $i++) {
                    $accuse_reception = new Accuse();



                    if (count($piece_file_names) > 0) {
                        $accuse_reception->path = $piece_file_names[$i];
                    } else {
                        $accuse_reception->path = '';
                    }

                    $accuse_reception->date = $date_accuse_receptions[$i];
                    $accuse_reception->user_id = Auth::user()->id;
                    $accuse_reception->courrier_id = $courrier_to_edit->id;

                    $accuse_reception->save();
                }
            }


            //services
            $services_ids_array = [];
            $messages_array = [];
            // if ($request->has('service_input_id')) {

            //     array_push($services_ids_array, $request->service_input_id);

            //     array_push($messages_array, $request->messages);

            //     for ($i = 0; $i < count($services_ids_array); $i++) {
            //         $courrier_to_edit->services()->attach($services_ids_array[$i], ['message' => $messages_array[$i]]);
            //     }
            // }


            // array_push($services_ids_array, $request->service_input_id);
            // array_push($messages_array, $request->messages);



            if (isset($request->service_input_id)) {
                $services_ids =  $request->service_input_id;
                $messages = $request->messages;

                $pivotData = array_fill(0, count($services_ids), ['message' => $messages[0], 'vu' => 0]);

                $syncData  = array_combine($services_ids, $pivotData);

                //$data_to_sync = array_combine($services_ids, $messages);

                $courrier_to_edit->services()->sync($syncData);
            } else {
                $courrier_to_edit->services()->detach();
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
                return redirect("/courriers-entrants" . "/" . $courrier_to_edit->id . "/edit")->with('success', 'Demande modifier avec succès');
            }
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


    //validate courrier
    public function validateCourrier(Request $request)
    {
        $courriers_ids = $request->courriers_ids;
        $state_id = $request->state;
        $values = Courrier::whereIn('id', $courriers_ids)->update(['etat_id' => $state_id]);
        return response()->json();
    }


    public function tousCourrier(Request $request)
    {
        $courriers = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services')->withCount('piece')->where([['type', '=', 'entrant']])->orderBy('date_reception', 'desc');

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
                    return '<a  href="courriers-entrants/' . $courriers->id . '/edit" data-toggle="tooltip" data-html="true"   data-placement="right" title="Objet : ' . $courriers->objet . '">' . $courriers->ref . '</a>';
                })

                ->addColumn('checkbox', function ($courriers) {
                    return '<input style="text-align: center;" type="checkbox" id="courriersEntrantTous_' . $courriers->id . '" name="checkbox_tous" class="demande-en-cours-checkbox chk-col-green" value="' . $courriers->id . '"  data-numero ="' . $courriers->ref . '" data-id="' . $courriers->id . '" class="chk-col-green"><label for="courriersEntrantTous_' . $courriers->id . '" class="block" ></label>';
                })
                ->rawColumns(['pj', 'checkbox', 'ref']);
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


        //avis
        if ($avis = $request->get('avis')) {
            if ($avis == "all") {
            } else {
                $courriers->where('avis', '=', $avis);
            }
        }

        return $datatables->make(true);
    }


    public function brouillonCourrier(Request $request)
    {
        $courriers = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services')->withCount('piece')->where([['type', '=', 'entrant'], ['etat_id', '=', 'de4d5fe6-a384-4df0-abeb-6f953f4102f4']])->orderBy('date_reception', 'desc');

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

                ->addColumn('ref', function ($courriers) {
                    return '<a  href="courriers-entrants/' . $courriers->id . '/edit" >' . $courriers->ref . '</a>';
                })

                ->addColumn('checkbox', function ($courriers) {
                    return '<input style="text-align: center;" type="checkbox" id="courriersEntrantBrouillon_' . $courriers->id . '" name="checkbox_brouillon" class="demande-en-cours-checkbox chk-col-green" value="' . $courriers->id . '"  data-numero ="' . $courriers->ref . '" data-id="' . $courriers->id . '" class="chk-col-green"><label for="courriersEntrantBrouillon_' . $courriers->id . '" class="block" ></label>';
                })
                ->rawColumns(['pj', 'checkbox', 'ref']);
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


        //avis
        if ($avis = $request->get('avis')) {
            if ($avis == "all") {
            } else {
                $courriers->where('avis', '=', $avis);
            }
        }

        return $datatables->make(true);
    }


    public function enCoursCourrier(Request $request)
    {
        $courriers = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services')->withCount('piece')->where([['type', '=', 'entrant'], ['etat_id', '=', '4eb0a1ba-a55e-40f0-bea1-bfc9b21cabc8']])->orderBy('date_reception', 'desc');

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
                    return '<a  href="courriers-entrants/' . $courriers->id . '/edit" >' . $courriers->ref . '</a>';
                })

                ->addColumn('checkbox', function ($courriers) {
                    return '<input style="text-align: center;" type="checkbox" id="courriersEntrantEnCours_' . $courriers->id . '" name="checkbox_en_cours" class="demande-en-cours-checkbox chk-col-green" value="' . $courriers->id . '"  data-numero ="' . $courriers->ref . '" data-id="' . $courriers->id . '" class="chk-col-green"><label for="courriersEntrantEnCours_' . $courriers->id . '" class="block" ></label>';
                })
                ->rawColumns(['pj', 'checkbox', 'ref']);
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
        $actu_date = Carbon::now()->format('Y-m-d');

        $courriers = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services')->withCount('piece')->where([['type', '=', 'entrant'], ['delai', '>', $actu_date]])->orderBy('date_reception', 'desc');

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
                    return '<a  href="courriers-entrants/' . $courriers->id . '/edit" >' . $courriers->ref . '</a>';
                })

                ->addColumn('checkbox', function ($courriers) {
                    return '<input style="text-align: center;" type="checkbox" id="courriersEntrantEnRetard_' . $courriers->id . '" name="checkbox_en_retard" class="demande-en-retard-checkbox chk-col-green" value="' . $courriers->id . '"  data-numero ="' . $courriers->ref . '" data-id="' . $courriers->id . '" class="chk-col-green"><label for="courriersEntrantEnRetard_' . $courriers->id . '" class="block" ></label>';
                })
                ->rawColumns(['pj', 'checkbox', 'ref']);
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

        $courriers = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services')->withCount('piece')->where([['type', '=', 'entrant'], ['etat_id', '=', 'bfe54fe8-fc87-4fec-aaf0-1cb5beacf858']])->orderBy('date_reception', 'desc');

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
                    return '<a  href="courriers-entrants/' . $courriers->id . '/edit" >' . $courriers->ref . '</a>';
                })

                ->addColumn('checkbox', function ($courriers) {
                    return '<input style="text-align: center;" type="checkbox" id="courriersEntrantCloture_' . $courriers->id . '" name="checkbox_cloture" class="demande-cloture-checkbox chk-col-green" value="' . $courriers->id . '"  data-numero ="' . $courriers->ref . '" data-id="' . $courriers->id . '" class="chk-col-green"><label for="courriersEntrantCloture_' . $courriers->id . '" class="block" ></label>';
                })
                ->rawColumns(['pj', 'checkbox', 'ref']);
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


        //avis
        if ($avis = $request->get('avis')) {
            if ($avis == "all") {
            } else {
                $courriers->where('avis', '=', $avis);
            }
        }

        return $datatables->make(true);
    }
}
