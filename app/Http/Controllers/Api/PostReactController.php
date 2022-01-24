<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\React;
use App\Http\Requests\StoreReactRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostReactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReactRequest  $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReactRequest $request, Post $post)
    {
        $react = React::find($request->react_id);
        if ($post->reacts()->where('name', 'like')->wherePivot('user_id', Auth::user()->id)->exists()) {
            $post->reacts()->where('name', 'like')->wherePivot('user_id', Auth::user()->id)->detach();
            $message = 'Reaction removed successfully!';
            $like = false;
        } else {
            $post->reacts()->attach($react, ['user_id' => Auth::user()->id]);
            $message = 'Reaction added successfully!';
            $like = true;
        }

        return response()->json([
            'message' => $message,
            'like' => $like,
        ]);
    }
}
