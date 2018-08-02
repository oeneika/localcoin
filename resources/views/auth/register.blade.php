@extends('layouts.app')

@section('content')
<div class="container">
        <h2 align="center">Registro</h2>
        <div class="flotando">
        <section class="widget">
                    <div class="body">
                        <div id="wizard" class="form-wizard">
                            <ul class="wizard-navigation nav-justified">
                                <li><a href="#tab1" data-toggle="tab"><small>1.</small><strong>Información Personal</strong></a></li>
                                <li><a href="#tab2" data-toggle="tab"><small>2.</small> <strong>Información de Contacto</strong></a></li>
                                <li><a href="#tab3" data-toggle="tab"><small>3.</small> <strong>Información de Domicilio</strong></a></li>
                                <li><a href="#tab4" data-toggle="tab"><small>4.</small> <strong>Confirmación</strong></a></li>
                            </ul>
                            <div id="bar" class="progress progress-small">
                                <div class="progress-bar progress-bar-inverse"></div>
                            </div>
                            <form class="form-horizontal mt-sm" action="{{ url('/register') }}" method="POST">
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab1">
                                        
                                            {{ csrf_field() }}
                                            <fieldset>
                                                <div class="form-group">
                                                    <!-- Nombre -->
                                                    <label class="control-label col-md-3"  for="name">Nombre</label>
                                                    <div class="col-md-8">
                                                        <div class="col-md-10">
                                                            <input type="text" id="name" name="name" placeholder="" class="form-control">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <!-- Email -->
                                                    <label class="control-label col-md-3"  for="lastname">Apellido</label>
                                                    <div class="col-md-8">
                                                        <div class="col-md-10">
                                                            <input type="text" id="lastname" name="lastname" placeholder="" class="form-control">          
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="expiration-date" class="control-label col-md-3">Fecha de nacimiento</label>
                                                    <div class="col-md-8">
                                                        <div class="col-md-10"><input type="text" name="expiration-date" id="expiration-date" class="form-control"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <!-- Password -->
                                                    <label class="control-label col-md-3" for="sex">Sexo</label>
                                                    <div class="col-md-8">
                                                        <div class="col-md-10">
                                                            <div id="gender" class="btn-group" data-toggle="buttons">
                                                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                        <input type="radio" name="gender" id="gender" value="m"> &nbsp; Masculino &nbsp;
                                                                    </label>
                                                                    <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                        <input type="radio" name="gender" id="gender" value="f" checked> Femenino
                                                                    </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </fieldset>
                                        
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        
                                            {{ csrf_field() }}
                                            <fieldset>
                                                <div class="form-group">
                                                    <label for="country-select" class="control-label col-md-3">Email</label>

                                                    <div class="col-md-8">
                                                        <div class="col-md-10">
                                                            <input id="email" name="email" type="email" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="phone" class="control-label col-md-3">Télefono Local</label>

                                                    <div class="col-md-8">
                                                        <div class="col-md-10">
                                                            <input id="phone" name="phone" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="mobile" class="control-label col-md-3">Télefono Celular</label>

                                                    <div class="col-md-8">
                                                        <div class="col-md-10">
                                                            <input id="mobile" name="mobile" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="fax" class="control-label col-md-3">Fax</label>

                                                    <div class="col-md-8">
                                                        <div class="col-md-10">
                                                            <input id="fax" name="fax" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        
                                            {{ csrf_field() }}
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3"  for="address">Dirección</label>
                                                    <div class="col-md-8">
                                                        <div class="col-md-10"><input type="text" id="address" name="address" placeholder="" class="form-control"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="country" class="control-label col-md-3">País</label>
                                                    <div class="col-md-8">
                                                        <div class="col-md-10">
                                                            <select id="country" name="country" data-placeholder="" class="chzn-select select-block-level">
                                                            <option value=""></option>
                                                            <option value="Visa">Venezuela</option>
                                                            <option value="Mastercard">China</option>
                                                            <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3" for="city">Ciudad</label>
                                                    <div class="col-md-8">
                                                        <div class="col-md-10"><input id="city" name="city" type="text" tabindex="3" class="form-control"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="state" class="control-label col-md-3">Estado</label>
                                                    <div class="col-md-8">
                                                        <div class="col-md-10"><input type="text" id="state" name="state" class="form-control"></div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        
                                    </div>
                                    <div class="tab-pane" id="tab4">
                                        
                                            {{ csrf_field() }}
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3"  for="user">Usuario</label>
                                                    <div class="col-md-8">
                                                        <div class="col-md-10"><input type="text" id="user" name="user" placeholder="" class="form-control"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3" for="password">Contraseña</label>
                                                    <div class="col-md-8">
                                                        <div class="col-md-10">
                                                            <input id="password" name="password" type="password" tabindex="3" class="form-control">
                                                            <span class="help-block">La contraseña debe incluir: números, caracteres especiales y una combinación de letras mayúsculas y minúsculas.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                        <label class="control-label col-md-3" for="password">Repetir Contraseña</label>
                                                        <div class="col-md-8">
                                                            <div class="col-md-10">
                                                                <input id="password" name="password_confirmation" type="password" tabindex="3" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                            </fieldset>
                                        
                                    </div>
                                    <div class="description ml mr mt-n-md">
                                        <ul class="pager wizard">
                                            <li class="previous">
                                                <button class="btn btn-primary pull-left"><i class="fa fa-caret-left"></i> Anterior</button>
                                            </li>
                                            <li class="next">
                                                <button class="btn btn-primary pull-right" >Siguiente <i class="fa fa-caret-right"></i></button>
                                            </li>
                                            <li class="finish" style="display: none">
                                                <button class="btn btn-success pull-right" type="submit">Confirmar Registro <i class="fa fa-check"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ url('/') }}" class="forgot">¿Ya estás registrado? <strong>¡Inicia sesión!</strong></a>
                        </div>
                    </div>
                 </div>
        </div>
    </div>
@endsection
