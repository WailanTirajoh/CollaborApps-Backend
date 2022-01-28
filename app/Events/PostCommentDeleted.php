<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostCommentDeleted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $post;
    private $comment;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($post, $comment)
    {
        $this->post = $post;
        $this->comment = $comment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('post.' . $this->post->id);
    }

    public function broadcastAs()
    {
        return 'comment.deleted';
    }

    /**
     * send data to be broadcasted with
     */
    public function broadcastWith()
    {
        return [
            'post' => $this->post,
            'comment' => $this->comment,
        ];
    }
}
