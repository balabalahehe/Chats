<?php

namespace App\Http\Requests\client;

use Illuminate\Foundation\Http\FormRequest;

class themTaiKhoanRequest extends FormRequest
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
            'fullname'     => 'required|max:50',
            'email'        => 'required|email|unique:users',
            'phonenumber'  => 'required|min:10|max:12',
            'password'     => 'required',
            
        ];
    }
}
