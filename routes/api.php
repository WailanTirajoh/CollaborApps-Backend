<?php

use App\Http\Controllers\Api\V1\Auth\ProfilePhotoController;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\LogoutController;
use App\Http\Controllers\Api\V1\Auth\ProfileController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\ChannelController;
use App\Http\Controllers\Api\V1\ChannelVoiceController;
use App\Http\Controllers\Api\V1\CommentSubCommentController;
use App\Http\Controllers\Api\V1\ChannelPostCommentController;
use App\Http\Controllers\Api\V1\ChannelPostController;
use App\Http\Controllers\Api\V1\ChannelPostReactController;
use App\Http\Controllers\Api\V1\ChannelPostPinController;
use App\Http\Controllers\Api\V1\ChatController;
use App\Http\Controllers\Api\V1\NotificationController;
use App\Http\Controllers\Api\V1\UnreadNotificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/v1')->group(function () {
    Route::group(['middleware' => ['auth:sanctum'], 'as' => 'api.'], function () {
        Route::group(['prefix' => '/user', 'as' => 'user.'], function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::put('/update', [ProfileController::class, 'update'])->name('update');
            Route::delete('/profile-photo', [ProfilePhotoController::class, 'delete'])->name('profile-photo.delete');
        });

        Route::resource('channels', ChannelController::class)->only(['index', 'store', 'update', 'delete']);
        Route::resource('channels.voice', ChannelVoiceController::class)->only(['store']);
        Route::resource('channels.posts', ChannelPostController::class)->only(['index', 'store', 'update', 'destroy']);

        Route::resource('channels.posts.reacts', ChannelPostReactController::class)->only(['store']);
        Route::resource('channels.posts.comments', ChannelPostCommentController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('channels.posts.pin', ChannelPostPinController::class)->only(['store']);

        // Route::resource('comments.subComments', CommentSubCommentController::class)->only(['index', 'store', 'update', 'destroy']);

        Route::resource('chats', ChatController::class)->only(['index', 'store', 'destroy']);

        Route::get('/notifications', NotificationController::class);
        Route::get('/notifications/unread', UnreadNotificationController::class);

        Route::post('/logout', LogoutController::class)->name('logout');
    });

    Route::post('/login', LoginController::class)->name('login');
    Route::post('/register', RegisterController::class)->name('register');
});
