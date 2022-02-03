<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;

class PostPinController extends Controller
{
    public function store(Post $post)
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
