<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateConceptRequest extends FormRequest
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
        $conceptId = $this->route('concept')->id;

        return [
            'section_id'  => 'required|exists:sections,id',
            'title'       => ['required', 'string', 'max:255', Rule::unique('concepts', 'title')->ignore($conceptId)],
            'description' => 'required|string',
            'type'        => 'required|in:concept,function',
            'syntax'      => 'required_if:type,function|nullable|string',
            'return_type' => 'required_if:type,function|nullable|string|max:255',
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
