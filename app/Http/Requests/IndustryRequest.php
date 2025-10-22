<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndustryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'vertical' => ['required'],
            'headline' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
