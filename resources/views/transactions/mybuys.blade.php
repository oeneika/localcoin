@extends('layouts.layout')

@section('content')
<!-- begin #content -->
<div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
                <li class="breadcrumb-item active">Transacciones - Mis Ventas</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Transacciones - Mis Ventas</h1>
            <!-- end page-header -->   
            
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="table-basic-4">
                        <!-- begin panel-heading -->
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
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
                                            <th>Acciones</th>
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
                                            <td>
                                                <a class="btn btn-info" onclick="openModalEditBuy({{ $transaction->id_transaction }},{{ $transaction->price }},{{ $transaction->id_currency }},{{ $transaction->id_submitting_account }},{{ $transaction->quantity }})"><i class="fa fa-sliders"></i></a>
                                                <a class="btn btn-danger" onclick="delete_item('{{ route('deleteTransaction',['id'=>$transaction->id_transaction]) }}','{{ csrf_token() }}')"><i class="fa fa-trash"></i></a>
                                            </td>
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

@section('footer_section')
    <script src="{{ asset('js/transaction/storebuy.js') }}"></script>
    <script src="{{ asset('js/transaction/updatebuy.js') }}"></script>
@endsection