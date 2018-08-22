@extends('layouts.layout')

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
                <div class="col-md-8">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Perfil de usuario</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h3 class="mt-sm mb-xs"></h3>                                               
                                                <p><strong>Nombre y Apellido: </strong>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</p>
                                                <p><strong>E-mail: </strong><a href="mailto:#"> {{ Auth::user()->email }}</a></p>
                                                <p><strong>Teléfono Local: </strong> {{ Auth::user()->phone }}</p> 
                                                <p><strong>Teléfono Móvil: </strong>{{ Auth::user()->mobile }}</p>
                                                <p><strong>Sexo: </strong> @if( Auth::user()->gender == 'm' ) Masculino @else Femenino @endif </p>
                                                <hr>
                                            </div>
                                            <div class="col-md-4">
                                                <h3 class="mt-sm mb-xs"></h3>              
                                                <p><strong>Fecha de nacimiento: </strong>{{ Auth::user()->birthday }}</p>
                                                <p><strong>País: </strong>{{ Auth::user()->country }}</p> 
                                                <p><strong>Ciudad: </strong>{{ Auth::user()->city }}</p>
                                                <p><strong>Estado: </strong>{{ Auth::user()->state }}</p> 
                                                <p><strong>Dirección: </strong>{{ Auth::user()->address }}</p>
                                                <hr>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong>Usuario: </strong>{{ Auth::user()->user }}</p>  
                                                <hr>   
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <div class="col-md-4">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="table-basic-1">
                                <!-- begin panel-heading -->
                                <div class="panel-heading">
                                    <div class="panel-heading-btn">
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                    <h4 class="panel-title">Cuentas bancarias
                                    </h4>
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
                                                        <th>Acciones</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($bank_accounts as $bank_account)
                                                    <tr>
                                                        <td>{{ $bank_account->name }}</td>
                                                        <td>{{ $bank_account->number }}</td>
                                                        <td class="with-btn" nowrap>
                                                            <a href="#" class="btn btn-sm btn-white width-60" onclick="delete_item('{{ route('deleteBankAccount',['id'=>$bank_account->id_bank_account]) }}','{{ csrf_token() }}')" >Eliminar</a>
                                                            
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                        </div>
                                        <!-- end table-responsive -->
                                </div>
                                
                </div>
            </div>
            <!-- begin panel -->
            <div class="panel panel-inverse" style="width: 100%">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Completar perfil de usuario</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="user-form" method="post" data-parsley-priority-enabled="false" type='POST' action="{{ route('editUser',['id'=>Auth::user()->id]) }}">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="username" class="control-label">Usuario</label>
                                                    <input type="text" name="username"  class="form-control" placeholder="Introduce tu usuario" value="{{ Auth::user()->user }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="control-label">Teléfono Movil</label>
                                                    <input type="mobile" name="mobile"  class="form-control" placeholder="Introduce tu teléfono movil" value="{{ Auth::user()->mobile }}">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="expiration-date" class="control-label">Fecha de nacimiento</label>
                                                        
                                                            <div class="input-group date" id="datetimepicker1" style="width: 100%">
                                                                <input type="date" name="birthday" class="form-control" value="{{ Auth::user()->birthday }}">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <!-- Password -->
                                                    <label class="control-label" for="sex">Sexo</label>
                                                    <br>
                                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                                        <label class="btn btn-default " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                        <input type="radio" name="gender" id="m" value="m" @if( Auth::user()->gender == 'm' )checked @endif> &nbsp; Masculino &nbsp;
                                                        </label>
                                                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                    <input type="radio" name="gender" id="f" value="f" @if( Auth::user()->gender == 'f' )checked @endif> Femenino
                                                                </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label"  for="identification">Documento de identificación</label>
                                                    <input type="file" id="identification" name="identification" class="">
                                                </div>

                                    </div>
                                    <div class="col-md-4">            
                                        
                                                <div class="form-group">
                                                    <label for="country" class="control-label">País</label>
                                                    <select id="country" name="country" class="form-control">
                                                    <option value=""></option>
                                                    <option value="Venezuela" selected>Venezuela</option>
                                                    </select>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="city">Ciudad</label>
                                                    <input id="city" name="city" type="text" tabindex="3" class="form-control" placeholder="Introduce tu ciudad" value="{{ Auth::user()->city }}">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="state" class="control-label">Estado</label>
                                                    <input type="text" id="state" name="state" class="form-control" placeholder="Introduce tu estado" value="{{ Auth::user()->state }}">
                                                </div>
                                                    
                                                
                                                <div class="form-group">
                                                    <label class="control-label"  for="address">Dirección</label>
                                                    <input type="text" id="address" name="address" class="form-control" placeholder="Introduce tu dirección" value="{{ Auth::user()->address }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label"  for="passport">Fotografía del pasaporte</label>
                                                    <input type="file" id="passport" name="passport" class="">
                                                </div>
                                                
                                        <hr>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label"  for="address">Nombre</label>
                                            <input type="text" id="name" name="name" placeholder="" class="form-control" value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"  for="address">Apellido</label>
                                            <input type="text" id="lastname" name="lastname" placeholder="" class="form-control" value="{{ Auth::user()->lastname }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"  for="address">E-mail</label>
                                            <input type="text" id="email" name="email" placeholder="" class="form-control" value="{{ Auth::user()->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"  for="phone">Teléfono local</label>
                                            <input type="text" id="phone" name="phone" placeholder="" class="form-control" value="{{ Auth::user()->phone }}">
                                        </div>
                                        <button type="submit" class="btn btn-success">Actualizar Perfil</button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end #content -->
@include('bankAccounts.create')
@section('footer_section')
    <script src="{{ asset('js/bankaccount/store.js') }}"></script>
    <script src="{{ asset('js/bankaccount/updatebuy.js') }}"></script>
@endsection
@endsection