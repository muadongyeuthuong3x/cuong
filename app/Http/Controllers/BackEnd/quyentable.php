<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackEnd\permission;
use App\BackEnd\role;
use App\BackEnd\permissionrole;
class quyentable extends Controller
{
   public function index(){
       return view('back_end.phanquyen.permission');
   }


    public function khoitao()
    {
        $permissionsParents  = permission::where('parent_id', 0)->get();
        return view('back_end\phanquyen\createrole', compact('permissionsParents'));
    }
    public function luu(Request $request){
        $cacquyen = $request->permission_id;

        $role1 = role::create([
        'name'=>$request->ten,
        'display_name'=>$request->motaquyen
    ]);
   // $role1->permissions()->attach($cacquyen);

   foreach ($cacquyen as $value) {
    permissionrole::create([
    'role_id' =>$role1->id,
    'permission_id'=>$value
   ]);
}
return redirect()->route('listquyen')->with('thongbao', 'Tạo nhóm quyền thành công');

    }


    public function danhsach(){
            $tennhomquyens = role::paginate(10);
            return view('back_end\phanquyen\listquyen', compact('tennhomquyens'));
    }

    public function delete($id){
        $role = role::find($id);
        $role->delete();
        return response()->json(['success'=>'Xóa  thành công']);
    }


    public function edit($id)
    {
        $permissionsParents  = permission::where('parent_id', 0)->get();
        $role= role::find($id);
        $cacquyens = permissionrole::where('role_id', '=', $id)->get();

        return view('back_end\phanquyen\suaquyen', compact('permissionsParents', 'cacquyens','role'));
    }








    public function updatequyen(Request $request,$id)
    {

        $role1=role::find($id);

            $role1->update([
                'name'=>$request->ten,
                'display_name'=>$request->motaquyen,
                 ]);

            $cacquyen = $request->permission_id;
            // dd($cacquyen);
            $permissionrole = permissionrole::where('role_id', '=', $id);

            $permissionrole->delete();
            foreach ($cacquyen as $value) {
                permissionrole::create([
                      'role_id' =>$role1->id,
                     'permission_id'=>$value,

                 ]);
            }

            return redirect()->route('listquyen')->with('thongbao', 'Sửa nhóm quyền thành công');

}
}
