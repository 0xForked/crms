<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'featured_image' => $this->featured_image,
            'slug' => $this->slug,
            'title' => $this->title,
            'content' => $this->content_html,
            'avg_read_time' => [
                'basic' => avg_read_time($this->content_text),
                'detail' => avg_read_time_in_detail($this->content_text),
            ],
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name
            ],
            "default_read_time" => avg_read_time($this->content_text),
            'created_at' => $this->created_at->format('M jS, Y'),
            'related' => $this->related() ? RelatedArticleResource::collection($this->related()) : null
        ];
    }
}
