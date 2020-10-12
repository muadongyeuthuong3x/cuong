@extends('back_end.herder.herder')
@section('title')
 Thêm hãng sản phẩm
@endsection

@section('content')
   <div class="container">
       <div class="row">
        <div class="col-lg-6">
        <form action="{{ route('them-hang-san-pham.store')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Tên hãng sản phẩm </label>
              <input type="text" class="form-control"  placeholder="Tên hãng sản phẩm" name="tenhang">
              {!! ShowErrors($errors, 'tenhang') !!}
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset </button>
          </form>

        </div>
       </div>
   </div>

@endsection
