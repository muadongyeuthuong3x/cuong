@extends('back_end.herder.herder')
@section('title')
Danh sách các nhóm quyền
@endsection

@section('content')
<div class="row">
     <a href="/admin/them-nhom-quyen">
         <button class="btn btn-success ml-5 mb-4" >Thêm nhóm quyền </button>
     </a>
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Bảng Danh Sách Mục Sản Phẩm </h6>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
                <tr>
                    <th>id</th>
                    <th>Tên quyền</th>
                    <th>Mô tả quyền</th>
                     <th>Sửa</th>
                     <th>Xóa</th>
                  </tr>
            </thead>

            <tbody>

   @foreach ($tennhomquyens as $key =>$tennhomquyen )
   <tr>
   <td>{{ $key+1 }}</td>
   <td>{{$tennhomquyen->name}}</td>
   <td>{{$tennhomquyen->display_name}}</td>

  <td> <a href="/admin/sua-nhom-quyen/{{$tennhomquyen->id}}"><button class="btn btn-primary edittensp"  data-toggle="modal" data-target="#edit" type="button" data-id="{{$tennhomquyen['id'] }}"><i class="fas fa-edit"></i></button></a></td>
   <td><button class="btn btn-danger deletequyen"  data-toggle="modal" data-target="#delete1" type="button" data-id="{{$tennhomquyen['id'] }}"><i class="fas fa-trash-alt"></i></button></td>
</tr>
   @endforeach



            </tbody>
          </table>

          <div>{{ $tennhomquyens->links() }}</div>
        </div>
      </div>
    </div>
</div>


  <div class="modal fade" id="delete1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left: 183px;">
                <button type="button" class="btn btn-success deletenhomquyen">Delete</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <div>
        </div>
    </div>
</div>


@endsection
