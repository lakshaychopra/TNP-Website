<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePreviousEducationRequest extends FormRequest
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
            'univ_roll_no'    =>  "bail|required|numeric|min:6|exists:previous_education,univ_roll_no",
            'board'           =>  "required",
            'institute'       =>  "required",
            'month'           =>  "required",
            'year'            =>  "required",
            'obtained_marks'  =>  "required",
            'max_marks'       =>  "required",
            'year_gap'        =>  "required",
            'percentage'      =>  "required",
            'jee_rank'        =>  "required",
            'education'       =>  "required",
        ];
    }
}
