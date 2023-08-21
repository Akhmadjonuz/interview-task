<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ShowProductRequest extends FormRequest
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
            'price' => 'nullable|numeric',
            'category_id' => 'nullable|integer|exists:categories,id',
            'brand_id' => 'nullable|integer|exists:brands,id',
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
            'price.numeric' => 'Price must be a number',
            'category_id.integer' => 'Category id must be an integer',
            'category_id.exists' => 'Category id does not exist',
            'brand_id.integer' => 'Brand id must be an integer',
            'brand_id.exists' => 'Brand id does not exist',
        ];
    }
}