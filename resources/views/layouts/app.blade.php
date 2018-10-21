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
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script> --}}
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="/js/flickity.min.js"></script>
        <script src="/js/easypiechart.min.js"></script>
        <script src="/js/parallax.js"></script>
        <script src="/js/typed.min.js"></script>
        <script src="/js/datepicker.js"></script>
        <script src="/js/isotope.min.js"></script>
        <script src="/js/ytplayer.min.js"></script>
        <script src="/js/lightbox.min.js"></script>
        <script src="/js/granim.min.js"></script>
        <script src="/js/jquery.steps.min.js"></script>
        <script src="/js/countdown.min.js"></script>
        <script src="/js/twitterfetcher.min.js"></script>
        <script src="/js/spectragram.min.js"></script>
        <script src="/js/smooth-scroll.min.js"></script>
        <script src="/js/scripts.js"></script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    @yield('scripts')
</body>
</html>
