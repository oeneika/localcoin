@extends('layouts.app')

@section('content')
<!-- begin register -->
<div class="register register-with-news-feed" style="overflow: scroll;">
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
                                <input name="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="Nombre" />
                            </div>
                            <div class="col-md-6 m-b-15">
                                <input name="lastname" type="text" value="{{ old('lastname') }}" class="form-control" placeholder="Apellido" />
                            </div>
                        </div>
                        
                        <label class="control-label">Nombre de Usuario<span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="user" type="text" value="{{ old('user') }}" class="form-control" placeholder="Nombre de Usuario" />
                            </div>
                        </div>

                        <label class="control-label">Correo Electrónico<span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="Correo Electrónico" />
                            </div>
                        </div>
                        
                        <label class="control-label">Contraseña <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="password" type="password" class="form-control m-b-5" placeholder="Contraseña"/>
                            </div>
                        </div>
                        <label class="control-label">Confirmar Contraseña <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirmar Contraseña" />
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
                        <div class="g-recaptcha" data-sitekey="6LeAL3AUAAAAAIQEQ74UXDeGLL2ttwYFA-szhyuq"></div>
                        <br>
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
