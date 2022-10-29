<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('front/images/logo.jpg')}}" type="">
      <title>e-commerce</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('front/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('front/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet" />
      <script src="https://use.fontawesome.com/c136d0c310.js"></script>

   </head>
   <body>
   
         
      
        <!-- header section strats -->
          @include('web.header')
         
        
        <!-- end slider section -->
   
    <div id="app">
   
            @yield('content')
</div>
        <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="#"> Templates</a><br>
         
            Distributed By <a href="#" target="_blank">Lorem ipsum dolor</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="{{asset('front/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('front/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('front/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('front/js/custom.js')}}"></script>
   </body>
</html>
