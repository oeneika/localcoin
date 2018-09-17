@extends('layouts.layout-trade')
@section('header_section')
<link href="{{ asset('css/estilos-trade.css') }}" rel="stylesheet" />
@endsection
@section('content')
        <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item active">Perfil de usuario</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Perfil de usuario</h1>
            <!-- end page-header -->
            
            <div class="row">
                <div class="col-md-7">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            
                            <h3 class="panel-title"><strong>Perfil de usuario</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class="mt-sm mb-xs"></h3>                                               
                                                <p><strong>Nombre y Apellido: </strong>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</p>
                                                <p><strong>E-mail: </strong><a href="mailto:#"> {{ Auth::user()->email }}</a></p>
                                                <p><strong>Usuario: </strong>{{ Auth::user()->user }}</p>  
                                                <hr> 
                                                <p><strong>Teléfono Local: </strong> {{ Auth::user()->phone }}</p> 
                                                <p><strong>Teléfono Móvil: </strong>{{ Auth::user()->mobile }}</p>
                                                <p><strong>Sexo: </strong> @if( Auth::user()->gender == 'm' ) Masculino @else Femenino @endif </p>
                                                <hr>
                                            </div>
                                            <div class="col-md-6">
                                                <h3 class="mt-sm mb-xs"></h3>              
                                                <p><strong>Fecha de nacimiento: </strong>{{ Auth::user()->birthday }}</p>
                                                <p><strong>País: </strong>{{ Auth::user()->country }}</p> 
                                                <p><strong>Ciudad: </strong>{{ Auth::user()->city }}</p>
                                                <p><strong>Estado: </strong>{{ Auth::user()->state }}</p> 
                                                <p><strong>Dirección: </strong>{{ Auth::user()->address }}</p>
                                                <hr>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <div class="col-md-5">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="table-basic-1">
                                <!-- begin panel-heading -->
                                <div class="panel-heading">
                                    <h3 class="panel-title">Cuentas bancarias
                                    </h3>
                                </div>
                                <!-- end panel-heading -->
                                <!-- begin panel-body -->
                                <div class="panel-body">
                                     <button class="btn btn-xs btn-inverse" onclick="openStoreAccountModal()"><i class="fa fa-plus"></i>Añadir cuenta</button>
                                        <!-- begin table-responsive -->
                                        <div class="table-responsive">
                                                <table class="table table-striped m-b-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Banco</th>
                                                        <th>Número de Cuenta</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach(Auth::user()->BankAccounts as $bank_account)
                                                    <tr>
                                                        <td>{{ $bank_account->Bank['name'] }}</td>
                                                        <td>{{ $bank_account->number }}</td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                        </div>
                                        <!-- end table-responsive -->
                                </div>              
                    </div>

                    <div class="panel panel-inverse" data-sortable-id="table-basic-1">
                                <!-- begin panel-heading -->
                                <div class="panel-heading">
                                    <h3 class="panel-title">Wallet bitcoin
                                    </h3>
                                </div>
                                <!-- end panel-heading -->
                                <!-- begin panel-body -->
                                <div class="panel-body">
                                        @if(count(Auth::user()->wallets)<1)
                                            <button class="btn btn-xs btn-inverse" onclick="openStoreWalletModal()"><i class="fa fa-plus"></i>Añadir wallet</button>
                                        @endif
                                        <!-- begin table-responsive -->
                                        <div class="table-responsive">
                                                <table class="table table-striped m-b-0">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Número de Wallet</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (Auth::user()->wallets as $wallet)
                                                            <tr>
                                                                <td>{{ $wallet->id_wallet }}</td>
                                                                <td>{{ $wallet->label }} {{ $wallet->address }}</td>
                                                            </tr>
                                                         @endforeach
                                                    </tbody>
                                                </table>
                                        </div>
                                        <!-- end table-responsive -->
                                </div>              
                    </div>
                </div>
        </div>
        <!-- end #content -->
        
@include('bankAccounts.create')
@include('wallet.create')
@section('footer_section')
    <script src="{{ asset('js/bankaccount/store.js') }}"></script>
    <script src="{{ asset('js/wallet/store.js') }}"></script>
@endsection
@endsection