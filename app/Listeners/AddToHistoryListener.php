<?php

namespace App\Listeners;

use App\Events\NewCourrierAddedEvent;
use App\Historique;
use App\TypeOperation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class AddToHistoryListener
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
     * @param  NewCourrierAddedEvent  $event
     * @return void
     */
    public function handle(NewCourrierAddedEvent $event)
    {
        $new_history = new Historique();
        $operation = TypeOperation::where('nom', $event->operation)->first();
        $new_history->type_operation_id = $operation->id;
        $new_history->courrier_id = $event->courrier->id;
        $new_history->user_id = Auth::user()->id;
        $new_history->save();
    }
}
