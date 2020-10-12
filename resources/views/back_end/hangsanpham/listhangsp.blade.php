@extends('back_end.herder.herder')
@section('title')
Danh sách  hãng sản phẩm
@endsection

@section('content')
<div class="row">
     <a href="{{route('them-hang-san-pham.create') }}">
         <button class="btn btn-success ml-5 mb-4" >Thêm hãng</button>
     </a>
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Bảng Danh Sách Nhóm Hãng </h6>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
                <tr>
                    <th>id</th>
                    <th>Tên hãng</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Repair</th>
                    <th>Delete</th>

                  </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Tên hãng</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Repair</th>
                    <th>Delete</th>

                  </tr>
            </tfoot>
            <tbody>

   @foreach ($tenhang as $key =>$hang )
   <tr>
   <td>{{ $key+1 }}</td>
   <td>{{$hang['tenhang'] }}</td>
   <td>{{$hang['created_at'] }}</td>
   <td>{{$hang['updated_at'] }}</td>
  <td> <button class="btn btn-primary edit" title="{{ "Sửa ".$hang['tenhang'] }}" data-toggle="modal" data-target="#edit" type="button" data-id="{{$hang['id'] }}"><i class="fas fa-edit"></i></button></td>
   <td><button class="btn btn-danger delete" title="{{ "Xóa ".$hang['tenhang'] }}" data-toggle="modal" data-target="#delete" type="button" data-id="{{$hang['id'] }}"><i class="fas fa-trash-alt"></i></button></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa tên hãng </h5>
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
                                <input class="form-control name" name="tenhang" placeholder="Nhập tên hãng">
                                <span class="error" style="color: red;font-size: 1rem;"></span>
                            </fieldset>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success update">Save</button>
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
                <button type="button" class="btn btn-success delete1">Delete</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <div>
        </div>
    </div>
</div>

{{-- end_delete --}}
















@endsection
