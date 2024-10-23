@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth()->user())

        <h2>Welcome, {{Auth::user()->name}}</h2>
        <p>You are now logged in dashboard!</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf<input type="submit" value="logout">
        </form>
        <br><a href="{{route('categories.index')}}">Categories</a>
        <br><a href="{{route('products.index')}}">Products</a>
        @else
        <p>You are now logged out!</p>
        <a href="{{ route('login') }}">Login</a>
    @endif
    @yield('all categories')
    @yield('all products')
</div>
@endsection
