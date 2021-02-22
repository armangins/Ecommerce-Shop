<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoriesRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

  
    public function rules(Request $request)
    {
        $item_id = !empty($request['item_id']) ? ','.$request['item_id'] : '';
        return [
            'title'=>'required ',
            'article'=>'required ',
            'url'=>'required|regex:/^[a-z\d-]+$/|unique:categories,curl'.$item_id,
            'image'=>'image ',
        ];
    }

    public function messages()
    {
        return [
            'url.regex'=>'The URL must contain only lowercase letters and numbers'
        ];
    }
}
