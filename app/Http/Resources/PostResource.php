<?php

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Post */
class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'headline_uri' => $this->headline_uri,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'summary' => $this->summary,
            'content' => $this->content,
            'seo_title' => $this->seo_title,
            'seo_summary' => $this->seo_summary,
            'is_headliner' => $this->is_headliner,
            'published_at' => $this->published_at,
            'author_id' => $this->author_id,
            'author_name' => $this->author_name,
            'author_uri' => $this->author_uri,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
