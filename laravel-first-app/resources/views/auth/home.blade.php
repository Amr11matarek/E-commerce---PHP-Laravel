@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth()->user())
            <h2>Welcome, {{ Auth::user()->name }}</h2>
            <p>You are now logged in!</p>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <input type="submit" value="logout">
            </form>
            <br><a href="{{route('auth.userCategory')}}">Categories</a>
            <br><a href="{{route('auth.shop')}}">Products</a>
        @else
            <p>You are now logged out!</p>
            <a href="{{ route('login') }}">Login</a>
        @endif

        @yield('User Category')
        @yield('user shop')
    </div>
@endsection
