<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackEnd\setting;
use App\BackEnd\district;
use App\BackEnd\ward;
use App\BackEnd\province;
use App\BackEnd\CartListthongtin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\BackEnd\spkhachangmodel;
use App\Mail\SendEmail;
use Cart;


class cartlist extends Controller
{
    public function index(){
        $setting = setting::find(1);
        $provinces = province::all();
        $districts =district::all();
        $wards =ward::all();

        $carts  = Cart::content();


        return view('font_end.shop.cartlist',compact('setting','provinces','wards','districts','carts'));
    }

    public function store(Request $request){
        $cart = [];
        $carts =[];

        $carttt= CartListthongtin::create([
            'name'=>$request->name,
            'sdt'=>$request->sdt,
            'tinh'=>$request->tinh,
            'quan'=>$request->huyen,
            'xa'=>$request->xa,

         ]);
      foreach (Cart::content() as $key => $value) {
        $cart['card_user'] = Auth::user()->id;
        $cart['quanty'] =$value->qty;
        $cart['card_tensp'] = $value->id;
        $cart['idspanhttlh'] = $carttt->id;
        $carts[$key] = spkhachangmodel::create($cart);



      }



      Mail::to(Auth::user()->email)->send(new SendEmail($carts));

      Cart::destroy();
       return redirect()->route('trangchu')->with('thongbao','Cảm ơn quý khách đã mua hàng');
   }

}
