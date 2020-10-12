@extends('back_end.herder.herder')
@section('title')
Danh sách  User
@endsection

@section('content')
<div class="row">
     <a href="{{route('them-user-admin.create') }}">
         <button class="btn btn-success ml-5 mb-4" >Thêm User</button>
     </a>
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Bảng Danh Sách User </h6>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
                <tr>
                    <th>id</th>
                    <th>Tên User</th>
                    <th>Tài khoản</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Repair</th>
                    <th>Delete</th>

                  </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Tên User</th>
                    <th>Tài khoản</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Repair</th>
                    <th>Delete</th>

                  </tr>
            </tfoot>
            <tbody>

   @foreach ($users as $key =>$user )
   <tr>
   <td>{{$key+1 }}</td>
   <td>{{$user['name'] }}</td>
   <td>{{$user['email'] }}</td>
   <td>{{$user['created_at'] }}</td>
   <td>{{$user['updated_at'] }}</td>
  @can('sua-user')
  <td> <button class="btn btn-primary edituser" title="{{ "Sửa ".$user['name'] }}" data-toggle="modal" data-target="#edit" type="button" data-id="{{$user['id'] }}"><i class="fas fa-edit"></i></button></td>
  @endcan
  @can('xoa-user')
   <td><button class="btn btn-danger delete" title="{{ "Xóa ".$user['name'] }}" data-toggle="modal" data-target="#delete" type="button" data-id="{{$user['id'] }}"><i class="fas fa-trash-alt"></i></button></td>
   @endcan
</tr>
   @endforeach



            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  {{-- update --}}
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa user </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form">
            <div class="modal-body">
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12">
                        <form role="form">
                            <!-- <input type="hidden" name="id" value=""> -->
                            <fieldset class="form-group">
                                <label>Tên hãng</label>
                                <input class="form-control name"  placeholder="Nhập tên user">
                                <span class="error" style="color: red;font-size: 1rem;"></span>
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Tài khoản  gmail đăng nhập</label>
                                <input class="form-control email"  placeholder="Tài khoản  gmail đăng nhập" required='' id="taikhoan"/>
                                <span class="error" style="color: red;font-size: 1rem;"></span>
                            </fieldset>

                            <div class="form-group" style="width: 100%" >
                                <label for="">Chọn vai trò</label>
                                <br>
                                <select class="form-control listrole hoahia" name="role_user[]" multiple id="hh">


                                </select>

                            </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success updateuser">Save</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </form>
        </div>
    </div>
</div>
{{-- end_update --}}




{{-- delete --}}
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left: 183px;">
                <button type="button" class="btn btn-success deleteuser1">Delete</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <div>
        </div>
    </div>
</div>

{{-- end_delete --}}




@endsection
