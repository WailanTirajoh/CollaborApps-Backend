<?php

namespace App\Notifications;

use App\Http\Resources\PostCommentResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostCommentedNotification extends Notification
{
    use Queueable;

    private $comment;
    private $message;
    private $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment, $message, $user)
    {
        $this->comment = $comment;
        $this->message = $message;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'comment' => $this->comment,
            'message' => $this->message,
            'user' => $this->user,
        ];
    }
}
