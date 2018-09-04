<div class="modal inmodal" id="createWalletModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title">Wallet</h4>
                <small class="font-bold">Corpbinary</small>
            </div>
            <div class="modal-body">
                <form id="store_wallet_form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Etiqueta</label>
                        <input id="label" class="form-control" type="text" name="label" data-parsley-id="16">
                    </div>
                    <div class="form-group">
                        <label>Dirección de Wallet</label>
                        <input id="address" class="form-control" type="text" name="address" data-parsley-id="16">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                <button type="button" id="store_wallet_btn" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </div>
</div>