
   
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
   
@extends('admin.layouts.admin-dash')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supervisor Register</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
</head>
<body>
<div class="container">
        <div class="row  mt-8 p-5">
            <div class="col-md-8" >
            <div class="card p-3">
                 <h4>User Register</h4><hr>
                 <form  action="{{ route('admin.users.store') }}" method="post"  enctype="multipart/form-data">
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
                         <label for="name">prénom</label>
                         <input type="text" class="form-control" name="firstName" placeholder="prénom" value="{{ old('firstName') }}">
                         <span class="text-danger">@error('firstName'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="name">nom</label>
                         <input type="text" class="form-control" name="lastName" placeholder="nom" value="{{ old('lastName') }}">
                         <span class="text-danger">@error('lastName'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                
                     <div class="form-group">
                         <label for="password">Password</label>
                         <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                         <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm password" value="{{ old('cpassword') }}">
                        <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
                    </div>
                    
                    <div class="form-group">
                         <label for="password">Phone</label>
                         <input type="text" class="form-control" name="phone" placeholder="Enter number" value="{{ old('phone') }}">
                         <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                     </div>
                     
                     <div class="form-group">
                         <label for="adress">adress</label>
                         <input type="text" class="form-control" name="adress" placeholder="Enter adress " value="{{ old('adress') }}">
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
                            <input type="file"
                            name="image"
                            class="form-control" required>
                        </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-primary">Register</button>
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