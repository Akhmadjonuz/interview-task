<?php

namespace App\Http\Requests\Brands;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateBrandRequest extends FormRequest
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
            'id' => 'required|integer|exists:brands,id',
            'name' => 'nullable|string|unique:brands,name|max:100',
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
            'id.required' => 'Brand id is required',
            'id.integer' => 'Brand id must be integer',
            'id.exists' => 'Brand id not found',
            'name.string' => 'Brand name must be string',
            'name.unique' => 'Brand name already exists',
            'name.max' => 'Brand name must be less than 100 characters',
            'status.boolean' => 'Brand status must be boolean'
        ];
    }
}