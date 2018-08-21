@extends('layouts.app')

@section('content')
<!-- begin #page-container -->
        <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url(img/login-bg/login-bg-11.jpg)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>Corp</b>binary</h4>
                    <p>
                        Download the Localcoin app for iPhone®, iPad®, and Android™. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <span class="logo"></span> <b>Corp</b>binary
                        <small>Lorem ipsum dolor sit amet</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <form class="no-margin" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="form-group m-b-15">
                            <input id="email" name="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} input-lg input-transparent form-control-lg" placeholder="Correo electronico" value="{{ old('email') }}" required />
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group m-b-15">
                            <input id="password" name="password" type="password" class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }} input-lg input-transparent" placeholder="Clave" required />
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="checkbox checkbox-css m-b-30">
                            <input type="checkbox" id="remember_me_checkbox" value="" />
                            <label for="remember_me_checkbox">
                                Recuerdame
                            </label>
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg">{{ __('Iniciar Sesión') }}</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            Haz click <a href="{{ route('register') }}" class="text-success">aquí</a> para registrarte.
                        </div>
                        <hr />
                        <p class="text-center text-grey-darker">
                            &copy; Corpbinary | Todos los derechos reservados 2018
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
<!-- end page container -->
@endsection
