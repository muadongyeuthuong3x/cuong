<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackEnd\HangSpModel;
use App\Http\Requests\mucsp;
use App\BackEnd\MucSanPham1;
use Illuminate\Support\Facades\Validator;
class MucSanPham extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mucsps=MucSanPham1::paginate(5);
        return view('back_end.Mucsanpham.listtensp',compact("mucsps"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hangsps = HangSpModel::all();
        return view('back_end.Mucsanpham.createtensp',compact('hangsps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(mucsp $request)
    {
      // dd($request->all());
      if ($request->id_hangsp != 0) {
        MucSanPham1::create([
        'tenmucsp'=>$request->tenmucsp,
        'id_hangsp'=>$request->id_hangsp

    ]);
        return redirect()->route('them-ten-muc-san-pham.index')->with('thongbao', 'Thêm tên mục sản phẩm  thành công');
    }
    else{
        $validator = Validator::make($request->all(), [
            'id_hangsp' => 'required',
        ],[
            'id_hangsp.required'=>'Hãy chọn hãng sản phẩm'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator,'loihangsp');
        }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mucsps = MucSanPham1::find($id);
        $hangsps=HangSpModel::all();
        return response()->json(['mucsps'=>$mucsps, 'hangsp' => $hangsps],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mucsp1 =MucSanPham1::find($id);
        $mucsp1->update([
         'tenmucsp'=>$request->tenmucsp,
         'id_hangsp'=>$request->id_hangsp
        ]);
        return response()->json(['success'=>'Update thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $mucsp =MucSanPham1::find($id);
        $mucsp->delete();
       return response()->json(['success'=>'Xóa thành công']);
    }
}
