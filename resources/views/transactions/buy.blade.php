<div class="modal inmodal" id="_BuyModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <h4 class="modal-title">Comprar/Vender</h4>
                    <small class="font-bold">CorpBinary</small>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="mt-sm mb-xs" id="names_details"></h3>
                            <div class="row">
                            </div>
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="color:black; !important">Precio</th>
                                        <th style="color:black; !important">Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody id="details_body">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form id="_buy_form">
                        {{ csrf_field() }}
                        <input type="hidden" id="id_transaction_details" name="id_transaction" val="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cuenta Bancaria</label>
                                    <select name="bank_account" id="" class="form-control">
                                        <option selected value>Seleccione una cuenta</option>
                                        @foreach(Auth::user()->BankAccounts as $account)
                                            <option value="{{ $account->id_bank_account }}">{{ $account->number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cuenta Bancaria</label>
                                    <input type="text" class=""></input>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="_buy_btn" class="btn btn-primary">Comprar</button>
                </div>
            </div>
        </div>
    </div>