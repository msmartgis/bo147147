<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ValidateCourrierEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $element_id;
    public $services_ids;
    public $user;
    public $user_id;
    public $action;
    public $element_type;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $user_id, $action, $element_type, $element_id, array $services_ids)
    {
        $this->user = $user;
        $this->user_id = $user_id;
        $this->action = $action;
        $this->element_type = $element_type;
        $this->element_id = $element_id;
        $this->services_ids = $services_ids;
        $this->message = "{$user} a {$action} un {$element_type}";
    }

    // public function setAction($action)
    // {

    // }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['courrier-validated-channel'];
    }

    public function broadcastAs()
    {
        return 'courrier-validated-event';
    }
}
