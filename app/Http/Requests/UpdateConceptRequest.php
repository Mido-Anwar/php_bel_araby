<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateConceptRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'type'        => ['required', 'in:concept,function'],
            'syntax'      => ['nullable', 'required_if:type,function', 'string'],
            'return_type' => ['nullable', 'required_if:type,function', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'          => 'العنوان مطلوب.',
            'description.required'    => 'الوصف مطلوب.',
            'type.required'           => 'النوع مطلوب.',
            'syntax.required_if'      => 'الصيغة مطلوبة للدوال.',
            'return_type.required_if' => 'نوع الإرجاع مطلوب للدوال.',
        ];
    }
}
