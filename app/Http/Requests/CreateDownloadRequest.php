<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDownloadRequest extends FormRequest
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
            'title'         => 'bail|required|min:5|max:50',
            'user_id'       => 'required',
            'username'      => 'required',
            'file'          => 'nullable',
            'file_name'     => 'nullable',
            'file_path'     => 'nullable',
            'file_link'     => 'nullable',
            'file_type'     => 'nullable',
            'file_size'     => 'nullable',
        ];
    }
}
