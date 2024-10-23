@extends('layouts.app')

@section('content')

<form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">category Name</label>
        <input type="text" name="category_name" value="{{ old('category_name', $category->category_name) }}" class="form-control" required>
        <label for="category_img">Category image</label>
        <input type="file" name="category_img" value="{{$category->category_img}}" class="form-control"><br>
    </div>
    <button type="submit" class="btn btn-primary">Update category</button>
</form>

@endsection
