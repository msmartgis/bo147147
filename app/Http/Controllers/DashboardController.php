<?php

namespace App\Http\Controllers;

use App\Courrier;
use App\EtatCourrier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $actu_date = Carbon::now()->format('Y-m-d');
        $en_retard_etat = EtatCourrier::where('nom', 'en_retard')->first();
        $cloture_etat = EtatCourrier::where('nom', 'cloturer')->first();
        $brouillon_etat = EtatCourrier::where('nom', 'brouillon')->first();
        $en_cours_etat = EtatCourrier::where('nom', 'en_cours')->first();

        //update courriers state
        Courrier::where([['type', '=', 'entrant'], ['delai', '<', $actu_date], ['etat_id', '!=', $cloture_etat->id], ['etat_id', '!=', $brouillon_etat->id]])
            ->update(['etat_id' => $en_retard_etat->id]);



        $actu_date = Carbon::now()->format('Y-m-d');
        $nombre_courrier = Courrier::all()->count();
        $courrier_brouillons = Courrier::where([['type', '=', 'entrant'], ['etat_id', '=', $brouillon_etat->id]])->count();
        $courrier_en_cours = Courrier::where([['type', '=', 'entrant'], ['etat_id', '=', $en_cours_etat->id]])->count();
        $courrier_cloture = Courrier::where([['type', '=', 'entrant'], ['etat_id', '=', $cloture_etat->id]])->count();
        $courrier_en_retard = Courrier::where([['type', '=', 'entrant'], ['delai', '<', $actu_date]])->count();


        $courrier_brouillons_sortants = Courrier::where([['type', '=', 'sortant'], ['etat_id', '=', $brouillon_etat->id]])->count();
        $courrier_en_cours_sortants = Courrier::where([['type', '=', 'sortant'], ['etat_id', '=', $en_cours_etat->id]])->count();
        $courrier_cloture_sortants = Courrier::where([['type', '=', 'sortant'], ['etat_id', '=', $cloture_etat->id]])->count();

        $dernierement_recu = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'remarqueConsigne', 'hitorique')->where([['type', '=', 'entrant']])->take(10)->get();
        $dernierement_envoye = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'remarqueConsigne', 'hitorique')->where([['type', '=', 'sortant']])->take(10)->get();
        $dernierement_cloture = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'remarqueConsigne', 'hitorique')->where([['type', '=', 'entrant'], ['etat_id', '=', $cloture_etat->id]])->take(10)->get();
        $dernierement_en_retard = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'remarqueConsigne', 'hitorique')->where([['type', '=', 'entrant'], ['etat_id', '=', $en_retard_etat->id]])->take(10)->get();



        return view('dashboard.dashboard')->with([
            'nombre_courrier' => $nombre_courrier,
            'courrier_en_cours' => $courrier_en_cours,
            'courrier_cloture' => $courrier_cloture,
            'courrier_en_retard' => $courrier_en_retard,
            'courrier_brouillons' => $courrier_brouillons,
            'courrier_brouillons_sortants' => $courrier_brouillons_sortants,
            'courrier_en_cours_sortants' => $courrier_en_cours_sortants,
            'courrier_cloture_sortants' => $courrier_cloture_sortants,
            'dernierement_recu' => $dernierement_recu,
            'dernierement_envoye' => $dernierement_envoye,
            'dernierement_cloture' => $dernierement_cloture,
            'dernierement_en_retard' => $dernierement_en_retard,
        ]);
    }
}
