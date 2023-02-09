<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OurExampleEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct($theEvent)
    {
        $this->username = $theEvent['username'];
        $this->action = $theEvent['action'];
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}