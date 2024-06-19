<?php

namespace App\Events;

use App\Models\Registrant;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CamperRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $registrant;

    /**
     * Create a new event instance.
     */
    public function __construct(Registrant $registrant)
    {
        //
        $this->registrant = $registrant;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
