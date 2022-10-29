@extends('layouts.app')
    <!-- end header section -->
        <!-- slider section -->
       
@section('content')
<nav class="navbar navbar-expand-md navbar-dark bg-dark nav justify-content-center">
         
           
         <form action="{{url('/search')}}" class="form-check form-check-inline" method="GET" >
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

  

         
         <!-- header section strats -->
        
       
        
          
     
           
         <!-- end header section -->
         <!-- slider section -->
    
         
         <!-- end slider section -->
      
      <!-- why section -->
       <!-- end why section -->
       @include('web.w')
      
      <!-- arrival section -->
      @include('web.product')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('web.client')
      <!-- end client section -->
      <!-- footer start -->
     
      <!-- footer end -->
  
      @endsection