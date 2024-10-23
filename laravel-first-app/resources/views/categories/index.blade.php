@extends('admin.dashboard')

@section('all categories')

    <div class="container mt-4">
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('categories.creat') }}" class="btn btn-primary">Add New Category</a>
        </div>

        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset("/storage/categories_img/$category->category_img") }}" class="card-img-top" alt="{{ $category->category_img }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->category_name }}</h5>
                            <p class="card-text">ID: {{ $category->id }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                                <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
