<div class="modal inmodal" id="rankModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title">Puntuar usuarios</h4>
                <small class="font-bold">CorpBinary</small>
            </div>
            <div class="modal-body">
                <form id="rank_form">
                    {{ csrf_field() }}
                    <input type='hidden' id='user_id' name="id_user" value="0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12" style="text-align: center">
                                <select id="star-rating" name="rank">
                                    <option value="">Selecciona tu puntuación</option>
                                    <option value="5">5 estrellas</option>
                                    <option value="4">4 estrellas</option>
                                    <option value="3">3 estrellas</option>
                                    <option value="2">2 estrellas</option>
                                    <option value="1">1 estrella</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                <button type="button" id="rankBtn" class="btn btn-primary">Puntuar usuario</button>
            </div>
        </div>
    </div>
</div>