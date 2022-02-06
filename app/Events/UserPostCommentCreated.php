<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class UserPostCommentCreated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $user;
    private $post;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('users.' . $this->post->user->id);
    }

    public function broadcastAs()
    {
        return 'post.comment.created';
    }

    public function broadcastWith()
    {
        if (Auth::user()->id === (int) $this->post->user->id) {
            $message = 'Komentar anda berhasil ditambahkan';
        } else {
            $message = $this->user->name . ' memberikan komentar pada post anda.';
        }

        return [
            'message' => $message
        ];
    }
}
