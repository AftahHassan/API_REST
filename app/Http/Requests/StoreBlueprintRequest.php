<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlueprintRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'style_rules' => ['nullable', 'string'],
            'tone' => ['required', 'string', 'max:255'],
            'max_hashtags' => ['required', 'integer', 'min:0', 'max:10'],
            'max_characters' => ['required', 'integer', 'min:50', 'max:280'],
        ];
    }
}