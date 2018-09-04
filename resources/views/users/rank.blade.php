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
                    <input type='hidden' id='user_id' name="id_user" value=''>
                    <div class="row">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-2">
                            <div class="radio radio-danger">
                                <input type="radio" name="rank" id="rank" value="1">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio radio-danger">
                                <input type="radio" name="rank" id="rank" value="2">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio radio-danger">
                                <input type="radio" name="rank" id="rank" value="3">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio radio-danger">
                                <input type="radio" name="rank" id="rank" value="4">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio radio-danger">
                                <input type="radio" name="rank" id="rank" value="5">
                            </div>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-2">
                            <div class="radio radio-danger">
                                <label for="radio3">
                                    <i class="fa fa-star"></i>    
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio radio-danger">
                                <label for="radio3">
                                    <i class="fa fa-star"></i>    
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio radio-danger">
                                <label for="radio3">
                                    <i class="fa fa-star"></i>    
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio radio-danger">
                                <label for="radio3">
                                    <i class="fa fa-star"></i>    
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio radio-danger">
                                <label for="radio3">
                                    <i class="fa fa-star"></i>    
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">

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