<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function fileDownload(Request $request)
    {
        $file_name = $request->file_name;
        $directory = $request->directory;

        $local_path = '';



        $id =  $request->id;
        if (Storage::exists($local_path . $id . '/' . $file_name)) {
            return Storage::download($local_path . $id . '/' . $file_name);
        } else {
            return Redirect::back()->with('success', 'Fichier non trouvé');
        }
    }
}
