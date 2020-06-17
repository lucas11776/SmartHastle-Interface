<?php

namespace App\Http\Requests;

use App\Favorite;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FavoriteRequest extends FormRequest
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
            'favoriteable_type' => [
                'required', Rule::in(Favorite::FAVORITEABLES)
            ],
            'favoriteable_id' => [
                'required', function($attribute, $value, $fail) {
                    if(class_exists($class = $this->request->get('favoriteable_type')))
                        ! is_null($class::where('id', $value)->first())  ?: $fail($attribute . ' does not exist.');
                    else
                        $fail($attribute . ' does not exist in code base.');
                }
            ]
        ];
    }
}
