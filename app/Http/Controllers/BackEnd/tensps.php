<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackEnd\Tensanphammodel;
use App\BackEnd\MucSanPham1;
use App\BackEnd\HangSpModel;
use Illuminate\Support\Str;
use App\Http\Requests\tensp;
use App\Services\ImageService;

class tensps extends Controller
{
    public function index()
    {
        $hangsps=HangSpModel::all();
        $mucsps=MucSanPham1::all();
       $Listsanpham = Tensanphammodel::all();
       return view('back_end\tensanpham\Listtensp',compact('Listsanpham','hangsps','mucsps'));
    }

    public function create()
    {
        $hangsps=HangSpModel::all();
        $mucsps=MucSanPham1::all();
        return view('back_end.tensanpham.createtensp',compact(['hangsps','mucsps']));
    }
    public function store(tensp $request)
    {
     //   dd($request->all());
        if($request->hasFile('image')){
            $file =$request->file('image');
            $filenname = time().$file->getClientOriginalName();
            $file->move('Picturesp',$filenname);
            Tensanphammodel::create([
            'tensp'=>$request->tensp,
            'slug'=>Str::slug($request->tensp),
            'price_nhap'=>$request->price_nhap,
            'price_ban'=>$request->price_ban,
            'description' =>$request->description,
             'image' =>$filenname,
             'status' =>$request->status,
             'id_mucsp' =>$request->mucsp
            ]);
            return redirect()->route('list-sp')->with('thongbao','Thêm sản phẩm thành công');
        }
        else{
               return back()->with('thongbao','Thiếu ảnh sản phẩm');
        }




    }

    public function edit($id)
    {
       $tensp =  Tensanphammodel::find($id);
       $hangsps=HangSpModel::all();
       $mucsps=MucSanPham1::all();
       return view('back_end.tensanpham.suasp',compact('tensp','hangsps','mucsps'));

    }

    public function delete($id)
    {
        $tensp = Tensanphammodel::find($id);
        $image_path = 'Picturesp/'.$tensp['image'];
        if (file_exists($image_path)) {

            @unlink($image_path);

        }
        $tensp->delete();
        return redirect()->route('list-sp')->with('thongbao','Xóa sản phẩm thành công');
    }


    public function update(tensp $request ,$id)
    {

        if ($request->hasFile('image')) {
            $tensp =  Tensanphammodel::find($id);
            $image_path = 'Picturesp/'.$tensp['image'];
            if (file_exists($image_path)) {
                @unlink($image_path);
            }

            $file = $request->file('image');
            $filenname = time().$file->getClientOriginalName();
            $file->move('Picturesp', $filenname);

            $tensp->update([
         'tensp'=>$request->tensp,
        'slug'=>Str::slug($request->tensp),
        'price_nhap'=>$request->price_nhap,
        'price_ban'=>$request->price_ban,
        'description' =>$request->description,
         'image' =>$filenname,
         'status' =>$request->status,
         'id_mucsp' =>$request->mucsp
          ]);
            return redirect()->route('list-sp')->with('thongbao', 'Sửa sản phẩm thành công');
        }

        else{
            $tensp =  Tensanphammodel::find($id);
            $tensp->update([
                'tensp'=>$request->tensp,
               'slug'=>Str::slug($request->tensp),
               'price_nhap'=>$request->price_nhap,
               'price_ban'=>$request->price_ban,
               'description' =>$request->description,
                'status' =>$request->status,
                'id_mucsp' =>$request->mucsp
                 ]);
                   return redirect()->route('list-sp')->with('thongbao', 'Sửa sản phẩm thành công');
        }


    }



}
