<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateProductRequest extends FormRequest
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
            'name' => 'required|string|unique:products,name|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|string|max:20',
            'category_id' => 'required|integer|exists:categories,id',
            'brand_id' => 'required|integer|exists:brands,id',
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
            'name.required' => 'Product name is required',
            'name.string' => 'Product name must be string',
            'name.unique' => 'Product name must be unique',
            'name.max' => 'Product name must be less than 255 characters',
            'photo.required' => 'Product photo is required',
            'photo.image' => 'Product photo must be image',
            'photo.mimes' => 'Product photo must be jpeg, png, jpg, gif, svg',
            'photo.max' => 'Product photo must be less than 2048 kilobytes',
            'price.required' => 'Product price is required',
            'price.string' => 'Product price must be string',
            'price.max' => 'Product price must be less than 20 characters',
            'category_id.required' => 'Product category id is required',
            'category_id.integer' => 'Product category id must be integer',
            'category_id.exists' => 'Product category id must be exists in categories table',
            'brand_id.required' => 'Product brand id is required',
            'brand_id.integer' => 'Product brand id must be integer',
            'brand_id.exists' => 'Product brand id must be exists in brands table',
            'status.boolean' => 'Product status must be boolean'
        ];
    }
}