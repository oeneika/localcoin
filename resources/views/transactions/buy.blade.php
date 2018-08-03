<div class="modal inmodal" id="createBuyModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title">Creación de Monedas</h4>
                <small class="font-bold">Franklins Gold</small>
            </div>
            <div class="modal-body">
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                <button type="button" id="store_buy_btn" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </div>
</div>