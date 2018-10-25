<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>DTUTimes</title>

        {{-- Theme css --}}
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
            rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/main/bootstrap.css') }}" type="text/css" />
        
        {{-- Page css --}}
        @yield('links')
    </head>
    <body>

        {{-- Navbar --}}
        @if (Route::has('login'))
        <div class="top-right links">
            <a href="{{ route('welcome') }}">Home</a>
            <a href="{{ route('blog.index') }}">Blog</a>            
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('team') }}">Team</a>
            <a href="{{ route('contact') }}">Contact</a> @auth
            <a href="{{ url('/dashboard') }}">Dashboard</a> @else
            <a href="{{ route('login') }}">Login</a> @endauth
        </div>
        @endif

        {{-- Main Container --}}
        @yield('content')

        {{-- Theme Scripts --}}


        {{-- Custom Scripts --}}
        @yield('scripts')
    </body>
</html>
