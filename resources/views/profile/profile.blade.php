@extends('layouts.layout')

@section('content')
<div class="content container">
    <h2 class="page-title">Perfil</h2>
    <div class="row">
        <div class="col-md-7">
            <section class="widget">
                <header>
                    <h4><i class="fa fa-user"></i> Perfil de cuenta</h4>
                </header>
                <div class="body">
                    <form id="user-form" class="form-horizontal form-label-left" novalidate="" method="post" data-parsley-priority-enabled="false" type='POST' action="{{ route('editUser',['id'=>Auth::user()->id]) }}">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="mt-sm mb-xs">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</h3>
                                <address>
                                    <p><strong>E-mail:</strong><a href="mailto:#"> {{ Auth::user()->email }}</a></p>
                                    <p><strong>Teléfono:</strong> {{ Auth::user()->phone }}</p> 
                                    <p><strong>Teléfono Móvil:</strong> {{ Auth::user()->mobile }}</p>
                                    <p><strong>Sexo:</strong> {{ Auth::user()->gender }}</p> 
                                </address>
                            </div>
                        </div>
                        <fieldset class="mt-sm">
                            <legend>Editar información de cuenta</legend>
                        </fieldset>
                        <fieldset>
                            <legend class="section">Información Personal</legend>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="first-name">Nombre <span class="required">*</span></label>
                                <div class="col-sm-8"><input type="text" id="first-name" name="name" value="{{ Auth::user()->name }}" class="form-control input-transparent" data-parsley-id="6"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="last-name">Apellido <span class="required">*</span></label>
                                <div class="col-sm-8"><input type="text" id="last-name" name="lastname" value="{{ Auth::user()->lastname }}" class="form-control input-transparent" data-parsley-id="8"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Gender</label>
                                <div class="col-sm-8">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="m" @if( Auth::user()->gender == 'm' ) checked @endif> &nbsp; Masculino &nbsp;
                                        </label>
                                        <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="f" @if( Auth::user()->gender == 'f' ) checked @endif> Femenino
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend class="section">Información de contacto</legend>
                            <div class="form-group">
                                <label id="email-label" for="email" class="control-label col-sm-4">Email <span class="required">*</span></label>
                                <div class="col-xs-12 col-sm-6">
                                    <input id="email" type="email" value="{{ Auth::user()->email }}" class="form-control input-transparent" name="email" data-parsley-id="14">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="control-label col-sm-4">Telefono Local</label>
                                <div class="col-xs-12 col-sm-6">
                                    <input id="phone" class="form-control input-transparent  mask" value="{{ Auth::user()->phone }}" type="text" name="phone" maxlength="28" data-parsley-id="16">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mobile" class="control-label col-sm-4">Telefono Móvil</label>
                                <div class="col-xs-12 col-sm-6">
                                    <input id="phone" class="form-control input-transparent  mask" value="{{ Auth::user()->mobile }}" type="text" name="mobile" maxlength="28" data-parsley-id="16">
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-4">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <div class="col-md-5">
            <section class="widget">
                <header>
                    <h4><i class="fa fa-cogs"></i> Cuentas Bancarias</h4>
                    <div class="actions">
                        <button class="btn btn-xs btn-inverse" onclick="openStoreAccountModal()"><i class="fa fa-plus"></i>Añadir cuenta</button>
                    </div>
                </header>
                <div class="body">
                        <table class="table table-striped">
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
                                    <td>
                                        <a class="btn btn-danger" onclick="delete_item('{{ route('deleteBankAccount',['id'=>$bank_account->id_bank_account]) }}','{{ csrf_token() }}')" style="margin-left: 25%;"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                </div>
            </section>
        </div>
    </div>
</div>
@include('bankAccounts.create')
@include('layouts.footer')
</div>
    <div class="loader-wrap hiding hide">
        <i class="fa fa-circle-o-notch fa-spin"></i>
    </div>
</div>
@section('footer_section')
    <script src="{{ asset('js/bankaccount/store.js') }}"></script>
    <script src="{{ asset('js/bankaccount/updatebuy.js') }}"></script>
@endsection
@endsection