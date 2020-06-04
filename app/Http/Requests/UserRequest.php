<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'first_name' => [
                'required', 'string', 'max:50'
            ],
            'last_name' => [
                'required', 'string', 'max:50'
            ],
            'email' => [
                'required', 'email', Rule::unique(User::class)->ignore($this->user || auth()->user())
            ],
            'cellphone_number' => [
                'nullable', 'string', 'min:8', 'max:30'
            ]
        ];
    }
}
