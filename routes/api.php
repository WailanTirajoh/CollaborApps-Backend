<?php

use App\Http\Controllers\Api\V1\Auth\ProfilePhotoController;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\LogoutController;
use App\Http\Controllers\Api\V1\Auth\ProfileController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\ChannelController;
use App\Http\Controllers\Api\V1\ChannelVoiceController;
use App\Http\Controllers\Api\V1\CommentSubCommentController;
use App\Http\Controllers\Api\V1\PostCommentController;
use App\Http\Controllers\Api\V1\ChannelPostController;
use App\Http\Controllers\Api\V1\PostReactController;
use App\Http\Controllers\PostPinController;
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

        Route::resource('posts.reacts', PostReactController::class)->only(['store']);
        Route::resource('posts.comments', PostCommentController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::put('/posts/{post}/pin', PostPinController::class)->name('posts.pin');

        Route::resource('comments.subComments', CommentSubCommentController::class)->only(['index', 'store', 'update', 'destroy']);

        Route::resource('channels', ChannelController::class)->only(['index', 'store', 'update', 'delete']);
        Route::resource('channels.posts', ChannelPostController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::post('/channels/{channel}/voice', ChannelVoiceController::class)->name('channel.voice');

        Route::post('/logout', LogoutController::class)->name('logout');
    });

    Route::post('/login', LoginController::class)->name('login');
    Route::post('/register', RegisterController::class)->name('register');
});
