<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Channel;
use App\Models\Post;

class ChannelPostPinController extends Controller
{
    public function store(Channel $channel, Post $post)
    {
        $post->updatePin();

        if ($post->is_pinned) {
            $message = 'Post pinned successfully';
        } else {
            $message = 'Post unpinned successfully';
        }

        return response()->json([
            'message' => $message,
            'post' => PostResource::make($post)
        ]);
    }
}
