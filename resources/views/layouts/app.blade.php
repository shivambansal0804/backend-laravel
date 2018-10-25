<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    @yield('links')
    
</head>
<body>
    <div id="app">
        {{-- @include('inc.nav') --}}
        @auth
            @include('inc.sidebar')
        @endauth
        <div class="main-container">
            @include('inc.session')
            @include('inc.errors')
            @yield('content')
        </div>
    </div>
    <a class="back-to-top inner-link" href="#app" data-scroll-class="100vh:active">
        <i class="stack-interface stack-up-open-big"></i>
    </a>

        {{-- Theme Scripts --}}
        <script src="/js/app/jquery-3.1.1.min.js"></script>
        <script src="/js/app/flickity.min.js"></script>
        <script src="/js/app/easypiechart.min.js"></script>
        <script src="/js/app/parallax.js"></script>
        <script src="/js/app/typed.min.js"></script>
        <script src="/js/app/datepicker.js"></script>
        <script src="/js/app/isotope.min.js"></script>
        <script src="/js/app/ytplayer.min.js"></script>
        <script src="/js/app/lightbox.min.js"></script>
        <script src="/js/app/granim.min.js"></script>
        <script src="/js/app/jquery.steps.min.js"></script>
        <script src="/js/app/countdown.min.js"></script>
        <script src="/js/app/twitterfetcher.min.js"></script>
        <script src="/js/app/spectragram.min.js"></script>
        <script src="/js/app/smooth-scroll.min.js"></script>
        <script src="/js/app/scripts.js"></script>

        {{-- Page Scripts --}}
        @yield('scripts')
</body>
</html>
