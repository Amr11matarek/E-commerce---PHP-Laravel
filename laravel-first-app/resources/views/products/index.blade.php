@extends('admin.dashboard')
@section('all products')

    <br><br><a href="{{route('products.creat')}}" class="btn btn-primary">Add New Product</a><br><br>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card mb-4">

                    <img src="{{ asset("/storage/product_img/$product->product_img") }}" class="card-img-top" alt="{{ $product->product_name }}">

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->product_name }}</h5>

                        <p class="card-text">{{ $product->product_desc }}</p>

                        <p class="card-text"><strong>Price:</strong> ${{ number_format($product->product_price, 2) }}</p>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>

                            <form method="POST" action="{{ route('products.destroy', $product->id) }}">
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

    <div class="d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
@endsection
