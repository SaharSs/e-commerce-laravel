@extends('admin.layouts.admin-dash')
@section('title','Dashboard')
@section('content')
<div class="container">

<div class="row mt-12 p-5">
      
      <div class="col-md-16">

   
<form class="form-inline"  action="{{route('admin.ordersp.searchop')}}">
@csrf
<a class="btn btn-primary" href ="{{ route('admin.ordersp.create') }}">Ajouter</a>

<div style="position: absolute; right: 0;" class="input-group input-group-sm">
<input class="form-control form-control-navbar" name="q" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-navbar" type="submit">
<i class="fas fa-search"></i>
</button>

</div>
</div>
</form>
<div class="card p-12">
  <h1>commandes</h1>
{{session('msg')}}
<table class="table table-bordered">
  <thead >
   
      <th scope="col">id</th>
      <th scope="col">p_titre</th>
      <th scope="col">nom</th>
      <th scope="col">prénom</th>
      <th scope="col">email</th>
      <th scope="col">prix</th>
      <th scope="col">qte</th>
      <th scope="col">adress</th>
      <th  scope="col">c_id</th>
      <th  scope="col">total</th>
      <th scope="col">phone</th>
      <th scope="col" colspan="4">action</th>
    </tr>
  </thead>
  <tbody>
   
        @foreach($ordersp as $order)
      
    <tr>
    <td>{{$order->id}}</td>
      <td>{{$order->product_title}}</td>
      <td>{{$order->lastName}}</td>
      <td>{{$order->firstName}}</td> 
      <td>{{$order->email}}</td>
      <td>{{$order->price}}</td>
      <td>{{$order->quantity}}</td>
      <td>{{$order->adress}}</td>
      <td>{{$order->order_id}}</td>
      <td>{{$order->total}}</td>
      <td>{{$order->phone}}</td>
     
      
     <td> 
     <form action="{{ route('admin.ordersp.destroy',$order->id) }}" method="POST">  
     
      <a   class="btn btn-primary" href = '{{route("admin.ordersp.edit",$order->id)}}'>Modifier</a>
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
 {!!$ordersp->links()!!}
</div>
@endsection
