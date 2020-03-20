<?php

namespace App\Listeners;

use App\Events\ViewMessageEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ViewMessageListener
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
     * @param  ViewMessageEvent  $event
     * @return void
     */
    public function handle(ViewMessageEvent $event)
    {
        $courrier = $event->courrier;
        $service = $event->service;
        // return $courrier->services->find($service->id)->pivot->vu;
        $courrier->services()->updateExistingPivot($service->id, ['vu' => 1]);
    }
}
