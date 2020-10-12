@extends('font_end.header_font.header_sp')
@section('title')
	Danh sách sản phẩm
@endsection

@section('content')

  @if( Cart::total() > 0 )
<section id="cart_items">

    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá bán</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền </td>
                        <td>Xóa sản phẩm</td>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($carts as $cart)



                    <tr>
                        <td class="cart_product">
                           <img src="/Picturesp/{{ $cart->options->img}}" alt="" style="width: 90px; height: 90px;">
                        </td>
                        <td class="cart_description">
                            <h4>{{ $cart->name  }}</h4>

                        </td>
                        <td class="cart_price">
                            <p>{{ number_format($cart->price)  }}</p>
                        </td>
                        <td class="cart_quantity">

                            <p>{{ $cart->qty }}</p>
                        </td>
                        <td class="">
                            <p class="cart_total_price1" id="tongiat" value="{{ number_format($cart->qty*$cart->price )}}" >{{ number_format($cart->qty*$cart->price )}} VNĐ</p>
                        </td>
                        <td class="cart_delete">
                          <a href="/trang-gioi-thieu-sanpham/cart/XoaItemCar/{{ $cart->rowId}}"><button class="cart_quantity_delete"  ><i class="fa fa-times"></i></button></a>
                        </td>
                    </tr>

                    @endforeach

                </tbody>






            </table>

        </div>
        <div style="float:right;" >
        <p class="cart_total_price" style=" font-size:20px">Tổng giá tiền : {{ Cart::total() }}  VNĐ</p>

        @if (Auth::user())
        <button type="button " class="btn btn-success" style="float: right ; margin-top:20px  ; margin-bottom:20px" data-toggle="modal" data-target="#edit" type="button">Thanh toán</button>
        @else
       <a href="{{  route('dangnhaptrang')   }}"> <button type="button " class="btn btn-warning" style="float: right ; margin-top:20px  ; margin-bottom:20px">Đăng nhập để thanh toán </button></a>
        @endif

    </div>
    </div>









    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form role="form" action="/trang-gioi-thieu-sanpham/cart/danhsachsanpham" method="POST">
                    @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin liên hệ </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">



                                <fieldset class="form-group">
                                    <label>Họ và tên </label>
                                    <input class="form-control " name="name" placeholder="Nhập tên ">
                                    <span class="errormucsp" style="color: red;font-size: 1rem;"></span>
                                </fieldset>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại liên hệ </label>
                                    <br>
                                    <input class="form-control tenmucsp" type="number" name="sdt" placeholder="Số điện thoại liên hệ ">
                                    <span class="errorhangsp" style="color: red;font-size: 1rem;"></span>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tỉnh </label>
                                    <br>

                                    <select class="form-control tinh anhien" name="tinh" id="tinh" onclick="genderChanged(this)">
                                        <option class="anchon">Chọn Tỉnh</option>
                                        @foreach ($provinces as $province)
                                        <option value="{{ $province->provinceid }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="errorhangsp" style="color: red;font-size: 1rem;"></span>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Huyện </label>
                                    <br>
                                    <select class="form-control anhien" id="huyen" name="huyen" onclick="genderChanged1(this)">
                                        <option class="anchon">Chọn Huyện</option>

                                    </select>

                                    <span class="errorhangsp" style="color: red;font-size: 1rem;"></span>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Xã </label>
                                    <br>
                                    <select class="form-control anhien" id="xa" name="xa">


                                    </select>

                                    <span class="errorhangsp" style="color: red;font-size: 1rem;"></span>

                                </div>



                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success ">Save</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>





    @endif
</section>

    <!--/#cart_items-->

    <script>
         var provinces = {!! json_encode($provinces->toArray()) !!};
         var wards = {!! json_encode($wards->toArray()) !!};
         var districts = {!! json_encode($districts->toArray()) !!};

         function genderChanged(obj)
        {
           // document.getElementById('huyen').innerText = null;
            var value = obj.value;
            districts.map(obj1 => {
               if(obj1['provinceid'] == value){

                    var x = document.getElementById("huyen");
                    var option = document.createElement("option");
                    option.text = obj1['name'];
                    option.value= obj1['districtid'];
                    x.add(option);

               }
             })


        }


        function genderChanged1(obj)
        {
           // document.getElementById('xa').innerText = null;
            var value = obj.value;
            wards.map(obj1 => {
               if(obj1['districtid'] == value){

                    var x = document.getElementById("xa");
                    var option = document.createElement("option");
                    option.text = obj1['name'];
                    option.value= obj1['wardid'];
                    x.add(option);


               }
             })


        }


    </script>




@endsection
