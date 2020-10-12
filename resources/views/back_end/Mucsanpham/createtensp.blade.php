@extends('back_end.herder.herder')
@section('title')
 Thêm Mục sản phẩm
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route('them-ten-muc-san-pham.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên mục sản phẩm </label>
                    <input type="text" class="form-control" placeholder="Tên mục sản phẩm" name="tenmucsp">
                    {!! ShowErrors($errors, 'tenmucsp') !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Hãng sản phẩm </label>
                    <br>
                    <select class="form-control hangsp" name="id_hangsp" id="hangspselect" required="">
                        <option class="anchon" >___Chọn Hãng Sản Phẩm___</option>
                        @foreach ($hangsps as $hangsp )
                        <option value="{{ $hangsp['id']}}">{{$hangsp['tenhang'] }}</option>
                        @endforeach
                    </select>
                    @if($errors->loihangsp->first('id_hangsp'))
                    <div class="alert alert-warning mt-4" role="alert">
                    {{ $errors->loihangsp->first('id_hangsp') }}
                    </div>
                    @endif

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary">Reset </button>
            </form>

        </div>
    </div>



</div>

<script>

</script>

@endsection
