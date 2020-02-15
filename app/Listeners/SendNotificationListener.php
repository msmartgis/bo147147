<?php

namespace App\Listeners;

use App\Courrier;
use App\Events\ValidateCourrierEvent;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CourrierAdded;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationListener
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
     * @param  ValidateCourrierEvent  $event
     * @return void
     */
    public function handle(ValidateCourrierEvent $event)
    {
        $courriers_ids = array();
        
        $courriers_ids = $event->courriers_ids;
        $users_to_notify = User::whereHas('role', function($query) use ($event){
                $query->where('role_name',$event->role_name);
            })->get();

            for ($i=0; $i < count($courriers_ids); $i++) {
                $courrier_to_add = Courrier::find($courriers_ids[$i]);
                Notification::send($users_to_notify, new CourrierAdded($courrier_to_add));
            }
    }
}
