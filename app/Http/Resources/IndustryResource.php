<?php

namespace App\Http\Resources;

use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Industry */
class IndustryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'vertical' => $this->vertical,
            'headline' => $this->headline,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
