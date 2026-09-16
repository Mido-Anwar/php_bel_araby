<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreConceptRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'section_id'  => ['required', 'integer', 'exists:sections,id'],
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
            'section_id.required'    => 'القسم مطلوب.',
            'section_id.exists'      => 'القسم المختار غير موجود.',
            'title.required'         => 'العنوان مطلوب.',
            'description.required'   => 'الوصف مطلوب.',
            'type.required'          => 'النوع مطلوب.',
            'syntax.required_if'     => 'الصيغة مطلوبة للدوال.',
            'return_type.required_if'=> 'نوع الإرجاع مطلوب للدوال.',
        ];
    }
}
