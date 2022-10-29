
@extends('admin.layouts.admin-dash')

@section('content')
<div class="container ">
    <div class="row mt-4">
      
        <div class="col-md-8">
            <div class="card p-3">
                <h3 class="card-title">Ajouter </h3>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.ordersp.store') }}" >
                    @csrf
                    <div class="form-group">
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
                            <select name="firstName" class="form-control">
                                <option value="" selected disabled>
                                Choisir un utilisateur
                                </option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->firstName }}">
                                        {{ $user->firstName }}
                                      
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                    <div class="form-group">
                            <select name="lastName" class="form-control">
                                <option value="" selected disabled>
                                Choisir un utilisateur
                                </option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->lastName }}">
                                        {{ $user->lastName }}
                                      
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="email" class="form-control">
                                <option value="" selected disabled>
                                Choisir email
                                </option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->email }}">
                                        {{ $user->email }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-group">
                         <label for="price">prix</label>
                         <input type="number" class="form-control" name="price" placeholder="prix" value="{{ old('prix') }}">
                         <span class="text-danger">@error('prix'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="quantity">quantity</label>
                         <input type="number" class="form-control" name="quantity" placeholder="quantity" value="{{ old('quantity') }}">
                         <span class="text-danger">@error('quantity'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="adress">adress</label>
                         <input type="text" class="form-control" name="adress" placeholder="adress" value="{{ old('adress') }}">
                         <span class="text-danger">@error('quantity'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="total">total</label>
                         <input type="number" class="form-control" name="total" placeholder="total" value="{{ old('phone') }}">
                         <span class="text-danger">@error('total'){{ $message }}@enderror</span>
                     </div>
                     
                     <div class="form-group">
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
                         <label for="phone">phone</label>
                         <input type="number" class="form-control" name="phone" placeholder="phone" value="{{ old('phone') }}">
                         <span class="text-danger">@error('total'){{ $message }}@enderror</span>
                     </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection