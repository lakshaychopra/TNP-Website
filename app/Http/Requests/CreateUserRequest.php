<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'username'      =>'required|min:7',
            'email'         =>'required|email',
            'phone_number'  =>'required|min:10|max:10|numeric',
            'type'          =>'required',
            'password'      =>'required|min:6',
        ];
    }
}
