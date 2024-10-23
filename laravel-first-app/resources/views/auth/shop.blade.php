@extends('auth.home')

@section('user shop')

    <div class="container">
        <!-- Search Form -->
        <form action="{{ route('products.search') }}" method="GET" class="mb-4">
            @csrf
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for products..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset("/storage/product_img/$product->product_img") }}" class="card-img-top" alt="{{ $product->product_name }}">

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->product_name }}</h5>
                            <p class="card-text">{{ $product->product_desc }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ number_format($product->product_price, 2) }}</p>
                            <!-- Button to view more details -->
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>

@endsection
