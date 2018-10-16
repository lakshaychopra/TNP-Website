<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAboutWidgetRequest extends FormRequest
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
            'about_address'   => 'bail|required',
            'about_location'  => 'required',
            'about_phone'     => 'nullable',
            'about_website'   => 'nullable|url',
            'about_email'     => 'nullable|email',
            'about_fax'       => 'nullable',   
        ];
    }
}
