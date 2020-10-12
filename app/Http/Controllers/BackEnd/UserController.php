<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\BackEnd\role;
use App\BackEnd\roleuser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =User::paginate(5);
        return view('back_end.Useradmin.Listuser',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $roles = role::all();
        return view('back_end.Useradmin.createuser',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());

         try{
             DB::beginTransaction();
            //Nếu bạn muốn bắt đầu giao dịch theo cách thủ công và có toàn quyền kiểm
            //soát đối với các lần khôi phục và cam kết, bạn có thể sử dụng beginTransactionphương pháp trên DB:

            $data = User::create([
                'name' =>$request->name,
                'email' =>$request->email,
                'password' =>Hash::make($request->password),
                'role' =>1
                ]);
                $data->roles1()->attach($request->role_user);





             DB::commit();

                return redirect()->route('them-user-admin.index')->with('thongbao','Thêm user thanh cong');

         }
         catch(\Exception $exception){
             DB::rollBack();
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

        $user = User::find($id);
        $roles =role::all();
         $quyenuser = roleuser::where('user_id',$id)->get();
         return response()->json(['user'=>$user , 'roles' =>$roles,'quyenuser'=>$quyenuser],200);
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
       $user = User::find($id);



       try{
        DB::beginTransaction();
        //Nếu bạn muốn bắt đầu giao dịch theo cách thủ công và có toàn quyền kiểm
        //soát đối với các lần khôi phục và cam kết, bạn có thể sử dụng beginTransactionphương pháp trên DB:

       $userupdate =   $user->update([
            'name' =>$request->name,
            'email' =>$request->email,
            'role' =>1
            ]);
            $user->roles1()->sync($request->role_user);
           DB::commit();
           return response()->json(['success'=>'Sửa user thành công'],200);
    }
    catch(\Exception $exception){
        DB::rollBack();
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user= User::find($id);
       $user->delete();
        return response()->json(['success'=>'Xóa user thành công']);
    }
}
