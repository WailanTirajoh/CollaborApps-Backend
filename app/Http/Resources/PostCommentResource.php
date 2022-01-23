<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostCommentResource extends JsonResource
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
            'parent_id' => $this->commentable->id,
            'text' => $this->text,
            'total_comments' => $this->comments()->count(),
            'created_at' => $this->created_at->diffForHumans(null, true, true),
            'user' => UserResource::make($this->user),
        ];
    }
}
