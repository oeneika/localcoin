<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    
    <link href="{{ asset('css/application.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<body>
        @include('layouts.menu')
        @include('layouts.header')
        <div class="wrap">
            @yield('content')
        </div>
        

    <!-- common libraries. required for every page-->
<script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('lib/jquery-pjax/jquery.pjax.js') }}"></script>
<script src="{{ asset('lib/bootstrap-sass/assets/javascripts/bootstrap.min.js') }}"></script>
<script src="{{ asset('lib/widgster/widgster.js') }}"></script>
<script src="{{ asset('lib/underscore/underscore.js') }}"></script>

<!-- common application js -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>


    <!-- page specific scripts -->
        <!-- page libs -->
        <script src="{{ asset('lib/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('lib/jquery.sparkline/index.js') }}"></script>

        <script src="{{ asset('lib/backbone/backbone.js') }}"></script>
        <script src="{{ asset('lib/backbone.localStorage/backbone.localStorage-min.js') }}"></script>

        <script src="{{ asset('lib/d3/d3.min.js') }}"></script>
        <script src="{{ asset('lib/nvd3/build/nv.d3.min.js') }}"></script>

        <!-- page application js -->
        <script src="{{ asset('js/index.js') }}"></script>
        <script src="{{ asset('js/chat.js') }}"></script>
</body>
</html>
