<!DOCTYPE html>

<html lang="en">
<head><script nonce="46acdf4c-4b5f-4a1a-87a1-d1142beeab23">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]},a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),z.defer=!0,z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
  <base href="{{ \URL::to('/') }}">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">
<script src="https://use.fontawesome.com/c136d0c310.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>


<li class="nav-item d-none d-sm-inline-block">


        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        </li>



</ul>

</nav>


<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="admin/home" class="brand-link">
<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
<span class="brand-text font-weight-light">Project</span>
</a>

<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">

<div class="info">
          <a href="#" class="d-block admin_name">{{ Auth::user()->name }}</a>
        </div>
</div>



<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact nav-child-indent nav-collapse-hide-child nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if(Auth::user()->role=="admin")
              
                <li class="nav-item">
          
                <a href="{{ route('admin.home')}}" style="font-size:30px">
                  <i class="nav-icon fas fa-home"></i>
                  
                    Dashboard
            
                </a>
</li>




 
<li class="nav-item">
            <a  href="admin/users" style="font-size:30px">
            <i class="nav-icon fas fa-user" ></i>
              
            Clients
              
            </a>
          </li>
   
              <li class="nav-item">
          
            <a  href="admin/categories" style="font-size:30px">
            <i class="nav-icon fas fa-user"></i>
              
               Categories
              
            </a>
          
          </li>
          

        
          <li class="nav-item">
          
          <a  href="admin/orders" style="font-size:30px">
          <i  class="fa fa-arrow-right"></i>
            
            commandes
            
          </a>
        
        </li>
        
        
          <li class="nav-item">
            <a  href="admin/products" style="font-size:30px">
            <i  class="fa fa-arrow-right"></i> 

              
               Produits
              
            </a>
          </li>
  
          <li class="nav-item">
            <a  href="admin/ordersp" style="font-size:30px">
            <i  class="fa fa-arrow-right"></i> 

              
          commande
              
            </a>
          </li>
          <li class="nav-item">
            <a  href="admin/stocks" style="font-size:30px">
            <i  class="fa fa-arrow-right"></i> 

              
               stock
              
            </a>
          </li>
       @endif
       
        </ul>
      </nav>
</div>

</aside>

<div class="content-wrapper " style="width:100%">

@yield('content')

</div>


<aside class="control-sidebar control-sidebar-dark">

<div class="p-3">
<h5>Title</h5>
<p>Sidebar content</p>
</div>
</aside>


<footer class="main-footer">

<div class="float-right d-none d-sm-inline">
Anything you want
</div>

<strong>Copyright &copy; 2022-2023 projet</strong> All rights reserved.
</footer>
</div>



<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>