@extends('layouts.layout')

@section('content')
<div class="content container">
        <h2 class="page-title">Dashboard <small>Estadisticas y datos más relevantes</small></h2>
        <div class="row">
            <div class="col-lg-12">
                <section class="widget">
                    <header>
                        <h4>
                            Bitcoin
                            <small>
                                Grafica en tiempo real
                            </small>
                        </h4>
                        <div class="widget-controls">
                            <a title="Options" href="#"><i class="glyphicon glyphicon-cog"></i></a>
                            <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                            <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                            <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="body no-margin">
                        <div id="visits-chart" class="chart visits-chart">
                            <svg></svg>
                        </div>
                        <div class="visits-info well well-sm">
                            <div class="row">
                                <div class="col-sm-3 col-xs-6">
                                    <div class="key"><i class="fa fa-users"></i> Total Traffic</div>
                                    <div class="value">24 541 <i class="fa fa-caret-up color-green"></i></div>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <div class="key"><i class="fa fa-bolt"></i> Unique Visits</div>
                                    <div class="value">14 778 <i class="fa fa-caret-down color-red"></i></div>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <div class="key"><i class="fa fa-plus-square"></i> Revenue</div>
                                    <div class="value">$3 583.18 <i class="fa fa-caret-up color-green"></i></div>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <div class="key"><i class="fa fa-user"></i> Total Sales</div>
                                    <div class="value">$59 871.12 <i class="fa fa-caret-down color-red"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="widget">
                    <header>
                        <h4>
                            Ventas
                        </h4>
                        <div class="widget-controls">
                            <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-plus"></i></a>
                            <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-minus"></i></a>
                            <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                        <div class="widget-table-overflow">
                            <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Vendedor</th>
                                        <th>User</th>
                                        <th>Price</th>
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
                                                <td>{{ $sell->name }} {{ $sell->lastname }}</td>
                                                <td>{{ $sell->user }}</td>
                                                <td>{{ $sell->price }}</td>
                                                <td>{{ $sell->quantity }}</td>
                                                @if(Auth::user()->id != $sell->id)
                                                    <td><button type="button" onclick="showDetailsModal('{{$sell->name}}','{{$sell->lastname}}','{{$sell->phone}}','{{$sell->mobile}}','{{$sell->bank_name}}',{{$sell->price}},{{$sell->quantity}},'{{$sell->email}}',{{ $sell->id_transaction }})" class="btn btn-primary" on>Comprar</button></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tr>
                                    </tbody>
                                </table>
                        </div>
                </section>
                <section class="widget">
                    <header>
                    <h4>
                        Compras
                    </h4>
                    <div class="widget-controls">
                        <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-plus"></i></a>
                        <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-minus"></i></a>
                            <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-table-overflow">
                        <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Comprador</th>
                                    <th>User</th>
                                    <th>Price</th>
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
                                                <td>{{ $buy->name }} {{ $buy->lastname }}</td>
                                                <td>{{ $buy->user }}</td>
                                                <td>{{ $buy->price }}</td>
                                                <td>{{ $buy->quantity }}</td>
                                                @if(Auth::user()->id != $buy->id)
                                                    <td><button type="button" onclick="showDetailsModal('{{$buy->name}}','{{$buy->lastname}}','{{$buy->phone}}','{{$buy->mobile}}','{{$buy->bank_name}}',{{$buy->price}},{{$buy->quantity}},'{{$buy->email}}',{{ $buy->id_transaction }})" class="btn btn-primary" on>Vender</button></td>
                                                @endif
                                            </tr>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </section>
                
            </div>
        </div>
            @include('transactions.buy')
            @include('layouts.footer')
        </div>
        <div class="loader-wrap hiding hide">
            <i class="fa fa-circle-o-notch fa-spin"></i>
        </div>
    </div>
@endsection
@section('footer_section')
    <script>var transaction = 0;</script>
    <script src="{{ asset('js/transaction/buy.js') }}"></script>
@endsection
