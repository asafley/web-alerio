<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'public_uri' => ['required'],
            'private_uri' => ['required'],
            'type' => ['required'],
            'is_public' => ['boolean'],
            'alt_text' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
