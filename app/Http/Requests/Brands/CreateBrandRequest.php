<?php

namespace App\Http\Requests\Brands;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->role == 1)
            return true;
        else
            return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:brands,name|max:100',
            'status' => 'nullable|boolean'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be string',
            'name.unique' => 'Name must be unique',
            'name.max' => 'Name must be max 100 characters',
            'status.boolean' => 'Status must be boolean'
        ];
    }
}