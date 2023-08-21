<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProductRequest extends FormRequest
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
            'id' => 'required|integer|exists:products,id',
            'name' => 'nullable|string|unique:products,name|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'nullable|string|max:20',
            'category_id' => 'nullable|integer|exists:categories,id',
            'brand_id' => 'nullable|integer|exists:brands,id',
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
            'id.required' => 'Product id is required',
            'id.integer' => 'Product id must be integer',
            'id.exists' => 'Product id must be exists',
            'name.string' => 'Product name must be string',
            'name.unique' => 'Product name must be unique',
            'name.max' => 'Product name must be less than 255 characters',
            'photo.image' => 'Product photo must be image',
            'photo.mimes' => 'Product photo must be jpeg, png, jpg, gif, svg',
            'photo.max' => 'Product photo must be less than 2048 kilobytes',
            'price.string' => 'Product price must be string',
            'price.max' => 'Product price must be less than 20 characters',
            'category_id.integer' => 'Product category id must be integer',
            'category_id.exists' => 'Product category id must be exists',
            'brand_id.integer' => 'Product brand id must be integer',
            'brand_id.exists' => 'Product brand id must be exists',
            'status.boolean' => 'Product status must be boolean'
        ];
    }
}