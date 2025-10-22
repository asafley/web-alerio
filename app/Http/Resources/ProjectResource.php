<?php

namespace App\Http\Resources;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Project */
class ProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'company' => $this->company,
            'company_uri' => $this->company_uri,
            'summary' => $this->summary,
            'content' => $this->content,
            'slug' => $this->slug,
            'published_at' => $this->published_at,
            'is_headliner' => $this->is_headliner,
            'order_num' => $this->order_num,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
