<?php

namespace App\Listeners;

use App\Events\DistributionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\DistributeCourrier;
use App\Service;
use App\User;

class DistributionListener
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
     * @param  DistributionEvent  $event
     * @return void
     */
    public function handle(DistributionEvent $event)
    {
        $array_services = [];

        $president_service = Service::where('ref','=','President')
                                    ->orWhere('ref','=','DG')
                                    ->get(['id']);

        
        return $event->services_ids;

        $array_services = array_diff($president_service,$event->services_ids);


        $users_to_notify = User::whereHas('service', function($query) use ($array_services){
            $query->whereIn('id',$array_services);
        })->get();
        
        Notification::send($users_to_notify, new DistributeCourrier($event->user,$event->action,$event->element_type,$event->element_id,$event->message));     
    }
}
