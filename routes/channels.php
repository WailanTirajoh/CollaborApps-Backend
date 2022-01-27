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

// Broadcast::routes(['middleware' => ['auth:sanctum']]);

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return $user->id === (int) $id;
});
Broadcast::channel('users.{id}', function ($user, $id) {
    return $user->id === (int) $id;
});
Broadcast::channel('home.{id}', function ($user, $id) {
    // if ($user->canJoinRoom($roomId)) {
    return ['id' => $user->id, 'name' => $user->name];
    // }
});
