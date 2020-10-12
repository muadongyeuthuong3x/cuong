<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackEnd\spkhachangmodel;
use App\BackEnd\Tensanphammodel;
use App\BackEnd\CartListthongtin;
use PDF;
use Illuminate\Support\Facades\DB;
class thongtindonhang extends Controller
{
    public function index(){
        $spphammuas = spkhachangmodel::get();
        $Cartlistthongtins =CartListthongtin::all();
        return view("back_end.listthongtin",compact("spphammuas" , "Cartlistthongtins"));
        }

        public function show($id){

            $tensps=[];
           $spkhachangmodels = spkhachangmodel::where('idspanhttlh',$id)->get();
           foreach ($spkhachangmodels as $key => $item) {
             $mathang= Tensanphammodel::where('id',$item['card_tensp'])->get();
             $tensps[$key] =$mathang;
           }
           return response()->json(['sanphammua'=>$spkhachangmodels ,'mathang'=>  $tensps],200);
        }

        public function PDFxuat($id){
            $pdf = \App::make('dompdf.wrapper');
            $tensp = [];
             $diachilh= CartListthongtin::where('id',$id)->get();
            $sanphamkhach = 'sanpham'.mt_rand(1000000, 9999999);
            $soluong = spkhachangmodel::where('idspanhttlh',$id)->get();
            foreach ($soluong as $key => $value) {
                $tensp[$key] =DB::table('tensanpham')->where('id',$value['card_tensp'])->get();
            }
             $tong = 0 ;
          foreach ($tensp as $key =>$item ){

          $tong =  ($item[0]->price_ban*$soluong[$key]->quanty)  + $tong;
          }
            $pdf = PDF::loadView('back_end.PDF',compact('tensp','soluong','diachilh','tong'));
            return $pdf->download($sanphamkhach.'.pdf');
        }
}
