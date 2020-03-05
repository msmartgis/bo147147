<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DistributionEvent 
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $element_id;
    public $services_ids;
    public $user;
    public $action;
    public $element_type;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user,$action,$element_type,$element_id,array $services_ids)
    {
        $this->element_id = $element_id;
        $this->services_ids = $services_ids;
        $this->user = $user;
        $this->action = $action;
        $this->element_type = $element_type;
        $this->message = "{$user} a {$action} un {$element_type}";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
