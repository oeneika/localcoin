@extends('layouts.layout')

@section('content')
<div class="content container">
    <h2 class="page-title">Perfil</h2>
    <div class="row">
        <div class="col-md-7">
            <section class="widget">
                <header>
                    <h4><i class="fa fa-user"></i> Prefil de cuenta</h4>
                </header>
                <div class="body">
                    <form id="user-form" class="form-horizontal form-label-left" novalidate="" method="post" data-parsley-priority-enabled="false" data-parsley-excluded="input[name=gender]">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="text-align-center">
                                    <img class="img-circle" src="img/3.png" alt="64x64" style="height: 112px;">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <h3 class="mt-sm mb-xs">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</h3>
                                <address>
                                    <abbr>e-mail:</abbr> <a href="mailto:#">{{ Auth::user()->email }}</a><br>
                                    <abbr title="Teléfono de Casa">Teléfono:</abbr> {{ Auth::user()->phone }} <br>
                                    <abbr title="Teléfono de Casa">Teléfono Móvil:</abbr> {{ Auth::user()->mobile }} <br>
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
                                <div class="col-sm-8"><input type="text" id="first-name" name="first-name" value="{{ Auth::user()->name }}" class="form-control input-transparent" data-parsley-id="6"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="last-name">Apellido <span class="required">*</span></label>
                                <div class="col-sm-8"><input type="text" id="last-name" name="last-name" value="{{ Auth::user()->lastname }}" class="form-control input-transparent" data-parsley-id="8"></div>
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
                        <fieldset>
                            <legend class="section">
                                Address
                                <button type="button" class="btn btn-transparent btn-xs pull-right">
                                    <i class="fa fa-plus"></i>
                                    Add Address
                                </button>
                            </legend>
                            <div class="form-group">
                                <label for="address" class="control-label col-sm-4">Address <span class="required">*</span></label>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="input-group">
                                        <input id="address" class="form-control input-transparent" type="text" name="address" data-parsley-id="24">
                                        <span class="input-group-btn">
                                             <select id="address-type" class="selectpicker bs-select-hidden" data-style="btn-default" data-width="auto" data-parsley-id="26">
                                                 <option>Mobile</option>
                                                 <option>Home</option>
                                                 <option>Work</option>
                                             </select><div class="btn-group bootstrap-select" style="width: 82px;"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" data-id="address-type" title="Mobile"><span class="filter-option pull-left">Mobile</span>&nbsp;<span class="caret"></span></button><div class="dropdown-menu open" style="min-width: 0px;"><ul class="dropdown-menu inner" role="menu"><li data-original-index="0" class="selected"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Mobile</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Home</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Work</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div></div>
                                        </span>
                                    </div>
                                    <input id="address-2" class="form-control input-transparent mt-sm" type="text" value="" name="address-2" data-parsley-id="28">
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-4">
                                    <button type="submit" class="btn btn-primary">Validate &amp; Submit</button>
                                    <button type="button" class="btn btn-default">Cancel</button>
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