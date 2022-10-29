
@extends('admin.layouts.admin-dash')

@section('content')
<div class="container">
    <div class="row mt-8 p-5">
      
        <div class="col-md-8">
            <div class="card p-3">
                <h3 class="card-title">Ajouter </h3>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.stocks.store') }}" >
                    @csrf
                    <div class="form-group">
                            <select name="product_id" class="form-control">
                                <option value="" selected disabled>
                                Choisir un produit
                                </option>
                                
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-group">
                         <label >qte</label>
                         <input type="number" class="form-control" name="quantity" placeholder="quantity" value="{{ old('quantity') }}">
                         <span class="text-danger">@error('quantity'){{ $message }}@enderror</span>
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