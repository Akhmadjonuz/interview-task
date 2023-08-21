<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|integer|unique:users',
            'password' => 'required|string|min:6|max:20',
            'password_confirmation' => 'required|same:password',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'phone.required' => 'Phone number is required',
            'phone.integer' => 'Phone number must be integer',
            'phone.unique' => 'Phone number already exists',
            'password.required' => 'Password is required',
            'password.string' => 'Password must be string',
            'password.min' => 'Password must be at least 6 characters',
            'password.max' => 'Password must be at most 20 characters',
            'password_confirmation.required' => 'Password confirmation is required',
            'password_confirmation.same' => 'Password confirmation must be same as password',
        ];
    }
}