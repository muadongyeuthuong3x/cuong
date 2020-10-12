<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/font_end/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font_end/css/font-awesome.min.css" rel="stylesheet">
    <link href="/font_end/css/prettyPhoto.css" rel="stylesheet">
    <link href="/font_end/css/price-range.css" rel="stylesheet">
    <link href="/font_end/css/animate.css" rel="stylesheet">
    <link href="/font_end/css/main.css" rel="stylesheet">

    <link href="/back_end/css/toastr.min.css" rel="stylesheet">
	<link href="/font_end/css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="/font_end/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/font_end/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/font_end/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/font_end/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/font_end/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">

								<li><a href=""><i class="fa fa-phone"></i> <span name="iphone">{{ $setting['sdt']  }}</span></a></li>
								<li><a href=""><i class="fa fa-envelope"></i><span name="email">{{ $setting['email']  }}</span></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="font_end/images/home/logo.png" alt="" /></a>
						</div>

					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
                                @if (Auth::user())
                              <li style="margin-top:10px">{{ Auth::user()->name ?? ' ' }}</li>

                                @else
                                <li><a href="{{ route('dangnhaptrang') }}"><i class="fa fa-user"></i> Đăng nhập</a></li>

                                @endif


                                @if (Auth::user())
                                <li><a href="{{ route('dangxuat') }}"><i class="fa fa-lock"></i> Đăng xuất </a></li>

                                  @else
                                  <li><a href="{{ route('dangki') }}"><i class="fa fa-lock"></i> Đăng kí </a></li>

                                  @endif



					


							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ route('trangchu') }}">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">


										<li><a href="{{ route('cartlist') }}" class="active">CartList</a></li>

                                    </ul>
                                </li>



							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="search_box " style="width:80%">
                            <input type="text" placeholder="Search..." style="width:100%" style="color:red;"/>

                        </div>
                        <input type="submit" value="Tìm kiếm" class="btn btn-success search-right"/>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

    @yield('content')


    @include('font_end.header_font.footer')
