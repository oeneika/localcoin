@extends('layouts.app')

@section('content')

        <!-- begin register -->
        <div class="register register-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url(img/login-bg/login-bg-9.jpg)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>Corp</b>binary</h4>
                    <p>
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero repudiandae rerum eligendi dolorem ipsa veritatis voluptas corporis cupiditate odit illo eaque accusantium magnam, autem labore, sed impedit error, dolores expedita!
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin register-header -->
                <h1 class="register-header">
                    Registro
                    <small>Crea tu cuenta en corpbinary ¡Es gratis!</small>
                </h1>
                <!-- end register-header -->
                <!-- begin register-content -->
                <div class="register-content">
                    <form action="{{ url('/register') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label class="control-label">Nombre y apellido <span class="text-danger">*</span></label>
                        <div class="row row-space-10">
                            <div class="col-md-6 m-b-15">
                                <input name="name" type="text" class="form-control" placeholder="Nombre" />
                            </div>
                            <div class="col-md-6 m-b-15">
                                <input name="lastname" type="text" class="form-control" placeholder="Apellido" />
                            </div>
                        </div>
                        
                        <div class="row m-b-15">
                            <div class="col-md-6">
                                <label class="control-label">País<span class="text-danger">*</span></label>
                                <input name="country" type="text" class="form-control" placeholder="País" />
                                <br>
                                <label class="control-label">Estado<span class="text-danger">*</span></label>
                                <input name="state" type="text" class="form-control" placeholder="Estado" />
                                <br>
                                <label class="control-label">Dirección<span class="text-danger">*</span></label>
                                <input name="address" type="text" class="form-control" placeholder="Télefono" />
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Ciudad<span class="text-danger">*</span></label>
                                <input name="city" type="text" class="form-control" placeholder="Ciudad" />
                                <br>
                                <label class="control-label">Fecha de Nacimiento<span class="text-danger">*</span></label>
                                <input name="birthday" type="date" class="form-control" placeholder="Dirección" />
                                <br>
                                <label class="control-label">Télefono<span class="text-danger">*</span></label>
                                <input name="phone" type="text" class="form-control" placeholder="Télefono" />
                            </div>
                        </div>
                        
                        <label class="control-label">Genero<span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div id="gender" class="btn-group" data-toggle="buttons" style="width: 100%">
                                <label style="width: 100%" class="btn btn-default " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="gender" id="m" value="m" > &nbsp; Masculino &nbsp;
                                </label>
                                <label style="width: 100%" class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="gender" id="f" value="f"> Femenino
                                </label>
                            </div>
                        </div>

                        <label class="control-label">Pasaporte<span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="passport" type="file" class="" placeholder="Pasaporte" />
                            </div>
                        </div>

                        <label class="control-label">Documento de Identificación<span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="identification" type="file" class="" placeholder="Identificacion" />
                            </div>
                        </div>

                        <label class="control-label">Email <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="email" type="text" class="form-control" placeholder="Correo electronico" />
                            </div>
                        </div>
                        <label class="control-label">Nombre de Usuario<span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="user" type="text" class="form-control" placeholder="Nombre de Usuario" />
                            </div>
                        </div>
                        
                        <label class="control-label">Password <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="password" type="password" class="form-control" placeholder="Password" />
                            </div>
                        </div>
                        <label class="control-label">Confirmar Password <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="password_confirmation" type="password" class="form-control" placeholder="Password" />
                            </div>
                        </div>
                        <div class="checkbox checkbox-css m-b-30">
                            <div class="checkbox checkbox-css m-b-30">
                                <input type="checkbox" id="agreement_checkbox" value="">
                                <label for="agreement_checkbox">
                                    Acepto los <a href="javascript:;">términos</a> y condiciones, incluyendo el uso<a href="javascript:;">cookies</a>.
                                </label>
                            </div>
                        </div>
                        <div class="register-buttons">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Registrarse</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            ¿Ya estás registrado? Haz click <a href="{{ url('/') }}">aquí</a> para ir al login.
                        </div>
                        <hr />
                        <p class="text-center">
                            &copy; Corpbinary All Right Reserved 2018
                        </p>
                    </form>
                </div>
                <!-- end register-content -->
            </div>
            <!-- end right-content -->
        </div>
        <!-- end register -->
@endsection
