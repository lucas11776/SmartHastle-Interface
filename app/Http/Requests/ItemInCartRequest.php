<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemInCartRequest extends FormRequest
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
            'id' => [
                'required', function($attribute, $value, $fail) {
                    ! is_null(auth()->user()->cart()->where('id', $value)->first())
                        ?: $fail('Item does not exist in cart.');
                }
            ]
        ];
    }
}
