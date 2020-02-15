<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ValidateCourrierEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $courriers_ids;
    public $role_name;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $courriers_ids,$role_name)
    {
        $this->courriers_ids = $courriers_ids;
        $this->role_name = $role_name;
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
