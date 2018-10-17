<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHomePageRequest extends FormRequest
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
            'office_type'     => 'bail|required',
            'office_widget'   => 'required',
            'office_name'     => 'required',
            'office_position' => 'required',
            'office_email'    => 'required|email',
            'office_picture'  => 'required',
            'office_phone'    => 'required|numeric',
        ];
    }
}
