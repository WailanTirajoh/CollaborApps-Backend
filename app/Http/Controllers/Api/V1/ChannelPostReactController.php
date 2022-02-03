<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\PostReactCreated;
use App\Events\PostReactDeleted;
use App\Http\Controllers\Controller;
use App\Models\React;
use App\Http\Requests\StoreReactRequest;
use App\Http\Resources\PostReactResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\ReactResource;
use App\Models\Channel;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ChannelPostReactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReactRequest  $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReactRequest $request, Channel $channel, Post $post)
    {
        $react = React::find($request->react_id);
        $resource = [
            'id' => $request->react_id,
            'user_id' => Auth::user()->id,
        ];
        if ($post->reacts()->where('name', 'like')->wherePivot('user_id', Auth::user()->id)->exists()) {
            $post->reacts()->where('name', 'like')->wherePivot('user_id', Auth::user()->id)->detach();
            $message = 'Post unliked!';
            $like = false;
            broadcast(new PostReactDeleted(PostResource::make($post), $resource));
        } else {
            $post->reacts()->attach($react, ['user_id' => Auth::user()->id]);
            $message = 'Post liked!';
            $like = true;
            broadcast(new PostReactCreated(PostResource::make($post), $resource));
        }

        return response()->json([
            'message' => $message,
            'like' => $like,
        ]);
    }
}
