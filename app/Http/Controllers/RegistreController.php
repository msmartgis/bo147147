<?php

namespace App\Http\Controllers;

use App\Courrier;
use App\EtatCourrier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use DocxMerge\DocxMerge;

class RegistreController extends Controller
{   

    public function registreCourrierEntrant(Request $request)
    {
        $actu_year = Carbon::now()->year;
        $daterange_courrier = $request->date_reception_tous_daterange;

        $daterange_splite = explode('-', trim($daterange_courrier));
        $date_start = $daterange_splite[0];
        $date_start_formatted = date("Y-m-d", strtotime($date_start));
        $date_end = str_replace('/','-',trim($daterange_splite[1]));
        $date_end_formatted = date("Y-m-d", strtotime($date_end));



        $brouill_etat = EtatCourrier::where('nom','=','brouillon')->first();
        $courriers = Courrier::where([['type','entrant'],['etat_id','!=',$brouill_etat->id],['date_reception','>=',$date_start_formatted],['date_reception','<=',$date_end_formatted]])->get();
        $files= array();

        $array_couuriers = [];
    
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('docx/courriers/registre courrier entrant.docx');
        $templateProcessor->setValue('ANNEE', $actu_year);
        $i = 1;
        foreach($courriers as $courrier)
        {
            $array_service = [];
            $courrier_sortant_ref = '';
            $services_courrier = collect();
            $services_courrier = $courrier->services;   
            $expediteur = '';         

            foreach($services_courrier as $s_c)
            {
                array_push($array_service,$s_c->nom);
            }

            if($courrier->courrier_sortant_id != 'null')
            {
                $courrier_sortant_ref = Courrier::find($courrier->courrier_sortant_id,['ref','date_envoie']);
            }


            //expediteur
            if ($courrier->personnePhysique != null) {
                $expediteur =  $courrier->personnePhysique->full_name;
            }


            if ($courrier->personneMorale != null) {
                $expediteur =  $courrier->personneMorale->raison_sociale;
            }

          


            $services_str = implode(', ',$array_service);

            array_push($array_couuriers,
            [
                'NUMERO' => $i,
                'DATE_RECEPTION' =>  $courrier->date_reception,
                'OBJET' => $courrier->objet,
                'EXPEDITEUR' => $expediteur,
                'REF' =>   $courrier->ref.' : الرقم '.$courrier->date_courrier . ' : بتاريخ ',
                'SORTANTS' => $courrier_sortant_ref['ref'].' '.$courrier_sortant_ref['date_envoie'],
                'SERVICES' =>  $services_str,
            ]);  
                
            $i++;
        }

        $templateProcessor->cloneRowAndSetValues('NUMERO', $array_couuriers );

        
        $filename= 'courrier_entrant_registre';
        $filename=str_replace("/","_",$filename).'.docx';
        $templateProcessor->saveAs('docx/courriers/'.$filename);
        $file = public_path()."/docx/courriers/".$filename;           
        array_push($files,$file);			
        
        //return FacadeResponse::download($file, $filename,$headers)->deleteFileAfterSend(true);
        
        
        redirect()->away('https://view.officeapps.live.com/op/embed.aspx?src='."/docx/courriers/".$filename.".docx");
		
		
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



    public function registreCourrierSortant(Request $request)
    {
        $actu_year = Carbon::now()->year;
        $daterange_courrier = $request->date_envoie_tous_daterange;
        $daterange_splite = explode('-', trim($daterange_courrier));
        $date_start = $daterange_splite[0];
        $date_start_formatted = date("Y-m-d", strtotime($date_start));
        $date_end = str_replace('/','-',trim($daterange_splite[1]));
        $date_end_formatted = date("Y-m-d", strtotime($date_end));


        $brouill_etat = EtatCourrier::where('nom','=','brouillon')->first();
        $courriers = Courrier::where([['type','sortant'],['etat_id','!=',$brouill_etat->id],['date_envoie','>=',$date_start_formatted],['date_envoie','<=',$date_end_formatted]])->get();
        $files= array();

        $array_couuriers = [];
    
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('docx/courriers/registre courrier sortant.docx');
        $templateProcessor->setValue('ANNEE', $actu_year);
        $i = 1;
        foreach($courriers as $courrier)
        {
            $array_service = [];
            $courrier_entrant_ref = '';
            $services_courrier = collect();
            $services_courrier = $courrier->services;   
            $destinataire = '';         

            foreach($services_courrier as $s_c)
            {
                array_push($array_service,$s_c->nom);
            }

            if($courrier->courrier_entrant_id != 'null')
            {
                $courrier_entrant_ref = Courrier::find($courrier->courrier_entrant_id,['ref','date_envoie']);
            }


            //destinataire
            if ($courrier->personnePhysique != null) {
                $destinataire =  $courrier->personnePhysique->full_name;
            }


            if ($courrier->personneMorale != null) {
                $destinataire =  $courrier->personneMorale->raison_sociale;
            }

          


            $services_str = implode(', ',$array_service);

            array_push($array_couuriers,
            [
                'NUMERO' => $i,
                'DATE_ENVOIE' =>  $courrier->date_envoie,
                'OBJET' => $courrier->objet,
                'DESTINATAIRE' => $destinataire,
                'SERVICE' =>   $services_str,
                'ENTRANT' => $courrier_entrant_ref['ref'],
            ]);  
                
            $i++;
        }

        $templateProcessor->cloneRowAndSetValues('NUMERO', $array_couuriers );

        
        $filename= 'courrier_sortant_registre';
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
