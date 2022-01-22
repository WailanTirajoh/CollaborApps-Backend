<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasImage;

    /**
     * used at HasImage trait
     */
    protected $mediaName = 'post_media';

    protected $fillable = [
        'text'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}