<?php

namespace Mandate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewConvert extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'surname' => '',
            'sex' => 'required',
            'phone' => '',
            'email' => '',
            'address' => '',
            'age' => 'required',
            'occupation' => 'required',
            'request' => '',
        ];
    }
}
