@extends('layouts.layout')

@section('content')
<div class="content container">
    <h2 class="page-title">
            Transacciones - <span class="fw-semi-bold">Transacciones realizadas</span>
    </h2>
    <section class="widget">
        <header>
            <h4>
                Transacciones
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
                            <th>Precio</th>
                            <th>Moneda</th>
                            <th>Usuario</th>
                            <th>Cuenta</th>
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
                            <td>{{ $transaction->number }}</td>
                            <td>{{ date('m/d/Y', date_timestamp_get($transaction->updated_at)) }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
    </section>
</div>
@include('layouts.footer')
    </div>
        <div class="loader-wrap hiding hide">
            <i class="fa fa-circle-o-notch fa-spin"></i>
        </div>
    </div>
@endsection