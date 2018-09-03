<div class="modal inmodal" id="puntuarModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title">Puntuar usuarios</h4>
                <small class="font-bold">CorpBinary</small>
            </div>
            <div class="modal-body">
                <form id="store_buy_form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="radio radio-danger">
                                <input type="radio" name="radio1" id="radio1" value="option1">
                                <label for="radio3">
                                    Confiable
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="radio radio-danger">
                                <input type="radio" name="radio2" id="radio2" value="option2">
                                <label for="radio3">
                                    No confiable
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                <button type="button" id="" class="btn btn-primary">Puntuar usuario</button>
            </div>
        </div>
    </div>
</div>