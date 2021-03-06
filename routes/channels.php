<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return $user->id === (int) $id;
});

Broadcast::channel('users.{id}', function ($user, $id) {
    return $user->id === (int) $id;
});

Broadcast::channel('post.{postId}', function ($user, $postId) {
    return true;
});

Broadcast::channel('home.{id}', function ($user, $id) {
    return [
        'id' => $user->id,
        'name' => $user->name
    ];
});

Broadcast::channel('chats', function ($user) {
    return true;
});

Broadcast::channel('channel.{channelId}', function ($user, $channelId) {
    if ($user->canJoinChannel($channelId)) {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'image' => $user->image,
            'isSpeaking' => false,
            'volume' => 0.5
        ];
    }
});
