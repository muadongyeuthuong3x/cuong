<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackEnd\setting;
use App\BackEnd\Tensanphammodel;
use App\BackEnd\HangSpModel;
class Trangchu extends Controller
{
    public function index(){
        $setting = setting::find(1);
        $tensps = Tensanphammodel::all();
        $hangsps= HangSpModel::all();
        return view('font_end.trangchu.trangchu',compact('setting','tensps','hangsps'));
    }
}
