<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'technology_id' => ['sometimes', 'integer', 'exists:technologies,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'العنوان مطلوب.',
        ];
    }
}
