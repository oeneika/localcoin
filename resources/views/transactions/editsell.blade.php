<div class="modal inmodal" id="editSellModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <h4 class="modal-title">Editar Venta</h4>
                    <small class="font-bold">CorpBinary</small>
                </div>
                <div class="modal-body">
                    <form id="update_sell_form">
                        <input type="hidden" name="id_transaction" id="id_transaction" value="">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input class="form-control" type="number" name="price" id="edit_price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Moneda</label>
                                    <select name="currency" id="edit_currency" class="form-control">
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
                                    <input class="form-control" type="number" name="quantity" id="edit_quantity">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cuenta Bancaria</label>
                                    <select name="bank_account" id="edit_bank_account" class="form-control">
                                        <option selected value>Seleccione una Cuenta Bancaria</option>
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
                    <button type="button" id="update_sell_btn" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </div>
    </div>