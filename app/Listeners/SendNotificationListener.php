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
        $users_to_notify = User::whereHas('role', function($query) use ($event){
                $query->where('role_name',$event->role_name);
            })->get();
            
        Notification::send($users_to_notify, new CourrierAdded($event->user,$event->action,$event->element_type,$event->element_id,$event->message));         
    }
}
