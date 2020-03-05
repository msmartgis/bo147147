<?php

namespace App\Http\Controllers;

use App\Courrier;
use App\EtatCourrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use DocxMerge\DocxMerge;

class RegistreController extends Controller
{   

    public function registreCourrierEntrant(Request $request)
    {
            $brouill_etat = EtatCourrier::where('nom','=','brouillon')->first();
            $courriers = Courrier::where([['type','entrant'],['etat_id','!=',$brouill_etat->id]])->get();
            $files= array();

            $array_couuriers = [];
		
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('docx/courriers/registre courrier entrant.docx');

            foreach($courriers as $courrier)
            {
                array_push($array_couuriers,
                [
                 'NUMERO' => $courrier->ref,
                 'DATE_RECEPTION' =>  $courrier->date_reception,
                 'OBJET' => $courrier->objet,
                 'EXPEDITEUR' => $courrier->ref,
                 'REF' => $courrier->ref,
                 'SORTANTS' => $courrier->ref,
                 'SERVICES' => $courrier->ref,
                 ]);                
            }
            $templateProcessor->cloneRowAndSetValues('NUMERO', $array_couuriers );

			
			$filename= $courrier->ref;
			$filename=str_replace("/","_",$filename).'.docx';
            $templateProcessor->saveAs('docx/courriers/'.$filename);
            $file = public_path()."/docx/courriers/".$filename;           
			array_push($files,$file);			
			
			//return FacadeResponse::download($file, $filename,$headers)->deleteFileAfterSend(true);
			
			
		    //return 'https://view.officeapps.live.com/op/embed.aspx?src='."/fiches/demandes/".$filename.".docx";
           // return redirect()->away('https://view.officeapps.live.com/op/embed.aspx?src='."/fiches/demandes/".$filename.".docx");
		
		
		$result_doc='docx/courriers/registre_courrier.docx';
		$result_doc_name='fiche_de_demande.docx';
		$dm = new DocxMerge();
		$dm->merge($files, $result_doc);
		foreach($files as $doc)
		{
			unlink($doc);
		}
		chmod($result_doc,0666); 
		return view('document.index')->with([           
            'is_mobile' => false,
			'file_path'=>$result_doc."?t=".time() 
        ]);
		//return FacadeResponse::download($result_doc, $result_doc_name,$headers)->deleteFileAfterSend(false);                 
    }
}
