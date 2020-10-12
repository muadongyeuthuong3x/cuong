<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userrequest extends FormRequest
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
            'name' =>'required|min:5',
            'email'=>'required|min:15|unique:users,email,'.($this->id ?? ''),
            'password'=>'required|min:6'
           ];
    }

    public function messages()
    {
        return[
        'name.required' =>'Tên không được để trống ',
        'name.min' =>'Tên phải tối thiểu 5 kí tự',
        'email.required' =>'email không được để trống',
        'email.min'=>'email phải tối thiểu 10 kí tự',
        'password.required' =>'không được để trống mật khẩu',
        'password.min' =>'mật khẩu phải tối thiểu 6 kí tự',
        'email.unique'=>'Da ton tai tai khoan'
        ];

    }
}
