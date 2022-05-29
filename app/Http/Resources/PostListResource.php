<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'author' =>[
                'id' => $this->user->id,
                'name'=> $this->user->name,
            ],
            'title' => $this->title,
            'description' => $this->description,
            'tag' => TagListResource::collection($this->tags),
            'likeCount' =>$this->likes->count(),
            'createdAt'=> strTo24hrFormat($this->created_at)
        ];
    }
}
