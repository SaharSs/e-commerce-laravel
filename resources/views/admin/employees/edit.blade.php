@extends('admin.layouts.admin-dash')
@section('content')
<div class="container">
<div class="row  mt-8 p-5">
    
    <div class="col-md-8">
        <div class="card p-3">
        <h4>modifier</h4><hr>
<form method="post" action="{{ route('admin.employees.update',$employee->id) }}" >
     @csrf
     @method('PUT')
     <div class="form-group">
     <input type="text" name="name" value="{{ $employee->name}}"   class="form-control">
</div>
<div class="form-group">
     <input type="email" name="email" value="{{ $employee->email}}"  class="form-control">
</div>
     <div class="form-group">  
     <input type="password" name="password" value="{{ $employee->password}}" class="form-control">
</div>
     <div class="form-group">
     <input type="text" name="phone" value="{{ $employee->phone}}" class="form-control">
</div>
     <div class="form-group">
     <input type="text" name="adress" value="{{ $employee->adress}}" class="form-control">
</div>
<div class="form-group">
     <input type="text" name="role" value="{{ $employee->role}}" class="form-control">
</div>
     <div class="form-group">
<input type="submit" name="submit" value="modifier">
</div>
</form>  
</div>
</div>
</div>
</div>
@endsection