@extends('layouts.app')

@section('content')


<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">product name</label>
            <input type="text" name="product_name" value="{{ old('product_name', $product->product_name) }}" class="form-control">
            <label for="product_desc">product description</label><br>
            <textarea name="product_desc" cols="200" rows="5">{{ old('product_desc', $product->product_desc) }}</textarea><br>
            <label for="product_price">product price</label>
            <input type="text" name="product_price" value="{{ old('product_price', $product->product_price) }}" class="form-control">
            <label for="product_image">product image</label>
            <input type="file" name="product_img" value="{{$product->product_img}}" class="form-control"><br>
            <label for="category_id">Category</label>
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id) == $category->id) ? 'selected' : '' }}>{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

@endsection
