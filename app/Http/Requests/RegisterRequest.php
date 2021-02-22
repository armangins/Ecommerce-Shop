<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'=>'required|email|unique:users,email',
            'name'=>'required|min:2|max:70',
            'password'=>'required|min:6|max:36',
        ];
    }
}
