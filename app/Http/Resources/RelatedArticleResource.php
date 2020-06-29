<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RelatedArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'avg_read_time' => [
                'basic' => avg_read_time($this->content_text),
                'detail' => avg_read_time_in_detail($this->content_text),
            ],
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name
            ],
            'created_at' => $this->created_at->format('M jS, Y'),
        ];
    }
}
