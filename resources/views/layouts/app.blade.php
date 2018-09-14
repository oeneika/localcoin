<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/bootstrap/4.1.0/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="{{ asset('plugins/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/default/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/default/style-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/default/theme/default.css') }}" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/jquery-jvectormap/jquery-jvectormap.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('plugins/pace/pace.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->
</head>

<body class="pace-top bg-white" style="overflow-y: auto;">
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade show"><span class="spinner"></span></div>
        <!-- end #page-loader -->
            <!-- begin #page-container -->
            <div id="page-container" class="fade">
                @yield('content')
            </div>
            <!-- end page container -->
        
    <!-- common libraries. required for every page-->
    <script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/4.1.0/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('plugins/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('js/theme/default.min.js') }}"></script>
    <script src="{{ asset('js/apps.min.js') }}"></script>

    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('plugins/gritter/js/jquery.gritter.js') }}"></script>
    <script src="{{ asset('plugins/flot/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('plugins/flot/jquery.flot.time.min.js') }}"></script>
    <script src="{{ asset('plugins/flot/jquery.flot.resize.min.js') }}"></script>
    <script src="{{ asset('plugins/flot/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ asset('plugins/sparkline/jquery.sparkline.js') }}"></script>
    <script src="{{ asset('plugins/jquery-jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('plugins/password-indicator/js/password-indicator.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-show-password/bootstrap-show-password.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>

    @include('inc.toastrmessages')

</body>
</html>
