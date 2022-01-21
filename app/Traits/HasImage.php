<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasImage
{
    /**
     * Upload image for one to one relationship on polymorph relation
     * @param File input and name
     * @return void
     */
    public function replaceImage($file, string $name): void
    {
        if ($this->getFirstMedia($name)) $this->deleteMedia($this->getFirstMedia($name)->id);
        $this->addMedia($file)->usingName(Str::random(20))->toMediaCollection($name);
    }

    /**
     * Get full image url
     * @return string
     */
    public function getImageAttribute(): string
    {
        return $this->getFirstMedia($this->getImageProperty()) ?
            $this->getFirstMediaUrl($this->getImageProperty()) :
            asset('default/user.png');
    }

    public function getImageProperty()
    {
        return isset($this->mediaName) ?
            $this->mediaName :
            'image';
    }
}
