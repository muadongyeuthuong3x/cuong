@extends('back_end.herder.herder')
@section('title')
 Thay đổi thông tin liên hệ
@endsection

@section('content')
<h1 style="color: red ; margin-left:10px;">Thay đổi thông tin liên hệ </h1>
<div class="container">
    <form action="{{ route('updatettlhadmin')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row">

            <div class="col-lg-12">
                 <div value="1" hidden name="id"></div>
                <div class="form-group " style="width: 70%;">
                    <label for="exampleInputEmail1">Số điện thoại liên hệ :  </label>
                    <br>
                    <input type="number" name="sdt" id="sdt" value="{{ $setting['sdt']}}" style="width: 50%;"  class="thongtin1 ttlh" />
                    {!! ShowErrors($errors, 'sdt') !!}
                </div>





                <div class="form-group " style="width: 70%;">
                    <label for="exampleInputEmail1">Email liên hệ quản trị : </label>
                    <br>
                    <input type="email" name="email" id="email" value="{{ $setting['email']}}" style="width: 50%;"  class="thongtin ttlh"  />
                    {!! ShowErrors($errors, 'email') !!}
                </div>






                    <div>
                        <button type="submit" class="btn btn-primary thongtinadmin">Save </button>
                        <button type="reset" class="btn btn-secondary">Cancel </button>
                    </div>


                </div>





        </div>
    </form>
    </div>





@endsection
