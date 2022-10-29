@extends('layouts.app')

@section('content')
@include('web.slider')
</br></br> 
@if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif
<div class="container">
<div class="row  justify-content-between">
    <div class="col-6">

    <div class="card mb-4 box-shadow">
    <img class="card-img-top" src="/images/products/{{ $product['image']}}">
        </div>
    </div>
    <div class="col-6">
   <h1 class="jumbotron-heading">{{$product->title}}</h1>
<h5>{{$product->price}}DT</h5>
<p>{{$product->description}}</p>
<form action="{{route('web.addtocart')}}" method="POST" >
@csrf
    <input type="number" name="qte">
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <button type="submit" class="btn btn-primary">Ajouter au panier </button>
</form>

    </div>




</div>







</div>
@endsection