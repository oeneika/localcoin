<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CorpBinary</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Toastr -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet"/>

    <!-- Styles -->
    
    <link href="{{ asset('css/application.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<body>
        @include('layouts.menu')
        @include('layouts.header')
        <div class="wrap">
            @include('inc.messages')
            @yield('content')
        </div>
        

    <!-- common libraries. required for every page-->
<script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('lib/jquery-pjax/jquery.pjax.js') }}"></script>
<script src="{{ asset('lib/bootstrap-sass/assets/javascripts/bootstrap.min.js') }}"></script>
<script src="{{ asset('lib/widgster/widgster.js') }}"></script>
<script src="{{ asset('lib/underscore/underscore.js') }}"></script>
<script src="{{ asset('js/php.js') }}"></script>

<!-- common application js -->
<script src="{{ asset('js/settings.js') }}"></script>


    <!-- page specific scripts -->
        <!-- page libs -->
        <script src="{{ asset('lib/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('lib/jquery.sparkline/index.js') }}"></script>

        <script src="{{ asset('lib/backbone/backbone.js') }}"></script>
        <script src="{{ asset('lib/backbone.localStorage/backbone.localStorage-min.js') }}"></script>

        <script src="{{ asset('lib/d3/d3.min.js') }}"></script>
        <script src="{{ asset('lib/nvd3/build/nv.d3.min.js') }}"></script>

        <script src="{{ asset('js/chartjs-demo.js') }}"></script>
        <script src="{{ asset('js/chart.min.js') }}"></script>

        <!-- page application js -->
        <script src="{{ asset('js/chat.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.js.map"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

        <!-- SweetAlert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="{{ asset('js/delete_item.js') }}"></script>

        <!-- important routes -->
        <script>
                var url = {
                    storeSell:              '{{ route('storeSell') }}',
                    storeBuy:               '{{ route('storeBuy') }}',
                    updateBuy:              '{{ route('updateBuy') }}',
                    updateSell:             '{{ route('updateSell') }}',
                    makeTransaction:        '{{ route('makeTransaction') }}',
                    storeBankAccount:       '{{ route('storeBankAccount') }}'}
        </script>
        <!-- Page specific scripts -->
        @yield('footer_section')
</body>
</html>
