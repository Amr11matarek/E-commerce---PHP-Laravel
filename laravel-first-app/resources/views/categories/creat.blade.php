@extends('layouts.app')

@section('content')

<form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="category_name">category name</label>
        <input type="text" name="category_name" class="form-control">
        <label for="category_img">Category image</label>
        <input type="file" name="category_img" class="form-control"><br>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection
