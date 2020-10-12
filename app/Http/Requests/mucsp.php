<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class mucsp extends FormRequest
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
            'tenmucsp'=>'required|min:5|max:20|unique:mucsanpham,tenmucsp,'.($this->id ?? ''),
            'id_hangsp' =>'required'
        ];
    }

    public function messages()
    {
        return [
            'tenmucsp.min'=>'Sản phẩm không được ít hơn 5 kí tự',
            'tenmucsp.max'=>'Sản phẩm không được nhiều  hơn 20 kí tự',
            'tenmucsp.unique'=>'Tên sản phẩm đã trùng trong hệ thống ',
            'tenmucsp.required' =>'Không được để trống',
            'id_hangsp.numeric' =>'Không được để trống'
        ];
    }
}
