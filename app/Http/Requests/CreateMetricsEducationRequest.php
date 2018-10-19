<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMetricsEducationRequest extends FormRequest
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
            'univ_roll_no'    =>  "nullable",
            'board'           =>  "nullable",
            'institute'       =>  "nullable",
            'month'           =>  "nullable",
            'year'            =>  "nullable",
            'obtained_marks'  =>  "nullable",
            'max_marks'       =>  "nullable",
            'marks_type'      =>  "nullable",
            'percentage'      =>  "nullable",
        ];
    }
}
