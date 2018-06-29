<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
            'univ_roll_no'            =>    '',
            'class_roll_no'           =>    '',
            'name'                    =>    '',
            'batch'                   =>    '',
            'branch_type'             =>    '',
            'stream'                  =>    '',
            'training_sem'            =>    '',
            'shift'                   =>    '',
            'section'                 =>    '',
            'email'                   =>    '',
            'phone_number'            =>    '',
            'gender'                  =>    '',
            'category'                =>    '',
            'blood_group'             =>    '',
            'height'                  =>    '',
            'weight'                  =>    '',
            'father_name'             =>    '',
            'father_phone_number'     =>    '',
            'mother_name'             =>    '',
            'mother_phone_number'     =>    '',
            'address'                 =>    '',
            'city'                    =>    '',
            'state'                   =>    '',
            'district'                =>    '',
            'pincode'                 =>    '',
            'form_status'             =>    '',
        ];
    }
}
