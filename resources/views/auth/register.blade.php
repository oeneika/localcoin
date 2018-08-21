@extends('layouts.app')

@section('content')

        <!-- begin register -->
        <div class="register register-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url(img/login-bg/login-bg-9.jpg)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>Local</b>coin</h4>
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
                    <small>Crea tu cuenta en localcoin ¡Es gratis!</small>
                </h1>
                <!-- end register-header -->
                <!-- begin register-content -->
                <div class="register-content">
                    <form action="https://seantheme.com/color-admin-v4.1/admin/html/index.html" method="GET" class="margin-bottom-0">
                        <label class="control-label">Nombre y apellido <span class="text-danger">*</span></label>
                        <div class="row row-space-10">
                            <div class="col-md-6 m-b-15">
                                <input name="name" type="text" class="form-control" placeholder="Nombre" required />
                            </div>
                            <div class="col-md-6 m-b-15">
                                <input name="lastname" type="text" class="form-control" placeholder="Apellido" required />
                            </div>
                        </div>
                        <label class="control-label">Email <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="email" type="text" class="form-control" placeholder="Correo electronico" required />
                            </div>
                        </div>
                        <label class="control-label">Télefono<span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="phone" type="text" class="form-control" placeholder="Télefono" required />
                            </div>
                        </div>
                        <label class="control-label">Password <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="password" type="password" class="form-control" placeholder="Password" required />
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
                            ¿Ya estás registrado? Haz click <a href="{{ url('/') }}">aqui</a> para ir al login.
                        </div>
                        <hr />
                        <p class="text-center">
                            &copy; Color Admin All Right Reserved 2018
                        </p>
                    </form>
                </div>
                <!-- end register-content -->
            </div>
            <!-- end right-content -->
        </div>
        <!-- end register -->
@endsection
