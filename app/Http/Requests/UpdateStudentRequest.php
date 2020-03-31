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
            'first_name'              =>    'required|min:3',
            'last_name'               =>    'required|min:3',
            'batch'                   =>    'required',
            'branch_type'             =>    'required',
            'stream'                  =>    'required',
            'training_semester'       =>    'required',
            'blood_group'             =>    'required',
            'height'                  =>    'required',
            'weight'                  =>    'required',
            'shift'                   =>    'required',
            'section'                 =>    'required',
            'gender'                  =>    'required',
            'category'                =>    'required',
            'father_name'             =>    'required|min:3',
            'father_phone'            =>    'required|numeric',
            'mother_name'             =>    'required|min:3',
            'mother_phone'            =>    'required|numeric',
            'father_occupation'       =>    'required',
            'farming_background'      =>    'required',
            'address'                 =>    'required',
            'city'                    =>    'required',
            'state'                   =>    'required',
            'district'                =>    'required',
            'pincode'                 =>    'required|numeric',
            'phone_number'            =>    'required',
            'whatsapp_cont'           =>    'required',
            'graduation'                => 'required',
            'spec_mba'                  => 'required',
            'spec_mtech'                => 'required',
            'specialization'            => 'nullable',
            'work_experience'           => 'required',
            'passing_year'              => 'required',
            'marks_type'                => 'required',
            'CGPA'                      => 'required',
            'percentage'                => 'required',
            'Graduation_certificate'    => 'required',
        ];
    }
}
