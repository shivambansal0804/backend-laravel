<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 64px;
                text-align: center;
                margin-top: 20%;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .container {
                max-width: calc(70%);
                margin: 0 auto;
                margin-bottom: 3rem;
            }

            hr {
                height: 1px; border: none; color: #222; background: #22222240;
            }

            a {
                text-decoration: none;
            }
            
            .img__wrap { height: 20rem; overflow: hidden}
            
            .img {
                width: 100%;
            }
        </style>
    </head>
    <body>
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
        <div class="content" style="margin-top:4rem;">
            @yield('content')
        </div>
    </body>
</html>
