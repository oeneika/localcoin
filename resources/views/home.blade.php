@extends('layouts.layout')
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
                                        <div id="kline_container" ></div>
                                    </div>                        
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->


            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="chart-js-1">
                        <div class="panel-heading">
                            
                            <h4 class="panel-title">Bitcoin</h4>
                        </div>
                        <div class="panel-body">
                            <p>
                                Bitcoin. Gráfica en tiempo real
                            </p>
                            <div>
                                <canvas id="line-chart" data-render="chart-js" height="80"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
            
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="table-basic-4">
                        <!-- begin panel-heading -->
                        <div class="panel-heading">
                            
                            <h4 class="panel-title">Vender</h4>
                        </div>
                        <!-- end panel-heading -->

                        <!-- begin panel-body -->
                        <div class="panel-body">
                            <!-- begin table-responsive -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Reputación del Usuario</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($buys as $buy)
                                            <tr>
                                                @if($buy->status == 2)
                                                    @continue
                                                @endif
                                                <tr>
                                                    <td>{{ $buy->id_transaction }}</td>
                                                    <td>@for ($i = 0; $i < $buy->reputation; $i++) <i class="fa fa-star amarillito"></i> @endfor</td>
                                                    <td>{{ $buy->price }}</td>
                                                    <td>{{ $buy->quantity }}</td>
                                                    @if(Auth::user()->id != $buy->id)
                                                        <td><button @if (count(Auth::user()->wallets) < 1) disabled @endif type="button" onclick="showDetailsModal('{{$buy->name}}','{{$buy->lastname}}','{{$buy->phone}}','{{$buy->mobile}}','{{$buy->bank_name}}',{{$buy->price}},{{$buy->quantity}},'{{$buy->email}}',{{ $buy->id_transaction }})" class="btn btn-primary" on>Vender</button></td>
                                                    @endif
                                                </tr>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                        <!-- end panel-body -->
            </div>
            <!-- end panel -->
            
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="table-basic-4">
                        <!-- begin panel-heading -->
                        <div class="panel-heading">
                           
                            <h4 class="panel-title">Comprar</h4>
                        </div>
                        <!-- end panel-heading -->

                        <!-- begin panel-body -->
                        <div class="panel-body">
                            <!-- begin table-responsive -->
                            <div class="table-responsive">
                                <table class="table">
                                   <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Reputación del Usuario</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Acción</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            @foreach($sells as $sell)
                                                @if($sell->status == 2)
                                                    @continue
                                                @endif
                                                <tr>
                                                    <td>{{ $sell->id_transaction }}</td>
                                                    <td>@for ($i = 0; $i < $sell->reputation; $i++) <i class="fa fa-star amarillito"></i> @endfor</td>
                                                    <td>{{ $sell->price }}</td>
                                                    <td>{{ $sell->quantity }}</td>
                                                    @if(Auth::user()->id != $sell->id)
                                                        <td><button @if (count(Auth::user()->wallets) < 1) disabled @endif type="button" onclick="showDetailsModal('{{$sell->name}}','{{$sell->lastname}}','{{$sell->phone}}','{{$sell->mobile}}','{{$sell->bank_name}}',{{$sell->price}},{{$sell->quantity}},'{{$sell->email}}',{{ $sell->id_transaction }})" class="btn btn-primary" on>Comprar</button></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tr>
                                        </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                        <!-- end panel-body -->
            </div>
            <!-- end panel -->
    </div>
<!-- end #content -->
@include('transactions.buy')
@endsection

@section('footer_section')
    <script src="{{ asset('js/transaction/buy.js') }}"></script>
    <script src="{{ asset('js/home/homelinechart.js') }}"></script>
    <script>
        $('.fechalacra input').datepicker({
                format: "dd/mm/yyyy",
                todayBtn: "linked",
                language: "es",
                autoclose: true,
                todayHighlight: true
            });
    </script>

    <script>
         var kline = new Kline({
            element: "#kline_container",
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
        if (mediaquery.matches) {
        var e1 = document.getElementById("chart_mainCanvas");
        e1.style.width = 1000px;
        } else {
            var e2 = document.getElementById("chart_overlayCanvas");    
            e2.style.width = 668px;
        }
    </script>
@endsection