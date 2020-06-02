<?php

namespace App\Http\Requests;

use App\Cart;
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
                'required', Rule::in(Cart::$cartable_types),
            ],
            'cartable_id' => [
                'required',  function ($attribute, $value, $fail) {
                    ! is_null($this->request->get('cartable_type')::where('id', $value)->first())
                        ?: $fail($attribute . ' does not exist.');
                }
            ],
            'size' => [
                'nullable', 'string'
            ]
        ];
    }
}
