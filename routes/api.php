<?php

use App\Http\Controllers\Api\V1\Auth\ProfilePhotoController;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\LogoutController;
use App\Http\Controllers\Api\V1\Auth\ProfileController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\CommentSubCommentController;
use App\Http\Controllers\Api\V1\PostCommentController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\PostReactController;
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

        Route::resource('posts', PostController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('posts.reacts', PostReactController::class)->only(['store']);
        Route::resource('posts.comments', PostCommentController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('comments.subComments', CommentSubCommentController::class)->only(['index', 'store', 'update', 'destroy']);

        Route::post('/logout', LogoutController::class)->name('logout');
    });

    Route::post('/login', LoginController::class)->name('login');
    Route::post('/register', RegisterController::class)->name('register');
});
