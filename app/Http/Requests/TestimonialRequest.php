<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'company' => ['required'],
            'company_uri' => ['nullable'],
            'content' => ['required'],
            'order_num' => ['nullable', 'integer'],
            'published_at' => ['nullable', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
