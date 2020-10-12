@extends('back_end.herder.herder')
@section('title')
 Thêm user quản trị
@endsection



@section('content')
<h1 style="color: red ; margin-left:10px;">Thêm User quản trị </h1>
<div class="container">

    <form action="{{ route('them-user-admin.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row">

            <div class="col-lg-12">

                <div class="form-group " style="width: 70%;">
                    <label for="exampleInputEmail1">Tên người quản trị : </label>
                    <br>
                    <input type="text" name="name" id="" placeholder="Tên quản trị ..." style="width: 50%;" />
                </div>

                <div class="form-group " style="width: 70%;">
                    <label for="exampleInputEmail1">Tài khoản đăng nhập : </label>
                    <br>
                    <input type="text" name="email" id="" placeholder="Tài khoản đăng nhập ..." style="width: 50%;" required='' />
                </div>



                <div class="form-group ">
                    <label for=""> Mật khẩu : </label>
                    <br>
                    <input type="password" class="lock" name="password" placeholder="Password" id="password1" style="width: 50%;" {!! ShowErrors($errors, 'password') !!} </div>

                    <div class="form-group mt-3 ">
                        <label for="">Nhập lại mật khẩu : </label>
                        <br>
                        <input type="password" class="lock" name="confirm-password" placeholder="Confirm Password" id="password2" style="width: 50%;">
                    </div>


                   <div class="form-group">
                       <label for="">Chọn vai trò</label>

                       <select class="form-control listrole" name="role_user[]" multiple>
                           @foreach ($roles as $role)
                           <option value="{{ $role->id}}">{{ $role->name}}</option>

                           @endforeach

                       </select>

                   </div>


                    <div>
                        <button type="submit" class="btn btn-primary">Save... </button>
                        <button type="reset" class="btn btn-secondary">Cancel </button>
                    </div>


                </div>





        </div>
    </form>
    </div>


<script type="text/javascript">
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }
    function validatePassword(){
        var pass2=document.getElementById("password2").value;
        var pass1=document.getElementById("password1").value;
        if(pass1!=pass2)
            document.getElementById("password2").setCustomValidity("2 mật khẩu không trùng khớp");
        else
            document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
    }





</script>




@endsection



