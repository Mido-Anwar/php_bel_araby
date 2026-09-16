<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'technology_id' => ['required', 'integer', 'exists:technologies,id'],
            'title'         => ['required', 'string', 'max:255'],
            'description'   => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'technology_id.required' => 'يجب اختيار التقنية.',
            'technology_id.exists'   => 'التقنية المختارة غير موجودة.',
            'title.required'         => 'العنوان مطلوب.',
        ];
    }
}
