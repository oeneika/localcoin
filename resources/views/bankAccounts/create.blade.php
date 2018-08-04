<div class="modal inmodal" id="createBankAccountModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title">Cuenta Bancaria</h4>
                <small class="font-bold">Corpbinary</small>
            </div>
            <div class="modal-body">
                <form id="store_bank_account_form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exp">Banco</label>
                        <select name="bank" id="" class="form-control input-transaparent">
                            <option selected value>Seleccione Banco</option>
                            @foreach($banks as $bank)
                                <option value="{{ $bank->id_bank }}">{{ $bank->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="website">Número de Cuenta</label>
                        <input id="account_number" class="form-control" type="number" name="account_number" maxlength="28" data-parsley-id="16">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                <button type="button" id="store_bank_account_btn" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </div>
</div>