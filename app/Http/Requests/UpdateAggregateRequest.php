<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAggregateRequest extends FormRequest
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
            'univ_roll_no'     =>  'required',
            'semester'         =>  'required',
            'obtained_marks'   =>  'required',
            'max_marks'        =>  'required',
            'credits'          =>  'required',
            'active_backlog'   =>  'required',
            'passive_backlog'  =>  'required',
            'marks_type'       =>  'required',
            'percentage'       =>  'required',
            'semester_status'  =>  'required',
        ];
    }
}
