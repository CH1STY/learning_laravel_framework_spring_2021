<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
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
            'customer_name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:30',
            'address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'phone' => ['required','numeric','digits_between:11,15'],
            'product_id' => 'required',
            'product_name' => 'required',
            'unit_price' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|max:20|min:1',
            'total_price' => 'required|numeric|min:1',
            'payment_type' => 'required',

        ];
    }
}
