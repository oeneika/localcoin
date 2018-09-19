@extends('layouts.layout-trade')
@section('header_section')
<link href="{{ asset('css/estilos-trade.css') }}" rel="stylesheet" />
@endsection
@section('content')
<!-- begin #content -->
<div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
                <li class="breadcrumb-item active">Transacciones - Mis Compras</li>
            </ol>

            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Transacciones - Mis Compras</h1>
            <!-- end page-header -->   

            <div class="row">
                <div class="col-md-12">
                <button class="btn btn-primary" style="float:right; margin-bottom: 10px;" onclick="openModalBuy()"> Crear Compras </button>
                </div>
            </div>

            
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="table-basic-4">
                        <!-- begin panel-heading -->
                        <div class="panel-heading">
                            
                            <h4 class="panel-title">Transacciones</h4>
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
                                            <th>Cantidad</th>
                                            <th>Moneda</th>
                                            <th>Estatus</th>
                                            <th>Fecha de Creación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->id_transaction }}</td>
                                            <td>{{ number_format($transaction->price,2,',','.') }}</td>
                                            <td>{{ $transaction->name }}</td>
                                            @if($transaction->status = 0)
                                                <td><span class="label label-primary">Abierta</span></td>
                                            @elseif($transaction->status = 1)
                                                <td><span class="label label-info">Pendiente</span></td>
                                            @else
                                                <td><span class="label label-danger">Procesada</span></td>
                                            @endif
                                            <td>{{ date('m/d/Y', date_timestamp_get($transaction->created_at)) }}</td>
                                            
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
</div>
<!-- end #content -->
@include('transactions.submitbuy-trade')

@endsection
@section('footer_section')
    <script src="{{ asset('js/transaction/storebuy.js') }}"></script>
@endsection