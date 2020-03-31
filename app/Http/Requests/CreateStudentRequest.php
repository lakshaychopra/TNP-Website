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
            'first_name'              =>    'nullable',
            'last_name'               =>    'nullable', 
            'batch'                   =>    'nullable',
            'branch_type'             =>    'nullable',
            'stream'                  =>    'nullable',
            'blood_group'             =>    'required',
            'height'                  =>    'required',
            'weight'                  =>    'required',
            'training_semester'       =>    'nullable',
            'shift'                   =>    'nullable',
            'section'                 =>    'nullable',
            'gender'                  =>    'nullable',
            'category'                =>    'nullable',
            'father_name'             =>    'nullable',
            'father_phone'            =>    'nullable',
            'mother_name'             =>    'nullable',
            'mother_phone'            =>    'nullable',
            'father_occupation'       =>    'nullable',
            'farming_background'      =>    'nullable',
            'address'                 =>    'nullable',
            'city'                    =>    'nullable',
            'state'                   =>    'nullable',
            'district'                =>    'nullable',
            'pincode'                 =>    'nullable',
            'phone_number'            =>    'nullable',
            'whatsapp_cont'           =>    'nullable',
            'graduation'              =>    'nullable',
            'spec_mba'                =>    'nullable',
            'spec_mtech'              =>    'nullable',
            'specialization'          =>    'nullable',
            'work_experience'         =>    'nullable',
            'passing_year'            =>    'nullable',
            'marks_type'              =>    'nullable',
            'CGPA'                    =>    'nullable',
            'percentage'              =>    'nullable',
            'Graduation_certificate'  =>    'nullable',
        ];
    }
}