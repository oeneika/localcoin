@extends('layouts.layout')

@section('content')
<!-- begin #content -->
<div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
                <li class="breadcrumb-item active">Usuarios</li>
            </ol>

            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Listado de usuarios</h1>
            <!-- end page-header -->   

            
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="table-basic-4">
                        <!-- begin panel-heading -->
                        <div class="panel-heading">
                            
                            <h4 class="panel-title">Usuarios</h4>
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
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>No. Transacciones</th>
                                            <th>Puntuacion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr>
                                            <td>1</td>
                                            <td>Alexander</td>
                                            <td>De Azevedo</td>
                                            <td>25</td>
                                            <td>
                                                <small class="label label-warning"><i class="fa fa-clock-o"></i> Confiable</small>
                                                <!-- Se coloca label-danger si es no confiable el usuario -->
                                                <!-- <small class="label label-danger"><i class="fa fa-clock-o"></i> Confiable</small> -->
                                            </td>
                                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#puntuarModal">Puntuar</button>
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
@include('usuarios.puntuar')
@endsection
@section('footer_section')
@endsection