<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->filled('title') && ! $this->filled('slug')) {
            $this->merge([
                'slug' => Str::slug($this->input('title')),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $sectionId = $this->route('section')?->id ?? $this->route('section');

        return [
            'technology_id' => ['required', 'integer', 'exists:technologies,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('sections', 'slug')->ignore($sectionId),
            ],
        ];
    }
}
