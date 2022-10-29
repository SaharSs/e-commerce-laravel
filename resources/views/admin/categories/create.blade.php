
@extends('admin.layouts.admin-dash')

@section('content')
<div class="container">
    <div class="row mt-8 p-5">
      
        <div class="col-md-8">
            <div class="card p-3">
                <h3 class="card-title">Ajouter </h3>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.categories.store') }}" >
                    @csrf
                     <div class="form-group">
                         <label for="name">nom</label>
                         <input type="text" class="form-control" name="name" placeholder="nom" value="{{ old('name') }}">
                         <span class="text-danger">@error('name'){{ $message }}@enderror</span>
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