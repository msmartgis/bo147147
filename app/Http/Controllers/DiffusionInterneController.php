<?php

namespace App\Http\Controllers;

use App\DiffusionInterne;
use App\Document;
use App\NatureDiffusion;
use App\PersonnePhysique;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DiffusionInterneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('nom')->get();
        $nature_diffusion = NatureDiffusion::orderBy('nom')->get();
        $responsables = PersonnePhysique::orderBy('nom')->where('service_id', '!=', null)->get();

        return view('diffusion_interne.show.index_diffusion_interne')->with([
            'services' => $services,
            'nature_diffusion' => $nature_diffusion,
            'responsables' => $responsables,
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
        $natures_diffusions = NatureDiffusion::orderBy('nom')->pluck('nom', 'id');
        $services = Service::orderBy('nom')->pluck('nom', 'id');
        $diffusion_interne = new DiffusionInterne();

        return view('diffusion_interne.create.index_create_di')->with([
            'actu_date' => $actu_date,
            'diffusion_interne' => $diffusion_interne,
            'services' => $services,
            'natures_diffusions' => $natures_diffusions,
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

        $diffusion_interne = new DiffusionInterne();

        $diffusion_interne->ref = $request->ref;
        $diffusion_interne->nature_diffusion_id = $request->nature_diffusion;
        $diffusion_interne->date_envoi = $request->date_envoi;
        $diffusion_interne->objet = $request->objet;
        $diffusion_interne->observations = $request->observation;

        $diffusion_interne->save();


        //store documents
        if (isset($request->records_input)) {
            $records = $request->records_input;
            $piece_file_names = array();
            $document_noms =  $request->intitules;
            $refs_array =  $request->ref_piece_input;


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
                    $path = $file->storeAs('diffusion-internes/' . $diffusion_interne->id, $fileNameToStore);
                }
            }


            for ($i = 0; $i < count($records); $i++) {
                $document_diffusion = new Document();

                if ($document_noms[$i] == "") {
                    $document_diffusion->nom_document = "Document sans nom";
                } else {
                    $document_diffusion->nom_document = $document_noms[$i];
                }

                if (count($piece_file_names) > 0) {
                    $document_diffusion->path = $piece_file_names[$i];
                } else {
                    $document_diffusion->path = '';
                }


                $document_diffusion->ref = $refs_array[$i];
                $document_diffusion->diffusion_interne_id = $diffusion_interne->id;

                $document_diffusion->save();
            }
        }


        //services
        if ($request->has('services_ids')) {
            $services_ids =  $request->services_ids;
            $messages = $request->messages;
            for ($i = 0; $i < count($services_ids); $i++) {
                $diffusion_interne->services()->attach($services_ids[$i], ['message' => $messages[$i]]);
            }
        }

        if ($diffusion_interne->save()) {
            return redirect('/diffusions-internes')->with('success', 'Diffusion interne ajoutée avec succès');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DiffusionInterne  $diffusionInterne
     * @return \Illuminate\Http\Response
     */
    public function show(DiffusionInterne $diffusionInterne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DiffusionInterne  $diffusionInterne
     * @return \Illuminate\Http\Response
     */
    public function edit(DiffusionInterne $diffusionInterne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DiffusionInterne  $diffusionInterne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiffusionInterne $diffusionInterne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DiffusionInterne  $diffusionInterne
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiffusionInterne $diffusionInterne)
    {
        //
    }


    public function tousDiffusionInterne(Request $request)
    {
        $diffusions_internes = DiffusionInterne::with('piece', 'services')->withCount('piece')->orderBy('date_envoi', 'desc');

        if ($request->ajax()) {
            $datatables = Datatables::eloquent($diffusions_internes)

                ->addColumn('objet', function ($diffusions_internes) {
                    return $diffusions_internes->objet ? Str::limit($diffusions_internes->objet, 100, '...') : '';
                })


                ->addColumn('pj', function (DiffusionInterne $diffusion_interne) {
                    if ($diffusion_interne->piece()->exists()) {
                        return '<i class="fa fa-paperclip" style="font-size: 20px;color: #1b3398;" data-toggle="tooltip" data-html="true"   data-placement="left" title="Nombre Documents : ' . $diffusion_interne->piece_count . '"></i>';
                    } else {
                        return "";
                    }
                })

                ->addColumn('ref', function ($diffusions_internes) {
                    return '<a  href="diffusions-internes/' . $diffusions_internes->id . '/edit" data-toggle="tooltip" data-html="true"   data-placement="right" title="Objet : ' . $diffusions_internes->objet . '">' . $diffusions_internes->ref . '</a>';
                })

                ->addColumn('checkbox', function ($diffusions_internes) {
                    return '<input style="text-align: center;" type="checkbox" id="diffusionInterneChbx_' . $diffusions_internes->id . '" name="diffusionInterneChbx" class="demande-en-cours-checkbox chk-col-green" value="' . $diffusions_internes->id . '"  data-numero ="' . $diffusions_internes->ref . '" data-id="' . $diffusions_internes->id . '" class="chk-col-green"><label for="diffusionInterneChbx_' . $diffusions_internes->id . '" class="block" ></label>';
                })


                ->rawColumns(['pj', 'checkbox', 'ref']);
        }



        //service
        if ($services = $request->get('services')) {
            if ($services == "all") {
            } else {
                $diffusions_internes->whereHas('services', function ($query) use ($services) {
                    $query->where('services.id', '=', $services);
                });
            }
        }


        //responsable
        if ($responsable = $request->get('responsable')) {
            if ($responsable == "all") {
            } else {
                $diffusions_internes->whereHas('services', function ($query) use ($responsable) {
                    $query->whereHas(
                        'responsables',
                        function ($query) use ($responsable) {
                            $query->where('id', '=', $responsable);
                        }
                    );
                });
            }
        }

        //nature diffusion
        if ($nature_diffusion = $request->get('nature_diffusion')) {
            if ($nature_diffusion == "all") {
            } else {

                $diffusions_internes->whereHas('natureDiffusion', function ($query) use ($nature_diffusion) {
                    $query->where('id', '=', $nature_diffusion);
                });


                return $datatables->make(true);
            }
        }



        return $datatables->make(true);
    }
}
