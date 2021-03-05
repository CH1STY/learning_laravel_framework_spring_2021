<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddingRequest extends FormRequest
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
            'product_name' => 'required|min:5|max:30|regex:/^[\pL\s\-]+$/u',
            'category' => 'required|in:Liquid,Vegetable,Meat,Makeup,Grocery',
            'unit_price' => 'required|numeric|min:1',
            'vendor_id'=> 'required|exists:vendors,id',
            'status' => 'required|in:existing,upcoming',
        ];
    }

    public function messages()
    {
        return [
            'vendor_id.required' => 'Please Select Vendor Name',
            'vendor_id.exists' => 'Vendor Selection is invalid',
        ];
    }
    
}
