@extends('admin.layouts.admin-dash')
@section('title','Dashboard')
@section('content')
<div class="container">

<div class="row mt-8 p-5">
      
      <div class="col-md-8">

   
<form class="form-inline"  action="{{route('admin.orders.searchO')}}">
@csrf
<a class="btn btn-primary" href ="{{ route('admin.orders.create') }}">Ajouter</a>

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
  <h1>commandes</h1>
{{session('msg')}}
<table class="table table-bordered">
  <thead >
   
      <th scope="col">id</th>
      <th scope="col">user_id</th>
      <th scope="col">total</th>
      
      <th scope="col">date</th>
      
      <th  colspan="2">action</th>
    </tr>
  </thead>
  <tbody>
   
        @foreach($orders as $order)
      
    <tr>

 
      <td>{{$order->id}}</td>
     
      <td>{{$order->user_id}}</td>
     
      <td>{{$order->total}}</td>
      <td>{{$order->created_at}}</td>
      
     <td> 
     <form action="{{ route('admin.orders.destroy',$order->id) }}" method="POST">  
     
      <a   class="btn btn-primary" href = '{{route("admin.orders.edit",$order->id)}}'>Modifier</a>
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
 {!!$orders->links()!!}
</div>
@endsection
