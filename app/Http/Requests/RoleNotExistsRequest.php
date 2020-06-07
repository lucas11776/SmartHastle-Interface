<?php

namespace App\Http\Requests;

use App\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleNotExistsRequest extends FormRequest
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
        $user = $this->user;

        return [
            'role' => [
                'required', Rule::in(Role::ROLES), function($attribute, $value, $fail) use($user) {
                    $roleExists = $user->roles()->where('name', $value)->first();

                    is_null($roleExists) ?: $fail($attribute . ' ' . $value . ' already exist.' );
                }
            ]
        ];
    }
}
