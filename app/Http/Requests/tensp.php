<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tensp extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @ret
     * urn bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'tensp'=>'required|min:5|max:20|unique:tensanpham,tensp,'.($this->id ?? ''),
            'mucsp'=>'numeric',
            'hangsp'=>'numeric',
            'price_nhap'=>'required|numeric',
            'price_ban'=>'required|numeric',
            'image'=>'required'


        ];
    }

    public function messages()
    {
        return [
            'tenspg.min'=>'Sản phẩm không được ít hơn 5 kí tự',
            'tensp.max'=>'Sản phẩm không được nhiều  hơn 20 kí tự',
            'tensp.unique'=>'Tên sản phẩm đã trùng trong hệ thống',
            'tensp.numeric' =>'Không được để trống',
            'mucsp.numeric' =>'Không được để trống',
            'hangsp.required' =>'Không được để trống',
            'price_nhap.numeric' =>'Không phải dạng số',
            'price_nhap.required' =>'Không được để trống',
            'price_ban.numeric' =>'Không phải dạng số',
            'price_ban.required' =>'Không được để trống',
            'image.required' =>'Thiếu ảnh sản phẩm',


        ];
    }
}
