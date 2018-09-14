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
                                                <p><strong>Nombre y Apellido: </strong></p>
                                                <p><strong>E-mail: </strong><a href="mailto:#"></a></p>
                                                <p><strong>Usuario: </strong></p>  
                                                <hr> 
                                                <p><strong>Teléfono Local: </strong> </p> 
                                                <p><strong>Teléfono Móvil: </strong></p>
                                                <p><strong>Sexo: </strong></p>
                                                <hr>
                                            </div>
                                            <div class="col-md-6">
                                                <h3 class="mt-sm mb-xs"></h3>              
                                                <p><strong>Fecha de nacimiento: </strong></p>
                                                <p><strong>País: </strong></p> 
                                                <p><strong>Ciudad: </strong></p>
                                                <p><strong>Estado: </strong></p> 
                                                <p><strong>Dirección: </strong></p>
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
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    
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
                                    
                                        <button class="btn btn-xs btn-inverse" onclick="openStoreWalletModal()"><i class="fa fa-plus"></i>Añadir wallet</button>
                                   
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
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                        </div>
                                        <!-- end table-responsive -->
                                </div>              
                    </div>
                </div>
        </div>
        <!-- end #content -->

@section('footer_section')
@endsection
@endsection