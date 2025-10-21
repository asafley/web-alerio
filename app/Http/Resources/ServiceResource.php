<?php

namespace App\Http\Resources;

use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/** @mixin Service */class ServiceResource extends JsonResource{
    public function toArray(Request $request)
    {
        return [
'id' => $this->id,
'name' => $this->name,
'short_description' => $this->short_description,
'long_description' => $this->long_description,
'order_num' => $this->order_num,
'is_published' => $this->is_published,
'created_at' => $this->created_at,
'updated_at' => $this->updated_at,//
        ];
    }
}
