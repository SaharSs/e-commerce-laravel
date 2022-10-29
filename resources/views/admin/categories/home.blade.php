@extends('admin.layouts.admin-dash')
@section('title','Dashboard')
@section('content')
<div class="container">

<div class="row mt-8 p-5">
      
      <div class="col-md-8">

   
<form class="form-inline"  action="{{route('admin.categories.searchC')}}">
@csrf
<a class="btn btn-primary" href ="{{ route('admin.categories.create') }}">Ajouter</a>

<div style="position: absolute; right: 0;" class="input-group input-group-sm">
<input class="form-control form-control-navbar" name="q" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-navbar" type="submit">
<i class="fas fa-search"></i>
</button>

</div>
</div>
</form>

<div class="card p-2">
  <h1>categories</h1>
{{session('msg')}}
<table class="table table-bordered">
  <thead >
   
      <th scope="col">id</th>
      <th scope="col">nom</th>
      <th  colspan="2">action</th>
    </tr>
  </thead>
  <tbody>
   
        @foreach($categories as $category)
      
    <tr>

 
      <td>{{$category->id}}</td>
      <td>{{$category->name}}</td>
      
     <td> 
     <form action="{{ route('admin.categories.destroy',$category->id) }}" method="POST">  
     
      <a   class="btn btn-primary" href = '{{route("admin.categories.edit",$category->id)}}'>Modifier</a>
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
</div>
</div>
<div class="justify-content-center d-flex">
 {!!$categories->links()!!}
</div>
@endsection
