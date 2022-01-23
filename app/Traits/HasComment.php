<?php

namespace App\Traits;

use App\Models\Comment;

trait HasComment
{
    private $totalComment = 0;
    /**
     * Get all of the comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getTotalCommentAttribute()
    {
        foreach ($this->comments as $comment) {
            $this->totalComment += 1;
            if ($comment->comments) {
                $this->getTotalComment($comment->comments);
            }
        }
        return $this->totalComment;
    }

    private function getTotalComment($comments)
    {
        foreach ($comments as $comment) {
            $this->totalComment += 1;
            if ($comment->comments) {
                $this->getTotalComment($comment->comments);
            }
        }
    }
}
