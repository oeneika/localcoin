@extends('layouts.layout')

@section('content')
    <div class="content container">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear Venta</h3>
                </div>
                <div class="box-body">
                    <form id="store_buy_form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input class="form-control" type="number" name="price" id="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Moneda</label>
                                    <select name="currency" id="" class="form-control">
                                        <option selected value>Seleccione moneda</option>
                                        @foreach($currencies as $currency)
                                            <option value="{{ $currency->id_currency }}">{{ $currency->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Banco</label>
                                    <select name="bank" id="" class="form-control">
                                        <option selected value>Seleccione Banco</option>
                                        @foreach($banks as $bank)
                                            <option value="{{ $bank->id_bank }}">{{ $bank->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tipo de Pago</label>
                                    <select name="payment_method" id="" class="form-control">
                                        <option selected value>Seleccione tipo de pago</option>
                                        @foreach($methods as $method)
                                            <option value="{{ $method->id_payment_method }}">{{ $method->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="store_buy_btn" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
    </div>
@include('layouts.footer')
    </div>
        <div class="loader-wrap hiding hide">
            <i class="fa fa-circle-o-notch fa-spin"></i>
        </div>
    </div>
@endsection
@section('footer_section')
    <script src="{{ asset('js/transaction/storebuy.js') }}"></script>
@endsection