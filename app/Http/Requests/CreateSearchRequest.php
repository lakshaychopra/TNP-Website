<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSearchRequest extends FormRequest
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
            'univ_roll_no'                => 'nulllable',
            'branch_type'                 => 'nulllable',
            'active_backlog_aggregate'    => 'nullable',
            'percentage_XII'              => 'nullable',
            'tenth_percentage'            => 'nullable',
            'gender'                      => 'nullable',
            'percentage_Diploma'          => 'nullable'
            
        ];
    }
    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 200);
        }
    }
    
    
}
