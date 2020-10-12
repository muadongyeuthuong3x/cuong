<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackEnd\setting;
use App\Http\Requests\settingrequest;
class thongtinlh extends Controller
{
    public function index(Request $request ){
        $setting = setting::find(1);
        return view('back_end.Setting',compact('setting'));
    }

    public function updatett(settingrequest $request){

        $setting = setting::find(1);
        $setting->update([
            'sdt' =>$request->sdt,
            'email' =>$request->email
        ]);
        return redirect()->back()->with('thongbao','Chỉnh sửa thông tin liên hệ thành công');
    }
}
