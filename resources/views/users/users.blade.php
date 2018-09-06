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
                                            <th>Puntuación</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->lastname }}</td>
                                                <td>{{ $user->transactions_by_user }}</td>
                                                <td>{{ $user->rank }} <i class="fa fa-star amarillito"></i></td>
                                                <td><button type="button" class="btn btn-primary" onclick="showRankModal({{ $user->id }},{{ $user->rank }})" data-toggle="modal" data-target="#puntuarModal">Puntuar</button>
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
@include('users.rank')
@endsection
@section('footer_section')
    <script src="{{ asset('js/users/rank.js') }}"></script>
    <script>
// Using vanilla javascript:
var starrating = new StarRating( document.getElementById( 'star-rating' ));
// OR - Using jQuery:
$( '#star-rating' ).starrating();
</script>
@endsection