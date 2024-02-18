<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class PostLoginRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|max:16|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*]).+$/',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email address is already registered',
            'password.required' => 'Please enter a password',
            'password.min' => 'Password should be at least 8 characters',
            'password.max' => 'Password should not exceed 16 characters',
            'password.regex' => 'Enter password with at least one uppercase letter, one lowercase letter, one number, and one special character (!@#$%^&*)',
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
