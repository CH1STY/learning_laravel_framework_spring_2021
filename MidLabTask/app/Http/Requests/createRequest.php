<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\emailDbCheck;
use App\Rules\usernameDbCheck;
use App\Rules\phoneDbCheck;

class createRequest extends FormRequest
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
            'full_name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:20',
            'username' => ['required',new usernameDbCheck(),],
            'email' => ['required','email','min:10','max:50',new emailDbCheck()],
            'phone' => ['required','digits:11','numeric',new phoneDbCheck()],
            'city' => 'required|alpha|min:3|max:20',
            'country' => 'required|alpha|min:3|max:20',
            'companyName' => 'required|alpha|min:3|max:20',
            'password' => 'confirmed|required|min:6',
        ];
    }
}
