<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest{
    public function rules()
    {
        return [
            'name' => ['required'],
'short_description' => ['required'],
'long_description' => ['required'],
'order_num' => ['nullable', 'integer'],
'is_published' => ['boolean'],//
        ];
    }

    public function authorize()
    {
        return true;
    }
}
