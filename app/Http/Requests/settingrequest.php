<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class settingrequest extends FormRequest
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
            'sdt'=>'required',
            'email' =>'required'
        ];
    }
    public function messages()
    {
        return [

            'sdt.required' =>'Không được để trống',
            'email.numeric' =>'Không được để trống'
        ];
    }
}
