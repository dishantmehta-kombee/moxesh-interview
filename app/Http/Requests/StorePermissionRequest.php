<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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
            'name' => 'required|unique:permissions,name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter permission name',
            'name.unique' => 'This name is already registered',
        ];
    }

    /*protected function failedValidation(Validator $validator)
    {
        return response()->json([
            'code' => 422,
            'errors' => $validator->errors(),
        ], 200);
    }*/

    /*protected function failedValidation(Validator $validator)
    {
        parent::failedValidation($validator);
    }*/
}
