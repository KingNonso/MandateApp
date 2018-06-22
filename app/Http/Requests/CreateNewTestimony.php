<?php

namespace Mandate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewTestimony extends FormRequest
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
            'subject' => 'required',
            'category' => 'required',
            'happen_to' => 'required',
            'contact' => 'required',
            'testimony' => 'required',
        ];
    }
}
