<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'email'=>'required|email',
            'password'=>'required|min:6|max:37',
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'ops, please enter email',
            'password.required'=>'password cant be empty',
        ];
    }
}
