<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProductForm extends FormRequest
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
            'title'        =>   'required',
            'photo'        =>   'required',
            'status'       =>   'required',
            'stock'        =>   'required',
            'brand_id'     =>   'required',
            'category_id'  =>   'required',
            'price'        =>   'required',
            'offer_price'  =>   'required',
            'size'         =>   'required',
            'condition'    =>   'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'        =>   'The field "title" is required',
            'photo.required'        =>   'The field "photo" is required',
            'status.required'       =>   'The field "status" is required',
            'stock.required'        =>   'The field "stock" is required',
            'brand_id.required'     =>   'The field "brand_id" is required',
            'category_id.required'  =>   'The field "category_id" is required',
            'price.required'        =>   'The field "price" is required',
            'offer_price.required'  =>   'The field "offer_price" is required',
            'size.required'         =>   'The field "size" is required',
            'condition.required'    =>   'The field "condition" is required',
        ];
    }
}
