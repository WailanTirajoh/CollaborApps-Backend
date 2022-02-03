<?php

namespace App\Models;

use App\Traits\HasComment;
use App\Traits\HasImage;
use App\Traits\HasReact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasImage, HasComment, HasReact;

    /**
     * used at HasImage trait
     */
    public $mediaName = 'post_media';

    protected $fillable = [
        'text',
        'channel_id'
    ];

    /**
     * post belongsto user, user has many post
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * post belongsto channel, channel has many post
     */
    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }

    /**
     * get file attribute
     */
    public function getFileAttribute()
    {
        return $this->getFirstMediaUrl($this->mediaName);
    }

    /**
     * Update pin of post
     * @param none
     * @return void
     */
    public function updatePin(): void
    {
        $this->is_pinned = !$this->is_pinned;
        $this->save();
    }
}
