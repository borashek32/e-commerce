<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCouponForm extends FormRequest
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
            'code'         =>    'required',
            'type'         =>    'required|in:fixed,percent',
            'value'        =>    'required',
            'status'       =>    'required|in:active,inactive'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'The field "code" is required',
            'type.required' => 'The field "type" is required',
            'value.required' => 'The field "value" is required',
            'status.required' => 'The field "status" is required'
        ];
    }
}
