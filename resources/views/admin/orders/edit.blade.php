@extends('admin.layouts.admin-dash')
@section('content')
<div class="container">
<div class="row mt-8 p-5">
      
      <div class="col-md-8">
          <div class="card p-3">
<form method="post" action="{{ route('admin.orders.update',$order->id) }}" >
     @csrf
     @method('PUT')
     <div class="form-group">
     <input type="number" name="total" value="{{ $order->total}}" class="form-control">
</div>
<div class="form-group">
                            <select name="user_id" class="form-control">
                                <option value="" selected disabled>
                                Choisir un utilisateur
                                </option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->firstName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
   
     <input type="submit" class="btn btn-primary" name="submit" value="modifier">
</form>  
</div>
</div>
</div>
</div>

@endsection