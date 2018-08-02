<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title'                 => 'bail|required|min:5|max:255',
            'body'                  => 'required|min:5',
            'username'              => 'required',
            'user_id'               => 'required',
            'tag'                   => 'required',
            'category'              => 'required',
            'post_link'             => 'nullable',
            'image'                 => 'nullable|file|image|mimes:png,jpeg,jpg|max:2048',
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
            // 'email.required' => trans( 'flash.validation.required',  ['attribute' => 'email'] ),
        ];
    }
}
