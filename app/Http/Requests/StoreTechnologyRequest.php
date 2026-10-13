<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTechnologyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        /*
|--------------------------------------------------------------------------
| Handling Unique Validation with Soft Deletes in Laravel
|--------------------------------------------------------------------------
|
| 💡 The Core Problem:
| When applying a unique constraint to a field (e.g., 'name') while using
| Soft Deletes, you typically run into two main challenges:
|
| 1️⃣ The Update Conflict:
| When updating an existing record without changing its name (e.g., updating only
| the description), the validation checks the database, finds the exact same name
| already exists, and incorrectly throws a duplicate entry error.
|
| 2️⃣ The Soft Deleted Records Conflict:
| When a record is soft-deleted, it remains in the database with a populated
| 'deleted_at' timestamp. If a user tries to create a new record using that exact
| same name, validation or the database rejects it because the name technically
| still exists in the soft-deleted rows.
|
| --------------------------------------------------------------------------
| 🛠️ The Comprehensive Solution & Mechanism:
| --------------------------------------------------------------------------
|
| A) Fetching the Route Parameter:
|    $technology = $this->route('technology');
|    - During a 'store' (creation) request, the URL has no parameter, so it returns null.
|    - During an 'update' request, the parameter is present in the route.
|
| B) Safely Extracting the ID:
|    $technologyId = $technology instanceof \App\Models\Technology ? $technology->id : $technology;
|    - This ensures we cleanly retrieve the exact integer ID whether Laravel passes
|      the full Model instance (via Route Model Binding) or a raw ID value.
|
| C) Ignoring the Current Record (ignore):
|    ->ignore($technologyId)
|    - Instructs the validator: "Check that the name is unique, but ignore the record with this ID."
|    - On update: Allows the user to save without forcing a name change.
|    - On store: Since it evaluates to null, it won't affect new insertions.
|
| D) Respecting Soft Deletes:
|    ->whereNull('deleted_at')
|    - Instructs the validator: "Only check uniqueness among active rows, ignoring any soft-deleted records."
|    - Allows creating a brand-new item using a name previously occupied by an older deleted record.
|
*/
        $technologyId = $this->route('technology');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('technologies', 'name')->ignore($technologyId),
            ],
            'description' => ['nullable', 'string'],
            'is_published' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'اسم التقنية مطلوب.',
            'name.unique'   => 'الاسم مستخدم بالفعل.',

        ];
    }
}
