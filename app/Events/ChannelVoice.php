<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ChannelVoice implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $voice;
    private $channel;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($voice, $channel)
    {
        $this->voice = $voice;
        $this->channel = $channel;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('channel.' . $this->channel->slug);
    }

    public function broadcastAs()
    {
        return 'voice';
    }

    public function broadcastWith()
    {
        return [
            'user' => Auth::user(),
            'voice' => $this->voice
        ];
    }
}
