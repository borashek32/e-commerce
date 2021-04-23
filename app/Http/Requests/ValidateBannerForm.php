<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateBannerForm extends FormRequest
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
            'title'        =>   'required|string',
            'photo'        =>   'required',
            'status'       =>   'required|in:active,inactive'
        ];
    }

    public function messages()
    {
        return [
            'title.required'   => 'The field "title" is required',
            'title.string'     => 'The field "title" has to be string',
            'photo.required'   => 'The field "photo" is required',
            'status.required'  => 'The field "status" is required'
        ];
    }
}
