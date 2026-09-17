<?php

namespace App\Http\Requests;

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
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'type'        => 'required|in:concept,function',
            'syntax'      => 'nullable|string',
            'return_type' => 'nullable|string|max:255',
        ];
    }
}
