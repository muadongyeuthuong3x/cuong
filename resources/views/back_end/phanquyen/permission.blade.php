@extends('back_end.herder.herder')
@section('title')
 Thêm nhóm quyền
@endsection

@section('content')
<div class="container">
    <form action="" method="post">
        @csrf
    <div class="row">

                     <div class="col-md-12">
                         <label for="" style="color: black; font-size:30px"> Nhóm chức năng của 1 Bảng : </label>
                         <br>

                          <select name="parent_id" id="">
                            @foreach (config('permission.table_module') as $key => $item)

                            @endforeach
                          </select>

                     </div>








    </div>
    <button type="submit" class="btn btn-primary">Save </button>
    <button type="reset" class="btn btn-secondary">Cancel </button>
</form>

</div>




@endsection
