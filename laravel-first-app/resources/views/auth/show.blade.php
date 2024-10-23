@extends('auth.home')

@section('user shop')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset("/storage/product_img/$product->product_img") }}" class="img-fluid" alt="{{ $product->product_name }}">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->product_name }}</h1>
                <p>{{ $product->product_desc }}</p>
                <p><strong>Price:</strong> ${{ number_format($product->product_price, 2) }}</p>
                <p><strong>Category:</strong> {{ $product->category->category_name }}</p>
                <a href="{{ route('auth.shop') }}" class="btn btn-secondary mt-3">Back to Shop</a>
            </div>
        </div>
    </div>

@endsection
