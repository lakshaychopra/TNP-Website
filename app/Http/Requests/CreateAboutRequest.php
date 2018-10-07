<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAboutRequest extends FormRequest
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
            'title'                 => 'bail|required|min:5|max:60',
            'body'                  => 'required|min:5',
            'username'              => 'required',
            'user_id'               => 'required',
            'url'                   => 'required',
            'image'                 => 'nullable|file|image|mimes:png,jpeg,jpg|max:2048',
            'image_path'            => 'nullable',
        ];
    }
}
