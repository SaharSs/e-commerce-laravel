@extends('admin.layouts.admin-dash')
@section('content')

    
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row  mt-8 p-5">
            <div class="col-md-8" >
            <div class="card p-3">
                 <h4>Ajouter</h4><hr>
                 <form  action="{{ route('admin.employees.store') }}" method="post">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif

                    @csrf
                     <div class="form-group">
                         <label for="name">nom</label>
                         <input type="text" class="form-control" name="name" placeholder="nom" value="{{ old('name') }}">
                         <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                
                     <div class="form-group">
                         <label for="password">Mot de passe</label>
                         <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                         <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                        <label for="cpassword">Confirmer mot de passe</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm password" value="{{ old('cpassword') }}">
                        <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
                    </div>
                    
                    <div class="form-group">
                         <label for="password">Phone</label>
                         <input type="text" class="form-control" name="phone" placeholder="Enter number" value="{{ old('phone') }}">
                         <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                     </div>
                     
                     <div class="form-group">
                         <label for="adress">adresse</label>
                         <input type="text" class="form-control" name="adress" placeholder=" adresse " value="{{ old('adress') }}">
                         <span class="text-danger">@error('adress'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                            <label for="role">role:</label>

            <select name="role" id="role">
            <option value="">--Please choose an option--</option>
            <option value="supervisor">superviseur</option>
            <option value="employee">employé</option>
            <option value="employee">utilisateur</option>
              </select>
</div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-primary">Ajouter</button>
                     </div>
                     <br>
                    
                 </form>
            </div>
</div>
</div>
</div> 
</body>
</html>
@endsection