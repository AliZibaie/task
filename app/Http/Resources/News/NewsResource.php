<?php

namespace App\Http\Resources\News;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'id'=>$this->id,
          'title'=>$this->title,
          'content'=>$this->content,
          'category'=>$this->category,
          'resource'=>$this->resource->resource,
          'modified_at'=>$this->modified_at,
          'published_at'=>$this->published_at,
        ];
    }
}
