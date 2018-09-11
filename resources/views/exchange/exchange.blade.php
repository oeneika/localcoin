@extends('layouts.layout-exchange')
@section('header_section')
<link href="{{ asset('css/estilos-home.css') }}" rel="stylesheet" />
@endsection
@section('content')
<!-- begin #content -->
    <div id="content" class="content">
            
            <!-- begin page-header -->
            <h1 class="page-header">Dashboard</h1>
            <!-- end page-header -->   

            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="chart-js-1">
                        <div class="panel-heading">
                            
                            <h4 class="panel-title">Bitcoin</h4>
                        </div>
                        <div class="panel-body" style="background: black;">
                                    <div class="kline">
                                        <div id="kline_container" style="width: 100%!important;"></div>
                                    </div>                        
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
    </div>
<!-- end #content -->
@endsection

@section('footer_section')

    <script>
         var kline = new Kline({
            element: "#kline_container",
            width: 1700,
            height: 500,
            theme: 'dark', // light/dark
            language: 'en-us', // zh-cn/en-us/zh-tw
            ranges: ["1w", "1d", "1h", "30m", "15m", "5m", "1m", "line"],
            symbol: "BTC",
            symbolName: "BTC/USD",
            type: "poll", // poll/socket
            url: "plugins/kline-master/examples/mock.json",
            limit: 1000,
            intervalTime: 5000,
            debug: true,
            enableSockjs: true,
            showTrade: true
        });
        kline.draw();

    </script>

    <script> 
        /*Responsive de la grafica*/
        var mediaquery = window.matchMedia("(min-width: 1280px)");
        var e = document.getElementById("chart_toolbar");
        var e2 = document.getElementById("chart_toolbar");    
        var e3 = document.getElementById("chart_tabbar");    
        if (mediaquery.matches) {  
            e.style.width = "100%";
            e3.style.width = "100%";
        } else {
            e2.style.width = "100%";
            e3.style.width = "100%";
        }
    </script>
@endsection