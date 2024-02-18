<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class PostRegistrationRequest extends FormRequest
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
            'first_name' => 'required|alpha',
            'last_name' => 'required|regex:/^[a-zA-Z]+\d{3}$/',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users,mobile',
            'postal_code' => 'required|string|max:6',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'gender' => 'required|in:male,female,other',
            'password' => 'required|min:8|max:16|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*]).+$/',
            'confirm_password' => 'required|same:password',
            'profile_picture.*' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Adjust max file size as needed
            'hobby_ids' => 'required|array',
            'hobby_ids.*' => 'exists:hobbies,id', // Assuming hobbies are stored in a 'hobbies' table
            'role_ids' => 'required|array',
            'role_ids.*' => 'exists:roles,name', // Assuming roles are stored in a 'roles' table
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Please enter your first name',
            'first_name.alpha' => 'First name must contain only alphabetic characters',
            'last_name.required' => 'Please enter your last name',
            'last_name.regex' => 'Last name must start with alphabetic characters and end with 3 digits',
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email address is already registered',
            'mobile.required' => 'Please enter your mobile number',
            'mobile.numeric' => 'Please enter a valid mobile number',
            'mobile.unique' => 'This Mobile number is already registered',
            'postal_code.required' => 'Please enter your postal code',
            'postal_code.max' => 'Postal code must not exceed 6 characters',
            'state_id.required' => 'Please select your state',
            'state_id.exists' => 'Please select a valid state',
            'city_id.required' => 'Please select your city',
            'city_id.exists' => 'Please select a valid city',
            'gender.required' => 'Please select your gender',
            'gender.in' => 'Please select a valid gender',
            'password.required' => 'Please enter a password',
            'confirm_password.required' => 'Please enter a confirm password',
            'confirm_password.same' => 'Passwords do not match',
            'password.min' => 'Password should be at least 8 characters',
            'password.max' => 'Password should not exceed 16 characters',
            'password.regex' => 'Enter password with at least one uppercase letter, one lowercase letter, one number, and one special character (!@#$%^&*)',
            'profile_picture.required' => 'Please select a profile picture',
            'profile_picture.*.image' => 'The selected file must be an image',
            'profile_picture.*.mimes' => 'Profile picture must be a file of type: jpeg, png, jpg',
            'profile_picture.*.max' => 'Profile picture may not be greater than 2 MB',
            'hobby_ids.required' => 'Please select at least one hobby',
            'hobby_ids.*.exists' => 'Invalid hobby selected',
            'role_ids.required' => 'Please select at least one role',
            'role_ids.*.exists' => 'Invalid role selected',
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
