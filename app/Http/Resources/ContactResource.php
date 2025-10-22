<?php

namespace App\Http\Resources;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Contact */
class ContactResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'company' => $this->company,
            'phone' => $this->phone,
            'email' => $this->email,
            'subject' => $this->subject,
            'body' => $this->body,
            'user_agent' => $this->user_agent,
            'ip_address' => $this->ip_address,
            'geo_json' => $this->geo_json,
            'is_addressed' => $this->is_addressed,
            'is_emailed' => $this->is_emailed,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
