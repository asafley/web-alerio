<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'headline_uri' => ['required'],
            'slug' => ['required'],
            'title' => ['required'],
            'subtitle' => ['nullable'],
            'summary' => ['nullable'],
            'content' => ['required'],
            'seo_title' => ['nullable'],
            'seo_summary' => ['nullable'],
            'is_headliner' => ['boolean'],
            'published_at' => ['nullable', 'date'],
            'tags' => ['nullable', 'array'],
            'author_id' => ['required'],
            'author_name' => ['nullable'],
            'author_uri' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
