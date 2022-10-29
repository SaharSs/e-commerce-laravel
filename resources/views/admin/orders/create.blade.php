
@extends('admin.layouts.admin-dash')

@section('content')
<div class="container">
    <div class="row mt-8 p-5">
      
        <div class="col-md-8">
            <div class="card p-3">
                <h3 class="card-title">Ajouter </h3>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.orders.store') }}" >
                    @csrf
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
                    <div class="form-group">
                         <label for="total">total</label>
                         <input type="number" class="form-control" name="total" placeholder="total" value="{{ old('total') }}">
                         <span class="text-danger">@error('total'){{ $message }}@enderror</span>
                     </div>
                   
                     
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection