@extends('layouts.layout')

@section('content')
<!-- begin #content -->
<div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
                <li class="breadcrumb-item active">Transacciones en espera</li>
            </ol>

            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Transacciones en espera</h1>
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
                                            <th>Vendedor</th>
                                            <th>Comprador</th>
                                            <th>Fecha</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Cuentas</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->id_transaction }}</td>
                                                @if ($transaction->type == 1)
                                                    <td>{{ $transaction->sub_name }} {{ $transaction->sub_lastname }}</td>
                                                    <td>{{ $transaction->rec_name }} {{ $transaction->rec_lastname }}</td>
                                                @else
                                                    <td>{{ $transaction->rec_name }} {{ $transaction->rec_lastname }}</td>
                                                    <td>{{ $transaction->sub_name }} {{ $transaction->sub_lastname }}</td>
                                                @endif
                                                <td>{{ date('m/d/Y', date_timestamp_get($transaction->updated_at)) }}</td>
                                                <td>{{ $transaction->quantity }}</td>
                                                <td>{{ $transaction->price }} {{ $transaction->abv }}</td>
                                                <td>
                                                    <button type="button" onclick="openAccountsModal({{ $transaction->type }},'{{ $transaction->sub_name }} {{ $transaction->sub_lastname }}','{{ $transaction->rec_name }} {{ $transaction->rec_lastname }}','{{ $transaction->submitting_number }}','{{ $transaction->receiving_number }}','{{ $transaction->sub_address }}','{{ $transaction->rec_address }}',{{ $transaction->submitting_transfer_number }},{{ $transaction->receiving_transfer_number }})" class="btn btn-primary"><i class="fa fa-eye text-navy"></i> Ver cuentas</button>
                                                </td>
                                                <td>
                                                    <button type="button" onclick='approve( "{{ route('approveTransaction',$transaction->id_transaction) }}","{{ csrf_token() }}" )' class="btn btn-primary" ><i class="fa fa-check text-navy"> </i> Aprobar Transacción</button>
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
@include('transactions.accounts')
@endsection
@section('footer_section')
    <script src="{{ asset('js/transaction/approve.js') }}"></script>
@endsection