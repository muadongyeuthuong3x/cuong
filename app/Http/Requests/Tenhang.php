<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Tenhang extends FormRequest
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
            'tenhang'=>'required|min:5|max:20|unique:hangsanpham,tenhang,'.($this->id ?? ''),
        ];
    }

    public function messages()
    {
        return [
            'tenhang.min'=>'Sản phẩm không được ít hơn 5 kí tự',
            'tenhang.max'=>'Sản phẩm không được nhiều  hơn 20 kí tự',
            'tenhang.unique'=>'Tên sản phẩm đã trùng trong hệ thống ',
            'tenhang.required' =>'Không được để trống'
        ];
    }
}
