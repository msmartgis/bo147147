<?php

namespace App\Listeners;

use App\Events\ClotureCourrierEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ClotureCourrierListener
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
     * @param  ClotureCourrierEvent  $event
     * @return void
     */
    public function handle(ClotureCourrierEvent $event)
    {
        //
    }
}
