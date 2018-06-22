<?php

namespace Mandate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserLocation extends FormRequest
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
            'church' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
        ];
    }
}
