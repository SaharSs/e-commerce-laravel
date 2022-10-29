@extends('layouts.app')
    <!-- end header section -->
        <!-- slider section -->
       
@section('content')



<nav class="navbar navbar-expand-md navbar-dark bg-dark nav justify-content-center">
         
           
         <form action="{{url('/sear')}}" class="form-check form-check-inline" method="GET" >
         <div class="input-group" >
             <select   name="category"  >
                 <option value="ALL" {{request("category") == "ALL" ? 'selected' : ''}}>Catégories</option>
                 @foreach($categories as $category)
                 <option value="{{$category->id}}" {{request("category") == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                 @endforeach
                </select>
                
             <input  class="form-control md-sm-2" name="product"  value="{{request('products')}}">
             </div>
             <button style="margin: auto;" class="btn btn-outline-info my-2 my-sm-0">Search</button>
            
          </form>
     
</nav>
@include('web.slider')
<div class="container" style="padding: 30px 0">
    <div class="row">
<div class="panel panel-default">
    <div class="panel-heading">
        Update Profile
    </div>
    <div class="panel-body">
    <form method="post" action="{{ route('web.profile.update',$users->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                   
       <div class="col-md-4">
       <img src="/images/products/{{$users->image}}" width="50%" height="50%"  alt="">
                     
  <input type="file" name="image"  >


       </div>
       <div class="col-md-8">
<p><b>prénom:</b><input type="text" name="firstName"  class="form-control" value="{{$users->firstName}}"></p>
<p><b>nom:</b><input type="text" name="lastName"  class="form-control" value="{{$users->lastName}}"></p>
<p><b>email:</b>{{$users->email}}</p>
<p><b>phone:</b><input type="text" name="phone"  class="form-control" value="{{$users->phone}}"></p>
<p><b>adress:</b><input type="text" name="adress"  class="form-control" value="{{$users->adress}}"></p>
<input     type="submit" name="submit" value="modifier">


       </div>

       



        </form>



</div>
</div>
    </div>

                  @endsection