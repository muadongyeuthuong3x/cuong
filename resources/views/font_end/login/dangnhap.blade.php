   @extends('font_end.login.herder')
   @section('title')
        Đăng nhập trang
   @endsection



   @section('content')

   <h1 class="w3ls">Đăng nhập trang</h1>

   <div class="content-w3ls">

       <div class="content-agile2">
           <form action="{{ route('dangnhaptrang1')  }}" method="post">
               @csrf

               <div class="form-control w3layouts">
                   <input type="email" id="email" name="email" placeholder="mail@example.com" title="Please enter a valid email" required="">
                   {!! ShowErrors($errors, 'email') !!}

               </div>

               <div class="form-control agileinfo">
                   <input type="password" class="lock" name="password" placeholder="Password" id="password1" required="">
                   {!! ShowErrors($errors, 'password') !!}
               </div>


               <input type="submit" class="register" value="submit">
           </form>


           <p class="wthree w3l">Fast Signup With Your Favourite Social Profile</p>
           <ul class="social-agileinfo wthree2">
               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#"><i class="fa fa-youtube"></i></a></li>
               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
           </ul>
       </div>
       <div class="clear"></div>
   </div>

 


   @endsection





