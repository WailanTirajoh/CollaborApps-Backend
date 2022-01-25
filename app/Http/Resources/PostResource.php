<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'total_comments' => $this->totalComment,
            'total_reacts' => $this->reacts()->where('name', 'like')->count(),
            'created_at' => $this->created_at->diffForHumans(),
            'user' => UserResource::make($this->user),
            'file' => $this->file,
        ];
    }
}
