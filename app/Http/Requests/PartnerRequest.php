<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'company' => ['required'],
            'company_uri' => ['nullable'],
            'logo_uri' => ['required'],
            'description' => ['nullable'],
            'order_num' => ['nullable', 'integer'],
            'published_at' => ['nullable', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
