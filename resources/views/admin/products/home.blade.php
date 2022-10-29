@extends('admin.layouts.admin-dash')
@section('content')
<div class="container">
<div class="row mt-10 p-5">
    <div class="col-md-12">
  
    <form class="form-inline"  action="{{route('admin.products.searchP')}}">
@csrf

<a   class="btn btn-primary" href ="{{ route('admin.products.create') }}">Ajouter</a>

<div style="position: absolute; right: 0;" class="input-group input-group-sm">

<input  class="form-control form-control-navbar" name="q" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-navbar" type="submit">
<i class="fas fa-search"></i>
</button>

</div>
</div>
</form>

     

      <div class="card p-3">
      <h1>Produits</h1>
 <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Description</th>
                         <th>Prix</th>
                   
                        <th>Image</th>
                        <th>Categorie</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title}}</td>
                            <td>{{ $product->description }}</td>
                            
                            <td>{{ $product->price }} Dt</td>
                          
                            <td>
                                <img src="/images/products/{{ $product['image'] }}"
                                   
                                    width="50"
                                    height="50"
                                    class="img-fluid rounded"
                                >
                            </td>
                            <td>
                                {{ $product->category->name }}
                            </td>
                            <td> 
     <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST">  
     
      <a   class="btn btn-primary" href = '{{route("admin.products.edit",$product->id)}}'>modifier</a>
      @csrf
      @method('DELETE')
      
      <button type="submit" class="btn btn-danger">Supprimer</button>
      </form>
    </td>
    
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            </div>
    </div>
    <div class="justify-content-center d-flex">
                {!!$products->links()!!}
            </div>
</div>
</div>
@endsection
