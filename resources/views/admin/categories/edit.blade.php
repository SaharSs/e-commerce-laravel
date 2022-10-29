@extends('admin.layouts.admin-dash')
@section('content')
<div class="container">
<div class="row mt-8 p-5">
      
      <div class="col-md-8">
          <div class="card p-3">
<form method="post" action="{{ route('admin.categories.update',$category->id) }}" >
     @csrf
     @method('PUT')
     <div class="form-group">
     <input type="text" name="name" value="{{ $category->name}}" class="form-control">
</div>
   
     <input type="submit" class="btn btn-primary" name="submit" value="modifier">
</form>  
</div>
</div>
</div>
</div>

@endsection