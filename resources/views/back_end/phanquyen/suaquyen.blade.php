@extends('back_end.herder.herder')
@section('title')
 Sửa nhóm quyền
@endsection

@section('content')
<div class="container">
    <form action="" method="post">
        @csrf
    <div class="row">

                     <div class="col-md-12">
                         <label for="" style="color: black; font-size:30px">Thêm nhóm quyền : </label>
                         <br>
                         <input type="text"  name="ten" value={{$role->name}}>
                         <br>
                         <label for="" style="color: black; font-size:30px">Mô tả quyền : </label>
                         <br>
                         <textarea name="motaquyen" id="mota" style="width: 400px;" > {{$role->display_name }} </textarea>
                     </div>


                     @foreach ($permissionsParents as $permissionsParent )
                <div class="card border-primary mb-3 col-lg-12">



                    <div class="card-header">
                        <h5 class="card-title" style="color: hsl(0, 85%, 56%)">
                        <label for="">
                            <input type="checkbox" value="" class="checkbox_wrapper">
                        </label>

                       {{ $permissionsParent->name}}
                         </h5>
                    </div>
                     <div class="row">
                        @foreach ($permissionsParent->mqhquyen as $permissionsItem )
                    <div class="card-body text-primary col-lg-3">
                        <h5 class="card-title">
                     <label for="">
                        <input type="checkbox"  name="permission_id[]"
                {{$cacquyens->contains('permission_id',$permissionsItem->id)? 'checked' :''    }}
                         value={{ $permissionsItem->id }} class="checkbox_childrent">
                     </label>
                   {{ $permissionsItem->name }}
                 </h5>

                </div>
                @endforeach
            </div>
        </div>
        @endforeach





    </div>
    <button type="submit" class="btn btn-primary">Save </button>

    <button type="reset" class="btn btn-secondary">Cancel </button>
</form>
<script type="text/javascript">
    textarea = document.querySelector('#mota');
    textarea.addEventListener('input', autoResize ,false);
    function autoResize(){
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    }
</script>
</div>




@endsection
