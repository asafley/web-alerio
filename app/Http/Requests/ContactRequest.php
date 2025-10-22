<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'company' => ['nullable'],
            'phone' => ['nullable', 'phone:US'],
            'email' => ['nullable', 'email', 'max:254'],
            'subject' => ['nullable'],
            'body' => ['required'],
            'user_agent' => ['nullable'],
            'ip_address' => ['nullable'],
            'geo_json' => ['nullable'],
            'is_addressed' => ['boolean'],
            'is_emailed' => ['boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
