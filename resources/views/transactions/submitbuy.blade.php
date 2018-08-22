<div class="modal inmodal" id="createBuyModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title">Crear Compra</h4>
                <small class="font-bold">CorpBinary</small>
            </div>
            <div class="modal-body">
                <form id="store_buy_form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Precio</label>
                                <input class="form-control" type="number" name="price" placeholder="0.00">
                            </div>
                        </div>
                        <div class="col-md-6">
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Cantidad BTC</label>
                                <input class="form-control" type="number" name="quantity" placeholder="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Cuenta Bancaria</label>
                                <select name="bank_account" id="" class="form-control">
                                    <option selected value>Seleccione Banco</option>
                                    @foreach($bank_accounts as $account)
                                        <option value="{{ $account->id_bank_account }}">{{ $account->number }}</option>
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