@extends('admin.layouts.admin-dash')

@section('content')
<div class="container">
    <div class="row  mt-8 p-5">
    
        <div class="col-md-8">
            <div class="card p-3">
                <h3 class="card-title">Ajouter</h3>
                <div class="card-body">
                    <form method="post"  action="{{ route('employee.products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text"
                            name="title"
                            placeholder="Titre"
                            class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="description" placeholder="Description"
                                cols="15" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number"
                                name="price"
                                placeholder="Prix"
                                class="form-control">
                        </div>
                
                        <div class="form-group">
                            <input type="file"
                            name="image"
                            class="form-control">
                        </div>
                        <div class="form-group">
                            <select name="category_id" class="form-control">
                                <option value="" selected disabled>
                                Choisir une catégorie
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
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