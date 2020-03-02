<?php

namespace App\Listeners;

use App\Courrier;
use App\EtatCourrier;
use App\Events\ChangeCourrierStateEvent;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeCourrierStateListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ChangeCourrierStateEvent  $event
     * @return void
     */
    public function handle(ChangeCourrierStateEvent $event)
    {
        $actu_date = Carbon::now()->format('Y-m-d');
        $en_retard_etat = EtatCourrier::where('nom', 'en_retard')->first();
        $brouillon_etat = EtatCourrier::where('nom', 'brouillon')->first();
        $cloture_etat = EtatCourrier::where('nom', 'cloturer')->first();
        
        Courrier::where([['type', '=', 'entrant'], ['delai', '<', $actu_date], ['etat_id', '!=', $cloture_etat->id], ['etat_id', '!=', $brouillon_etat->id]])
            ->update(['etat_id' => $en_retard_etat->id]);

    }
}
