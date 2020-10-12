<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackEnd\setting;
use App\BackEnd\Tensanphammodel;
use Cart;

class muahang extends Controller
{
    public function index(Request $request , $id){
        $setting = setting::find(1);
        $tensp =Tensanphammodel::find($id);

        return view('font_end.shop.sanphammua',compact('setting','tensp'));
    }

        public function store(Request $request ,$id){

         $tensp= Tensanphammodel::find($id);

       // dd($tensp);
         $qty = $request->qty;

         Cart::add([
            'id' => $tensp->id,
            'name' => $tensp->tensp,
            'qty' => $qty,
            'price' =>$tensp->price_ban,
            'weight'=>'0',
            'options' => ['img' => $tensp->image]]);


            return redirect()->route('cartlist')->with('thongbao' , 'Mua sản phẩm thành công ');

        }

        public function Delete(Request $request,$rowId){

         Cart::remove($rowId);
         return redirect()->back()->with('thongbao','Xóa giỏ hàng thành công');
    }


}

