<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class React extends Model
{
    use HasFactory;

    protected $fillables = [
        'name'
    ];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'reactable')->withPivot('user_id')->withPivotValue('user_id', Auth::user()->id)->withTimestamps();
    }

    public function comments()
    {
        return $this->morphedByMany(Comment::class, 'reactable');
    }
}
