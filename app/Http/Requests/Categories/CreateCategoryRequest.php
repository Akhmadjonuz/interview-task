<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateCategoryRequest extends FormRequest
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
            'name' => 'required|string|unique:categories,name|max:100',
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
            'name.required' => 'Category name is required',
            'name.string' => 'Category name must be string',
            'name.unique' => 'Category name must be unique',
            'name.max' => 'Category name must be less than 100 characters',
            'status.boolean' => 'Category status must be boolean'
        ];
    }
}