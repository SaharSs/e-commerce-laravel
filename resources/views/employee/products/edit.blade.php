@extends('admin.layouts.admin-dash')

@section('content')
<div class="container">
    <div class="row mt-8 p-5">
   
        <div class="col-md-8">
            <div class="card p-3">
                <h3 class="card-title">modifier {{ $product->title }}</h3>
                <div class="card-body">
                    <form method="post" action="{{ route('employee.products.update',$product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <input type="text"
                            name="title"
                            placeholder="Titre"
                            value="{{ $product->title }}"
                            class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="description" placeholder="Description"
                                cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="number"
                                name="price"
                                placeholder="Prix"
                                value="{{ $product->price }}"
                                class="form-control">
                        </div>
                        
                        <div class="form-group">
                           
                        <img src="/images/products/{{ $product['image'] }}"
                                   
                                   width="50"
                                   height="50"
                                   class="img-fluid rounded"
                               >
                        </div>
                        <div class="form-group">
                            <input type="file"
                            name="image"
                            class="form-control">
                        </div>
                        <div class="form-group">
                            <select name="category_id" class="form-control">
                                <option value="" selected disabled>
                                    Choisir une catégorie
                                </option>
                                @foreach ($categories as $category)
                                    <option
                                    {{ $product->category_id === $category->id ? "selected" : "" }}
                                    value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
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