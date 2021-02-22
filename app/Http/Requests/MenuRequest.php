<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MenuRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $item_id = !empty($request['item_id']) ? ','.$request['item_id'] : '';
        return [
            'link'=>'required ',
            'url'=>'required|regex:/^[a-z\d-]+$/|unique:menus,url'.$item_id,
            'title'=>'required ',
        ];
    }

    public function messages()
    {
        return [
            'url.regex'=>'The URL must contain only lowercase letters and numbers'
        ];
    }
}
