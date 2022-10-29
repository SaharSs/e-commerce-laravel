@extends('admin.layouts.admin-dash')
@section('title','Dashboard')

@section('content')

<div class="container">
  <div class="row mt-8 p-5">
  
  <div class="col-md-10">
  <form class="form-inline"  action="{{route('admin.users.searchU')}}">
@csrf
<a class="btn btn-primary" href ="{{ route('admin.users.create') }}">Ajouter</a>

<div style="position: absolute; right: 0;" class="input-group input-group-sm">
<input class="form-control form-control-navbar" name="q" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-navbar" type="submit">
<i class="fas fa-search"></i>
</button>

</div>
</div>
</form>
     <div class="card p-3">
    <h1>Clients</h1>
{{session('msg')}}
<table class="table table-bordered">
  <thead>
    <tr>
 
      <th scope="col">id</th>
      <th scope="col">prénom</th>
      <th scope="col">nom</th>
      <th scope="col">email</th>
     
      <th scope="col">phone</th>
      <th scope="col">adresse</th>
      <th scope="col">role</th>
      <th scope="col" colspan="3">action</th>
    
    </tr>
  </thead>
  <tbody>

        @foreach($users as $user)
      
    <tr>
      <td>{{$user->id}}</td>
      <td>{{$user->firstName}}</td>
      <td>{{$user->lastName}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->adress}}</td>
      <td>{{$user->role}}</td>
     <td> 
     <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST">  
     
      <a class="btn btn-primary"  href = '{{route("admin.users.edit",$user->id)}}'>Modifier</a>
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
{!!$users->links()!!}
</div>
 @endsection
 