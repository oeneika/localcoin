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
                                            <th>Usuario inicializador</th>
                                            <th>Codigo QR</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Alexander De Azevedo</td>
                                            <td>Codigo QR</td>
                                            <td>
                                                <!-- Si la transaccion no está aprobada mostrar este boton -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aprobarTransaccion"><i class="fa fa-check text-navy"> </i> Aprobar Transacción</button>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#puntuarModal">Cancelar</button>
                                            </td>
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
@endsection
@section('footer_section')
<script>
    function aprobacion(){

    }
</script>
@endsection