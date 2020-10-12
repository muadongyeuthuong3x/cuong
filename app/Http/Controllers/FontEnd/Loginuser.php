<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\userrequest;
use Illuminate\Support\Facades\Hash;

class Loginuser extends Controller
{


   public function Logout(){

        Auth::logout();

        return redirect()->route('trangchu')->with('thongbao' , 'Đăng xuất thành công');
    }





   public function dangnhap(){
       return view('font_end.login.dangnhap');
   }



    public function index(Request $request){
        $email=$request->email;
        $password=$request->password;
      if(  Auth::attempt(['email' => $email, 'password' => $password])){
          return redirect()->route('trangchu')->with('thongbao' , 'Đăng nhập thành công');
      }
      else{

         return redirect()->back()->with('thongbao','Tai khoản hoặc mật khẩu không chính xác')->withInput();

      }

    }



    public function create(){

        return view('font_end\login\dangki');
    }
    public function store(userrequest $request){
        User::create([
        'name' =>$request->name,
        'email' =>$request->email,
        'password' =>Hash::make($request->password),
        'role'=>0
        ]);

        return redirect()->route('trangchu')->with('thongbao','Đăng kí tài khoản thành công');

    }

    public function dangxuat(){
        Auth::logout();
        return view('font_end\trangchu\trangchu');
    }

    public function dangnhapadmin(){
         return view('back_end.loginuser.loginadmin');
    }
    public function vaotrangadmin(Request $request){
        $data = $request->only('email','password');
        if(Auth::attempt($data)){
            if(Auth::user()->role ==1){
                return redirect()->route('trangchuadmin');

            }
            else{
                return redirect()->route('trove')->with('thongbao','Bạn không có quyền truy cập hệ thống ');
            }
        }
        else{
            return redirect()->route('trove')->with('thongbao','Tài khoản mật khẩu sai ');
        }
    }
     public function ratrangadmin(){
        Auth::logout();
        return redirect()->route('dangnhapadmin');
     }
}
