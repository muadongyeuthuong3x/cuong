@extends('back_end.herder.herder')
@section('title')
 Thêm Tên Sản Phẩm
@endsection

@section('content')

<h1 style="color: red ; margin-left:10px;">Thêm Sản Phẩm </h1>
<div class="container">
    <form action="{{ route('khoitaosp')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row">

        <div class="col-lg-8">

            <div class="form-group" style="width: 70%;">
                <label for="exampleInputEmail1">Tên mục sản phẩm </label>

                <select class="form-control  mucsp" name="mucsp" id="mucspselect">
                    <option class="anchon" >___Chọn Mục Sản Phẩm___</option>
                </select>
                {!! ShowErrors($errors, 'mucsp') !!}


            </div>
            <div class="form-group " style="width: 70%;">
                <label for="exampleInputEmail1">Hãng sản phẩm </label>
                <br> {{-- {!!dd($hangsps);!!} --}}
                <select class="form-control hangsp" name="hangsp" id="hangspselect" onchange="genderChanged(this)">
                    <option class="anchon" >___Chọn Hãng Sản Phẩm___</option>
                    @foreach ($hangsps as $hangsp )
                    <option value="{{ $hangsp['id']}}">{{$hangsp['tenhang'] }}</option>
                    @endforeach
                </select>


            </div>


            <div class="form-group mt-3">
                <label for="">Tên sản phẩm : </label>
                <input type="text" name="tensp" id="" placeholder="Tên sản phẩm ..." /> {!! ShowErrors($errors, 'tensp') !!}
            </div>




            <div class="form-group">
                <div class="form-group mt-3">
                    <label for="">Giá nhập : </label>
                    <input type="number" name="price_nhap" class="gianhap" placeholder="Giá nhập" min="1000" />
                    <span>VND</span> {!! ShowErrors($errors, 'price_nhap') !!}
                </div>
            </div>

            <div class="form-group">
                <label for="" class="mr-2">Giá bán : </label>
                <input type="number" name="price_ban" class="giaban" id="" placeholder="Giá bán" min="1000" />
                <span>VND</span> {!! ShowErrors($errors, 'price_ban') !!}
            </div>

            <div class="form-group">

                <label for="">Thêm mô tả sản phẩm</label>
                <br/>
                <textarea name="description" class="form-control description" id="editor1"></textarea>

            </div>

            <div class="form-group " style="width: 70%;">
                <label for="exampleInputEmail1">Trạng Thái </label>
                <br>
                <select class="form-control hangsp" name="status">
                    <option value="1">Hiện</option>
                    <option value="0">Ẩn</option>
                </select>


            </div>


        </div>









        <div class="col-lg-4">

            <label for=""> Ảnh sản phẩm chính: </label>
            <br>
            <input type="file" id="file" name="image" onchange="return fileValidation()" />

            <!-- Image preview -->
            <div id="imagePreview" class="chonfile mt-3" />

            <img style="width:50%;height:200px; " src="/back_end/img/man.png" />
            {!! ShowErrors($errors, 'image') !!}

        </div>
        </div>

    </div>

    <div class="di_chuyen">
        <button type="submit" class="btn btn-primary">Save </button>
        <button type="reset" class="btn btn-secondary">Cancel </button>
    </div>



</div>
</form>
</div>

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



        var sites = {!! json_encode($mucsps->toArray()) !!};
        console.log(sites);

        function genderChanged(obj)
        {
            document.getElementById('mucspselect').innerText = null;
            var value = obj.value;
            sites.map(obj1 => {
               if(obj1['id_hangsp'] == value){

                    var x = document.getElementById("mucspselect");
                    var option = document.createElement("option");
                    option.text = obj1['tenmucsp'];
                    option.value= obj1['id'];
                    x.add(option);
               }
             })


        }









</script>


@endsection
