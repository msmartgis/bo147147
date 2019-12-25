<?php

namespace App\Http\Controllers;

use App\Courrier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $actu_date = Carbon::now()->format('Y-m-d');
        //update courriers state
        Courrier::where([['type', '=', 'entrant'], ['delai', '<', $actu_date], ['etat_id', '!=', 'bfe54fe8-fc87-4fec-aaf0-1cb5beacf858'], ['etat_id', '!=', 'de4d5fe6-a384-4df0-abeb-6f953f4102f4']])
            ->update(['etat_id' => '110a3194-9e8e-40b3-953e-256a68cdfcf7']);



        $actu_date = Carbon::now()->format('Y-m-d');
        $nombre_courrier = Courrier::all()->count();
        $courrier_brouillons = Courrier::where([['type', '=', 'entrant'], ['etat_id', '=', 'de4d5fe6-a384-4df0-abeb-6f953f4102f4']])->count();
        $courrier_en_cours = Courrier::where([['type', '=', 'entrant'], ['etat_id', '=', '4eb0a1ba-a55e-40f0-bea1-bfc9b21cabc8']])->count();
        $courrier_cloture = Courrier::where([['type', '=', 'entrant'], ['etat_id', '=', 'bfe54fe8-fc87-4fec-aaf0-1cb5beacf858']])->count();
        $courrier_en_retard = Courrier::where([['type', '=', 'entrant'], ['delai', '>', $actu_date]])->count();


        $courrier_brouillons_sortants = Courrier::where([['type', '=', 'sortant'], ['etat_id', '=', 'de4d5fe6-a384-4df0-abeb-6f953f4102f4']])->count();
        $courrier_en_cours_sortants = Courrier::where([['type', '=', 'sortant'], ['etat_id', '=', '4eb0a1ba-a55e-40f0-bea1-bfc9b21cabc8']])->count();
        $courrier_cloture_sortants = Courrier::where([['type', '=', 'sortant'], ['etat_id', '=', 'bfe54fe8-fc87-4fec-aaf0-1cb5beacf858']])->count();

        $dernierement_recu = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'remarqueConsigne', 'hitorique')->where([['type', '=', 'entrant']])->take(10)->get();
        $dernierement_envoye = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'remarqueConsigne', 'hitorique')->where([['type', '=', 'sortant']])->take(10)->get();
        $dernierement_cloture = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'remarqueConsigne', 'hitorique')->where([['type', '=', 'entrant'], ['etat_id', '=', 'bfe54fe8-fc87-4fec-aaf0-1cb5beacf858']])->take(10)->get();
        $dernierement_en_retard = Courrier::with('modeReception', 'personnePhysique', 'personneMorale', 'piece', 'services', 'remarqueConsigne', 'hitorique')->where([['type', '=', 'entrant'], ['etat_id', '=', '110a3194-9e8e-40b3-953e-256a68cdfcf7']])->take(10)->get();



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
