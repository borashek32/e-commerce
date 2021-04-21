<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCategoryForm extends FormRequest
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
            'title'        =>    'required|string',
            'summary'      =>    'nullable',
            'is_parent'    =>    'sometimes|in:1',
            'parent_id'    =>    'nullable|exists:categories,id',
            'status'       =>    'required|in:active,inactive'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The field "title" is required',
            'title.string' => 'The field "title" has to be string',
            'status.required' => 'The field "status" is required'
        ];
    }
}
