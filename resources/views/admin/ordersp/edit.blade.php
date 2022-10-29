
@extends('admin.layouts.admin-dash')

@section('content')
<div class="container ">
    <div class="row mt-4">
      
        <div class="col-md-8">
            <div class="card p-3">
                <h3 class="card-title">Modifier</h3>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.ordersp.update',$ordersp->id)}}" >
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                    <label >produit</label>
                            <select name="product_title" class="form-control">
                                <option value="" selected disabled>
                                Choisir un produit
                                </option>
                                @foreach ($products as $product)
                                    <option value="{{$product->title}}">
                                        {{$product->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-group">
                    <label >prénom</label>
                         <input type="text" class="form-control" name="firstName"   value="{{$ordersp->firstName}}">
                         <span class="text-danger">@error('firstName'){{ $message }}@enderror</span>
                     </div>
           
                        </div>
                        <div class="form-group">
                        <label >nom</label>
                        <input type="text" class="form-control" name="lastName"   value="{{$ordersp->lastName}}">
                         <span class="text-danger">@error('lastName'){{ $message }}@enderror</span>
                     </div>
                    <div class="form-group">
                    <label for="price">email</label>
                    <input type="email" class="form-control" name="email"   value="{{$ordersp->email}}">
                         <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                      
                   
                        </div>
                        <div class="form-group">
                         <label for="price">prix</label>
                         <input type="number" class="form-control" name="price"   value="{{$ordersp->price}}">
                         <span class="text-danger">@error('prix'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="quantity">quantity</label>
                         <input type="number" class="form-control" name="quantity"   value="{{ $ordersp->quantity}}">
                         <span class="text-danger">@error('quantity'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="adress">adress</label>
                         <input type="text" class="form-control" name="adress"   value="{{ $ordersp->adress}}">
                         <span class="text-danger">@error('quantity'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                     <label for="total">O_id</label>
                            <select name="order_id" class="form-control">
                                <option value="" selected disabled>
                                Choisir 
                                </option>
                                @foreach ($orders as $order)
                                    <option value="{{ $order->id }}">
                                        {{ $order->id  }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                     <div class="form-group">
                         <label for="total">total</label>
                         <input type="number" class="form-control" name="total" value="{{ $ordersp->total }}">
                         <span class="text-danger">@error('total'){{ $message }}@enderror</span>
                     </div>
                     
                    
                     <div class="form-group">
                         <label for="phone">phone</label>
                         <input type="number" class="form-control" name="phone" value="{{ $ordersp->phone}}">
                         <span class="text-danger">@error('total'){{ $message }}@enderror</span>
                     </div>
                     <input type="submit" class="btn btn-primary" name="submit" value="modifier">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection