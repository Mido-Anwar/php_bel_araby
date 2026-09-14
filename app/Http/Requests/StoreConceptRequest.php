<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreConceptRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'section_id'  => 'required|exists:sections,id',
            'title'       => 'required|string|max:255|unique:concepts,title',
            'description' => 'required|string',
            'type'        => 'required|in:concept,function',
            'syntax'      => 'nullable|string',
            'return_type' => 'nullable|string|max:255',
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('title')) {
            $this->merge([
                'slug' => Str::slug($this->title),
            ]);
        }
    }
}
