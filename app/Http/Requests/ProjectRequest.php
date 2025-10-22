<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'company' => ['required'],
            'company_uri' => ['required'],
            'summary' => ['required'],
            'content' => ['required'],
            'slug' => ['required'],
            'published_at' => ['nullable', 'date'],
            'is_headliner' => ['boolean'],
            'order_num' => ['nullable', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
