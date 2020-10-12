<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackEnd\HangSpModel;
use App\Http\Requests\Tenhang;
class ThemhangspController1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenhang=HangSpModel::paginate(5);
        return view('back_end.hangsanpham.listhangsp',compact("tenhang"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_end.hangsanpham.createhangsp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Tenhang $request)
    {
        HangSpModel::create([
            'tenhang'=>$request->tenhang,

        ]);
        return redirect()->route('them-hang-san-pham.index')->with('thongbao','Thêm tên hãng thành công');
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
        $tenhang = HangSpModel::find($id);
        return response()->json($tenhang,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tenhang $request, $id)
    {
        $hangsp =HangSpModel::find($id);
        $hangsp->update([
         'tenhang'=>$request->tenhang
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
        $hangsp =HangSpModel::find($id);
        $hangsp->delete();
       return response()->json(['success'=>'Xóa thành công']);
    }
}
