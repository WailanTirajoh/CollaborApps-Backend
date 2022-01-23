<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class React extends Model
{
    use HasFactory;

    protected $fillables = [
        'name'
    ];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'reactable');
    }

    public function comments()
    {
        return $this->morphedByMany(Comment::class, 'reactable');
    }
}
