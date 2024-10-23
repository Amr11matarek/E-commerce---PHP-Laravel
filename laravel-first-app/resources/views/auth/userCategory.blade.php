@extends('auth.home')

@section('User Category')

    <div class="container mt-4">
        <h2 class="mb-4">Categories</h2>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ asset("/storage/categories_img/$category->category_img") }}" class="card-img-top" alt="{{ $category->category_name }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $category->category_name }}</h5>
                            <a href="{{ route('auth.categoryProducts', $category->id) }}" class="btn btn-primary">View Products</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
