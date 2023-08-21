<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone' => 'required|regex:/^998[0-9]{9}$/',
            'password' => 'required|string|min:6|max:20',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'phone.required' => 'Phone number is required',
            'phone.regex' => 'Phone number is invalid',
            'password.required' => 'Password is required',
            'password.string' => 'Password must be string',
            'password.min' => 'Password must be at least 6 characters',
            'password.max' => 'Password must be at most 20 characters',
        ];
    }
}