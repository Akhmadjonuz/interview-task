<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCategoryRequest extends FormRequest
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
            'id' => 'required|integer|exists:categories,id',
            'name' => 'nullable|string|unique:categories,name|max:100',
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
            'id.required' => 'Category id is required',
            'id.integer' => 'Category id must be integer',
            'id.exists' => 'Category id must be exists',
            'name.string' => 'Category name must be string',
            'name.unique' => 'Category name must be unique',
            'name.max' => 'Category name must be less than 100 characters',
            'status.boolean' => 'Category status must be boolean'
        ];
    }
}