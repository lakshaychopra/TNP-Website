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
            'univ_roll_no'            =>    'nullable',
            'class_roll_no'           =>    'nullable',
            'name'                    =>    'nullable',
            'batch'                   =>    'nullable',
            'branch_type'             =>    'nullable',
            'stream'                  =>    'nullable',
            'training_sem'            =>    'nullable',
            'shift'                   =>    'nullable',
            'section'                 =>    'nullable',
            'gender'                  =>    'nullable',
            'category'                =>    'nullable',
            'blood_group'             =>    'nullable',
            'height'                  =>    'nullable',
            'weight'                  =>    'nullable',
            'father_name'             =>    'nullable',
            'father_phone_number'     =>    'nullable',
            'mother_name'             =>    'nullable',
            'mother_phone_number'     =>    'nullable',
            'address'                 =>    'nullable',
            'city'                    =>    'nullable',
            'state'                   =>    'nullable',
            'district'                =>    'nullable',
            'pincode'                 =>    'nullable',
        ];
    }
}
