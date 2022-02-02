<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $post;
    private $channel;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($post, $channel)
    {
        $this->post = $post;
        $this->channel = $channel;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('channels.' . $this->channel->id . '.posts');
    }

    public function broadcastAs()
    {
        return 'created';
    }

    /**
     * send data to be broadcasted with
     */
    public function broadcastWith()
    {
        return [
            'post' => $this->post,
        ];
    }
}
