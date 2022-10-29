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
<section class="product_section layout_padding">
         

            <div class="heading_container heading_center">
               <h2>
               Nos <span>produits</span>
               </h2>
            </div>
            <div class="row">
            @foreach($products as $prod)
               <div class="col-sm-6 col-md-4 ">
              
                  <div class="box" width="100px" height="100px">
           
                     <div class="option_container">
                       
                        <div class="options">
                           <a href="web/prod/{{$prod->id}}" class="option1">
                           Add To Cart
                           </a>
                        
                        </div>
                     </div>
                     
                     <div class="img-box"  >
                        <img src="/images/products/{{ $prod['image']}}" width="100%" height="100%"  alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                         {{$prod->title}}
                        </h5>
                        <h6>
                        {{$prod->price}}DT
                        </h6>
                     
                     </div>
                    
                  </div>
               </div>
               @endforeach
               
                     
               
            </div>
           
        
      </section>
      @endsection