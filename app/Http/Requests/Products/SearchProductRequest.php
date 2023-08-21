<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class SearchProductRequest extends FormRequest
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
            'id' => 'nullable|integer|exists:products,id',
            'slug' => 'nullable|string',
            'name' => 'nullable|string',
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
            'id.integer' => 'The id must be an integer.',
            'id.exists' => 'The id must be exists in products table.',
            'slug.string' => 'The slug must be a string.',
            'name.string' => 'The name must be a string.',
        ];
    }
}