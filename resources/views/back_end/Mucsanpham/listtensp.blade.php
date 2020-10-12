@extends('back_end.herder.herder')
@section('title')
Danh sách  mục sản phẩm
@endsection

@section('content')
<div class="row">
     <a href="{{route('them-ten-muc-san-pham.create') }}">
         <button class="btn btn-success ml-5 mb-4" >Thêm mục sản phẩm </button>
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
                    <th>Tên hãng</th>
                    <th>Tên mục sản phẩm</th>
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
                    <th>Tên mục sản phẩm</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Repair</th>
                    <th>Delete</th>

                  </tr>
            </tfoot>
            <tbody>

   @foreach ($mucsps as $key =>$mucsp )
   <tr>
   <td>{{ $key+1 }}</td>
   <td>{{$mucsp->mucsplk->tenhang}}</td>
   <td>{{$mucsp['tenmucsp'] }}</td>
   <td>{{$mucsp['created_at'] }}</td>
   <td>{{$mucsp['updated_at'] }}</td>
  <td> <button class="btn btn-primary editmucsp" title="{{ "Sửa ".$mucsp['tenhang'] }}" data-toggle="modal" data-target="#edit" type="button" data-id="{{$mucsp['id'] }}"><i class="fas fa-edit"></i></button></td>
   <td><button class="btn btn-danger deletemucsp" title="{{ "Xóa ".$mucsp['tenhang'] }}" data-toggle="modal" data-target="#delete1" type="button" data-id="{{$mucsp['id'] }}"><i class="fas fa-trash-alt"></i></button></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa tên mục sản phẩm </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12">
                        <form role="form">
                            <!-- <input type="hidden" name="id" value=""> -->
                            <fieldset class="form-group">
                                <label>Tên mục sản phẩm</label>
                                <input class="form-control tenmucsp" name="tenmucsp" placeholder="Nhập tên mục sản phẩm">
                                <span class="errormucsp" style="color: red;font-size: 1rem;"></span>
                            </fieldset>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hãng sản phẩm </label>
                                <br>
                                <select class="form-control hangsp" name="hangsp">

                                </select>
                                <span class="errorhangsp" style="color: red;font-size: 1rem;"></span>

                            </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success updatemucsp">Save</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end_update --}}




{{-- delete --}}
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
                <button type="button" class="btn btn-success delete1">Delete</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <div>
        </div>
    </div>
</div>

{{-- end_delete --}}
















@endsection
