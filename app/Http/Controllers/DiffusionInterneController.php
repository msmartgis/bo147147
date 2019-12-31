<?php

namespace App\Http\Controllers;

use App\DiffusionInterne;
use App\Document;
use App\NatureDiffusion;
use App\PersonnePhysique;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        return "fffff";
        //store documents
        // if (isset($request->records)) {
        //     $records = $request->records;
        //     return $records;
        //     $piece_file_names = array();
        //     $document_noms =  $request->intitules;
        //     $refs_array =  $request->ref;


        //     if ($request->hasFile('documents_ulpoad_input')) {
        //         $files =  $request->documents_ulpoad_input;
        //         foreach ($files as $file) {
        //             // Get filename with the extension
        //             $filenameWithExt = $file->getClientOriginalName();
        //             // Get just filename
        //             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //             // Get just ext
        //             $extension = $file->getClientOriginalExtension();
        //             // Filename to store
        //             $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        //             array_push($piece_file_names, $fileNameToStore);
        //             // Upload Image
        //             $path = $file->storeAs('diffusion-internes/' . $diffusion_interne->id, $fileNameToStore);
        //         }
        //     }


        //     for ($i = 0; $i < count($records); $i++) {
        //         $document_diffusion = new Document();

        //         if ($document_noms[$i] == "") {
        //             $document_diffusion->nom_document = "Document sans nom";
        //         } else {
        //             $document_diffusion->nom_document = $document_noms[$i];
        //         }

        //         if (count($piece_file_names) > 0) {
        //             $document_diffusion->path = $piece_file_names[$i];
        //         } else {
        //             $document_diffusion->path = '';
        //         }


        //         $document_diffusion->ref = $refs_array[$i];
        //         $document_diffusion->diffusion_interne_id = $diffusion_interne->id;

        //         $document_diffusion->save();
        //     }
        // }

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
}
