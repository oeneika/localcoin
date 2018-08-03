@extends('layouts.layout')

@section('content')
<div class="content container">
    <h2 class="page-title">
            Transacciones - <span class="fw-semi-bold">Mis Ventas</span>
    </h2>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary" style="float:right; margin-bottom: 10px;" onclick="openModal()"> Crear Venta </button>
        </div>
    </div>
    <section class="widget">
        <header>
            <h4>
                Ventas
            </h4>
            <div class="widget-controls">
                <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-plus"></i></a>
                <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-minus"></i></a>
            </div>
        </header>
            <div class="widget-table-overflow">
                <table class="table table-striped">
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
                                <a class="btn btn-info" onclick="openModalEdit({{ $transaction->id_transaction }},{{ $transaction->price }},{{ $transaction->id_currency }},{{ $transaction->id_bank }},{{ $transaction->id_payment_method }})"><i class="fa fa-sliders"></i></a>
                                <a class="btn btn-danger" onclick="delete_item('{{ route('deleteTransaction',['id'=>$transaction->id_transaction]) }}','{{ csrf_token() }}')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
    </section>
</div>
@include('transactions.buy')
@include('transactions.editbuy')
@include('layouts.footer')
    </div>
        <div class="loader-wrap hiding hide">
            <i class="fa fa-circle-o-notch fa-spin"></i>
        </div>
    </div>
@endsection
@section('footer_section')
    <script src="{{ asset('js/transaction/storebuy.js') }}"></script>
    <script src="{{ asset('js/transaction/updatebuy.js') }}"></script>
@endsection