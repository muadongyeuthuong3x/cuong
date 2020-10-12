@extends('back_end.herder.herder')
@section('title')
Danh sách  tên sản phẩm
@endsection

@section('content')
<div class="row">
    <a href="{{route('khoitaosp') }}">
        <button class="btn btn-success ml-5 mb-4">Thêm tên sản phẩm </button>
    </a>
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Bảng Danh Sách Tên Sản Phẩm </h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>id</th>

                            <th>Tên sản phẩm </th>
                            <th>Ngày Hết Hạn</th>
                            <th>Giá Nhập</th>
                            <th>Giá Bán </th>
                            <th>Ảnh Sản Phẩm </th>
                            <th>Trạng Thái </th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Repair</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>

                            <th>Tên sản phẩm </th>
                            <th>Ngày Hết Hạn</th>
                            <th>Giá Nhập</th>
                            <th>Giá Bán </th>
                            <th>Ảnh Sản Phẩm </th>
                            <th>Trạng Thái </th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Repair</th>
                            <th>Delete</th>

                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($Listsanpham as $key =>$tensp )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{$tensp['tensp']}}</td>
                            <td>{{$tensp['ngayhethan']}}</td>
                            <td>{{$tensp['price_nhap']}}</td>
                            <td>{{$tensp['price_ban']}}</td>
                            <td><img src="/PictureSp/{{ $tensp->image}} " alt="" style=" height:55px">
                            </td>
                            @if ($tensp['status']==1)
                            <td>Hiển Thị</td>
                            @else
                            <td>Ẩn</td>
                            @endif
                            <td>{{$tensp['created_at']}}</td>
                            <td>{{$tensp['updated_at']}}</td>

                            <td>
                                <a href="/admin/sua-ten-sp/{{ $tensp->id }}">
                                <button class="btn btn-primary edittensp" title="{{ " Sửa ".$tensp['tenhang'] }}" data-id="{{$tensp['id'] }}"><i class="fas fa-edit"></i>
                                </button>
                            </a>
                            </td>
                            <td>
                                <a href="/admin/xoa-ten-sp/{{ $tensp->id }}">
                                <button class="btn btn-danger deletetensp" title="{{ " Xóa ".$tensp['tenhang'] }}" data-toggle="modal" data-target="#delete" data-id="{{$tensp['id'] }}"><i class="fas fa-trash-alt"></i>
                                </button>
                            </a>
                            </td>
                        </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{--  <div class="trachclick">
    <div class="suasanpham">
        <div class="xoasua">X</div>
        <div class="container">
            <h1 style="color: red ; margin-left:10px;">Sửa  Sản Phẩm </h1>
            <form method="post" enctype="multipart/form-data" role="form" class="upload_form">
                    @csrf
                <input type="hidden" name="id" class="idTensp">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="form-group" style="width: 70%;">
                            <label for="exampleInputEmail1">Tên mục sản phẩm </label>

                            <select class="form-control mucsp" name="mucsp1" id="mucspselect">


                            </select>

                        </div>
                        <div class="form-group " style="width: 70%;">
                            <label for="exampleInputEmail1">Hãng sản phẩm </label>
                            <br>
                            <select class="form-control hangsp"  id="hangspselect">


                            </select>


                        </div>


                        <div class="form-group mt-3">
                            <label for="">Tên sản phẩm : </label>
                            <input type="text" name="tensp" id="" class="tensp1" placeholder="Tên sản phẩm ..." />
                            <p class="error" style="color: red"></p>
                        </div>



                        <div class="ngaysphh">
                            <p>Ngày sản phẩm hết hạn</p>
                            <input id="datepicker" width="276" name="ngaysphh1" class="ngaysphh1 " placeholder="DD/MM/YY" />
                        </div>
                        <div class="form-group">
                            <div class="form-group mt-3">
                                <label for="">Giá nhập : </label>
                                <input type="number" name="gianhap1" class="gianhap1" placeholder="Giá nhập" />
                                <span>VND</span>
                            </div>
                            <div class="form-group">
                                <label for="" class="mr-2">Giá bán : </label>
                                <input type="number" name="giaban1" class="giaban1" id="" placeholder="Giá bán" />
                                <span>VND</span>
                            </div>
                        </div>

                        <div class="form-group " style="width: 70%;">
                            <label for="exampleInputEmail1">Trạng Thái </label>
                            <br>
                            <select class="form-control tenspanhien1" name="status">
                                <option value="1" class="ht">Hiện</option>
                                <option value="0" class="kht">Ẩn</option>
                            </select>


                        </div>

                        <div class="form-group">

                            <label for="">Thêm mô tả sản phẩm</label>
                            <br/>
                            <textarea name="description1" class="form-control description1" id="editor1"></textarea>

                        </div>
                    </div>
                    <div class="col-lg-4">

                        <label for=""> Ảnh sản phẩm chính: </label>
                        <br>
                        <input type="file" id="file" name="anhsp1" onchange="return fileValidation()" class="tenanh1" />

                        <!-- Image preview -->
                        <div id="imagePreview" class="chonfile mt-3" />

                        <img style="width:50%;height:200px; " src="/back_end/img/man.png" class="image1" />

                    </div>
                </div>

                <div class="benphai">
                    <button type="submit" id="btn-update" class="btn btn-primary save12">Save </button>
                    <button type="reset" class="btn btn-secondary xoacanel">Cancel </button>
                </div>




            </form>
        </div>

    </div>

</div>  --}}

{{--  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left: 183px;">
                <button type="button" class="btn btn-success deletetensp1">Delete</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <div>
        </div>
    </div>
</div>  --}}
   <script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
    function fileValidation(){
        var fileInput = document.getElementById('file');
        var filePath = fileInput.value;//lấy giá trị input theo id
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
        var FileSize = file.files[0].size / 1024 / 1024; // in MB
        if (FileSize > 5) {
            alert('File size exceeds 2 MB');
            $('#file').val(''); //for clearing with Jquery
            return;
        } else {

        }
        //Kiểm tra định dạng
        if(!allowedExtensions.exec(filePath)){
        alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
        }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
        document.getElementById('imagePreview').innerHTML = '<img style="width:50%;height:200px;" src="'+e.target.result+'"/>';
        };
        reader.readAsDataURL(fileInput.files[0]);
        }
        }
        }





    CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    });
   </script>





@endsection
