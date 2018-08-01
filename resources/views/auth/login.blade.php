@extends('layouts.app')

@section('content')
<div class="single-widget-container">
            <section class="widget login-widget">
                <header class="text-align-center">
                    <h4>Inicio de sesión</h4>
                </header>
                <div class="body">
                    <form class="no-margin" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <label for="email" >Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input id="email" name="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} input-lg input-transparent" placeholder="Tu Email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" >Contraseña</label>

                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input id="password" name="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} input-lg input-transparent"
                                           placeholder="Tu contraseña">
                                           @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-block btn-lg btn-danger">
                                <small>{{ __('Iniciar Sesión') }}</small>
                            </button>
                            <a class="forgot" href="{{ route('password.request') }}">{{ __('¿Olvidaste tu contraseña?') }}</a>
                        </div>
                    </form>
                </div>
                <footer>
                    <div class="facebook-login">
                        <a href="{{ route('register') }}">¿Aún no estás registrado? <strong>¡Registrate!</strong></a>
                    </div>
                </footer>
            </section>
        </div>
@endsection
