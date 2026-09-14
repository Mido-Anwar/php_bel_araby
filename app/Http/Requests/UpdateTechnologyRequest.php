<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateTechnologyRequest extends FormRequest
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
        if ($this->filled('name') && ! $this->filled('slug')) {
            $this->merge([
                'slug' => Str::slug($this->input('name')),
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
        $technologyId = $this->route('technology')?->id ?? $this->route('technology');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('technologies', 'name')->ignore($technologyId),
            ],
            'description' => ['nullable', 'string'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('technologies', 'slug')->ignore($technologyId),
            ],
        ];
    }
}
