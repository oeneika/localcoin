@extends('layouts.layout')

@section('content')
<!-- begin #content -->
<div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
                <li class="breadcrumb-item active">Transacciones realizadas</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Transacciones Realizadas</h1>
            <!-- end page-header -->   
            
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
                                            <th>Precio</th>
                                            <th>Moneda</th>
                                            <th>Usuario</th>
                                            <th>Cuenta de Corpbinary</th>
                                            <th>Fecha de Realización</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($transactions as $transaction)
                                        <tr>
                                            @if($transaction->type == 0)
                                                <td><span class="label label-primary">Compra {{ $transaction->id_transaction }}</span></td>
                                            @else
                                                <td><span class="label label-primary">Venta {{ $transaction->id_transaction }}</span></td>
                                            @endif
                                            <td>{{ $transaction->quantity }}</td>
                                            <td>{{ number_format($transaction->price,2,',','.') }}</td>
                                            <td>{{ $transaction->currency_name }}</td>
                                            <td>{{ $transaction->name }} {{ $transaction->lastname }} - {{ $transaction->user }}</td>
                                            <td>72839182738492810</td>
                                            <td>{{ date('m/d/Y', date_timestamp_get($transaction->updated_at)) }}</td>
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
@endsection