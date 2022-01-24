<?php

use App\Http\Controllers\Api\Auth\ProfileController;
use App\Http\Controllers\Api\Auth\ProfilePhotoController;
use App\Http\Controllers\Api\CommentSubCommentController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\PostCommentController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\PostReactController;
use App\Http\Controllers\Api\RegisterController;
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

Route::group(['middleware' => ['auth:sanctum'], 'as' => 'api.'], function () {
    Route::group(['prefix' => '/user', 'as' => 'user.'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
        Route::delete('/profile-photo', [ProfilePhotoController::class, 'delete'])->name('profile-photo.delete');
    });

    Route::resource('post', PostController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('post.react', PostReactController::class)->only(['store']);
    Route::resource('post.comment', PostCommentController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('comment.subComment', CommentSubCommentController::class)->only(['index', 'store', 'update', 'destroy']);

    Route::post('/logout', LogoutController::class);
});

Route::post('/login', LoginController::class);
Route::post('/register', RegisterController::class);
