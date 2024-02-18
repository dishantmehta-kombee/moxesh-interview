<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The status field must be either 0 or 1.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return response()->json([
            'code' => 422,
            'errors' => $validator->errors(),
        ], 200);
    }
}
