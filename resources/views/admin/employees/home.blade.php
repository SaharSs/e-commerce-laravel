
@extends('admin.layouts.admin-dash')
@section('title','Dashboard')

@section('content')
<div class="row mt-8 p-5">
      
      <div class="col-md-8">
  
<form class="form-inline" action="{{route('admin.employees.searchE')}}" >
@csrf
<a class="btn btn-primary" href ="{{ route('admin.employees.create') }}">Ajouter</a>

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
            <h1>employées</h1>
{{session('msg')}}
<table class="table table-bordered">
  <thead >
   
      <th scope="col">id</th>
      <th scope="col">nom</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">adresse</th>
      <th scope="col">role</th>
      <th colspan="3">action</th>
    </tr>
  </thead>
  <tbody>
    
        @foreach($employees as $employee)
      
    <tr>

 
      <td>{{$employee->id}}</td>
      <td>{{$employee->name}}</td>
      <td>{{$employee->email}}</td>
      <td>{{$employee->phone}}</td>
      <td>{{$employee->adress}}</td>
      <td>{{$employee->role}}</td>
     <td> 
     <form action="{{ route('admin.employees.destroy',$employee->id) }}" method="POST">  
     
      <a   class="btn btn-primary" href = '{{route("admin.employees.edit",$employee->id)}}'>Modifier</a>
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
<div class="justify-content-center d-flex">
{!!$employees->links()!!}
</div>
 @endsection

