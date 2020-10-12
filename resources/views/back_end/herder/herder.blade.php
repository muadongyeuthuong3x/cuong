<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link href="/back_end/img/logo/logo.png" rel="icon">



  <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
  <link href="/back_end/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="/back_end/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="/back_end/css/toastr.min.css" rel="stylesheet">
  <link href="/back_end/css/mainback.css" rel="stylesheet">

  <link href="/back_end/css/ruang-admin.css" rel="stylesheet">
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="/back_end/js/jquery-1.11.3.min.js"></script>

  <script src="/back_end/js/gijgo.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>


</head>
<body id="page-top">


  @include('back_end.herder.thongbao')


  @yield('content')
  @yield('scripts')

  @include('back_end.herder.footer')

