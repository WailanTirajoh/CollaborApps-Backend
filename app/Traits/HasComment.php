<?php

namespace App\Traits;

use App\Models\Comment;

trait HasComment
{
    /**
     * Get all of the comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
