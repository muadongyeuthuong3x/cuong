@extends('font_end.header_font.header_sp')
@section('title')
	Mua sản phẩm
@endsection

@section('content')


<section>
    <div class="container">
        <div class="row">


            <div class="col-sm-12 padding-right">

                <div class="product-details"><!--product-details-->

                    <form action="" method="post">
                        @csrf

                    <div class="col-sm-8">
                        <div class="view-product">
                            <img src="/Picturesp/{{ $tensp->image  }}" alt="" name="img" value={{ $tensp->image  }} />
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                              <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                      <a href=""><img src="/font_end/images/product-details/similar1.jpg" alt=""></a>
                                      <a href=""><img src="/font_end/images/product-details/similar2.jpg" alt=""></a>
                                      <a href=""><img src="/font_end/images/product-details/similar3.jpg" alt=""></a>
                                    </div>
                                    <div class="item">
                                      <a href=""><img src="/font_end/images/product-details/similar1.jpg" alt=""></a>
                                      <a href=""><img src="/font_end/images/product-details/similar2.jpg" alt=""></a>
                                      <a href=""><img src="/font_end/images/product-details/similar3.jpg" alt=""></a>
                                    </div>


                                </div>

                              <!-- Controls -->
                              <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>
                        </div>

                    </div>

                    <div class="col-sm-4">
                        <div class="product-information"><!--/product-information-->

                            <h2 name="name">{{ $tensp->tensp }}</h2>


                            <span>
                                <span name="price">{{ number_format($tensp->price_ban)  }} VNĐ</span>
                                <br>
                                <label>Số lượng :</label>
                                <input type="number" value="1"  min="1" name="qty"/>


                                <button type="submit" class="btn btn-fefault ">
                                  <a href="/trang-gioi-thieu-sanpham/cart/sanphammua/{{ $tensp->id }}">  <i class="fa fa-shopping-cart"></i>
                                     Mua sản phẩm
                                </a>
                                </button>
                            </span>


                        </div><!--/product-information-->
                    </div>
                </form>
                </div><!--/product-details-->




            </div>

        </div>
    </div>
</section>







@endsection
