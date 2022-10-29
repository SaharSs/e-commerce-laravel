@extends('admin.layouts.admin-dash')
@section('content')
<div class="container">
<div class="row  mt-8 p-5">
    
    <div class="col-md-8">
        <div class="card p-3">
        <h4>User Register</h4><hr>
<form method="post" action="{{ route('admin.users.update',$user->id) }}" >
     @csrf
     @method('PUT')
   
 
<div class="form-group">
     <input type="text" name="role" value="{{ $user->role}}"   class="form-control">
</div>
     <input type="submit" name="submit" value="modifier">
</form>  
</div>
</div>
</div>
</div>
 @endsection