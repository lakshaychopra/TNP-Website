<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'username' => 'bail|required|min:7|exists:users,username', // make sure the username
            'phone_number' => 'required|min:10|max:10', // password has to be greater than 3 characters
            'email' => 'required|min:6|email', // password has to be greater than 3 characters
            'password' => 'required|min:6', // password has to be greater than 3 characters
        ];
    }
}
