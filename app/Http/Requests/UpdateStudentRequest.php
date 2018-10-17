<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'univ_roll_no'            =>    'bail|required|numeric|min:6|exists:students,univ_roll_no',
            'class_roll_no'           =>    'required|numeric|min:6',
            'name'                    =>    'required|min:3',
            'batch'                   =>    'required',
            'branch_type'             =>    'required',
            'stream'                  =>    'required',
            'training_semester'       =>    'required',
            'shift'                   =>    'required',
            'section'                 =>    'required',
            'gender'                  =>    'required',
            'category'                =>    'required',
            'blood_group'             =>    'required',
            'height'                  =>    'required|numeric',
            'weight'                  =>    'required|numeric',
            'father_name'             =>    'required|min:3',
            'father_phone'            =>    'required|numeric',
            'mother_name'             =>    'required|min:3',
            'mother_phone'            =>    'required|numeric',
            'address'                 =>    'required',
            'city'                    =>    'required',
            'state'                   =>    'required',
            'district'                =>    'required',
            'pincode'                 =>    'required|numeric',
        ];
    }
}
