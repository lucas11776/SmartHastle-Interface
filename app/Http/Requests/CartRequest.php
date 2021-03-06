<?php

namespace App\Http\Requests;

use App\Cart;
use App\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ! auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cartable_type' => [
                'required', Rule::in(Cart::CARTABLES),
            ],
            'cartable_id' => [
                'required',  function ($attribute, $value, $fail) {
                    if(class_exists($class = $this->request->get('cartable_type')))
                        ! is_null($class::where('id', $value)->first())  ?: $fail($attribute . ' does not exist.');
                    else
                        $fail($attribute . ' does not exist in code base.');
                }
            ],
            'size' => [
                'nullable', 'string', Rule::in(Product::$sizes)
            ]
        ];
    }
}
