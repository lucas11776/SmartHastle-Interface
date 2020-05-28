<?php

namespace App\Http\Requests;

use App\Category;
use App\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'category_id' => [
                'required', Rule::exists(Category::class, 'id')
            ],
            'name' => [
                'required', 'string', Rule::unique(Product::class)->ignore($this->product)
            ],
            'brand' => [
                'nullable', 'string'
            ],
            'price' => [
                'required', 'numeric'
            ],
            'discount' => [
                'nullable', 'numeric'
            ],
            'description' => [
                'required', 'string'
            ]
        ];
    }
}
