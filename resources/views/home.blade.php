@extends('layouts.layout')

@section('content')
<!-- begin #content -->
    <div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <!-- end breadcrumb -->
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
                        <div class="panel-body">
                            <p>
                                Bitcoin. Grafica en tiempo real
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
                            
                            <h4 class="panel-title">Compras</h4>
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
                                        <th>Comprador</th>
                                        <th>Usuario</th>
                                        <th>Reputación</th>
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
                                                    <td>{{ $buy->name }} {{ $buy->lastname }}</td>
                                                    <td>{{ $buy->user }}</td>
                                                    <td>{{ $buy->reputation }} <i class="fa fa-star"></i></td>
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
                           
                            <h4 class="panel-title">Ventas</h4>
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
                                            <th>Vendedor</th>
                                            <th>Usuario</th>
                                            <th>Reputación</th>
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
                                                    <td>{{ $sell->name }} {{ $sell->lastname }}</td>
                                                    <td>{{ $sell->user }}</td>
                                                    <td>{{ $sell->reputation }} <i class="fa fa-star"></i></td>
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
@endsection