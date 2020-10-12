@extends('back_end.herder.herder')
@section('title')
 Danh sách đơn hàng
@endsection



@section('content')


<div class="row">

   <!-- DataTable with Hover -->
   <div class="col-lg-12">
     <div class="card mb-4">
       <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
         <h6 class="m-0 font-weight-bold text-primary">Danh sách thông tin sản phẩm khác hàng </h6>
       </div>
       <div class="table-responsive p-3">
         <table class="table align-items-center table-flush table-hover" id="dataTableHover">
           <thead class="thead-light">
               <tr>
                   <th>id</th>
                   <th>Name</th>
                   <th>Số điện thoại</th>
                   <th>Tỉnh</th>
                   <th>Huyện</th>
                   <th>Xã</th>
                   <th>Thông tin đơn</th>



                 </tr>
           </thead>

           <tbody>

  @foreach ($Cartlistthongtins as $key => $Cartlistthongtin )


  <tr>
  <td> {{$key+1}}  </td>
  <td>{{ $Cartlistthongtin->name  }}</td>
  <td>{{ $Cartlistthongtin->sdt  }}</td>

  <td> {{$Cartlistthongtin->tinhlk->name  }}</td>
  <td> {{$Cartlistthongtin->huyenlk->name  }}</td>
   <td> {{$Cartlistthongtin->xalk->name  }}</td>
   <td>  <button class="btn btn-secondary edittensp  showsp" id="idsanphamkh" data-id="{{ $Cartlistthongtin->id }}"> Thông tin </button></td>
</tr>
@endforeach



           </tbody>
         </table>
       </div>
     </div>
   </div>
 </div>


 <div class="suasanpham">
    <div class="xoasua">X</div>
    <div class="container">
           <div class="row">
               <div class="col-lg-12">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>id</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>

                            <th>Ảnh sản phẩm</th>
                            <th>Tổng tiền</th>



                          </tr>
                    </thead>

                    <tbody class="xuat">









                    </tbody>


                  </table>
                  <button  class="btn btn-secondary addlink" style="float:right; margin-bottom:10px"><a href="/admin/donhang">Xuất đơn hàng</a> </button>




               </div>
           </div>


       </div>
    </div>

</div>





@endsection



