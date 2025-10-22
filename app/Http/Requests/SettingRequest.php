<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'key' => ['required'],
            'value' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
