<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSemesterMarksRequest extends FormRequest
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
            'univ_roll_no'     =>  'nullable',
            'semester'         =>  'nullable',
            'obtained_marks'   =>  'nullable',
            'max_marks'        =>  'nullable',
            'credits'          =>  'nullable',
            'active_backlog'   =>  'nullable',
            'passive_backlog'  =>  'nullable',
            'stream'           =>  'nullable',
            'marks_type'       =>  'nullable',
            'percentage'       =>  'nullable',
            'semester_status'  =>  'nullable',
        ];
    }
}
