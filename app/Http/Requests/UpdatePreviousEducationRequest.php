<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePreviousEducationRequest extends FormRequest
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
            'univ_roll_no'                     =>  "bail|required|numeric|min:6|exists:previous_education,univ_roll_no",
            'education'                        =>  "nullable",
            'XII_board'                        =>  "nullable",
            'XII_institute'                    =>  "nullable",
            'XII_year'                         =>  "nullable",
            'XII_obtained_marks'               =>  "nullable",
            'XII_max_marks'                    =>  "nullable",
            'jee_rank'                         =>  "nullable",                         
            'XII_percentage'                   =>  "nullable",
            'diploma_board'                    =>  "nullable",
            'diploma_institute'                =>  "nullable",
            'diploma_year'                     =>  "nullable",
            'diploma_obtained_marks'           =>  "nullable",
            'diploma_max_marks'                =>  "nullable",
            'diploma_percentage'               =>  "nullable",
            'year_gap'                         =>  "nullable",
            'diploma_previous_edu_certificate' =>  "nullable",
            'XII_previous_edu_certificate'     =>  "nullable"
        ];
    }
}
