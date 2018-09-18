<div class="modal inmodal" id="createSellModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <h4 class="modal-title">Crear Venta</h4>
                    <small class="font-bold">CorpBinary</small>
                </div>
                <div class="modal-body">
                    <form id="store_sell_form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input class="form-control" type="number" name="price" id="" placeholder="0.00">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Moneda</label>
                                    <select name="currency" id="" class="form-control">
                                        <option selected value>Seleccione moneda</option>
                                        
                                            <option value=""></option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cantidad BTC</label>
                                    <input class="form-control" type="number" name="quantity" placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ubicación</label>
                                    <input class="form-control" type="text" name="location" placeholder="País">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            	
                                <div class="form-group">
                                    <label>Forma de pago</label>
                                    <input class="form-control" type="number" name="method" placeholder="Transferencia">
                                </div>
                            </div>
                            <div class="col-md-6">
                            	<label>Límites comerciales</label>
                            	<div class="row">
                            		<div class="col-md-6">
                            			<div class="form-group">
		                                    
		                                    <input class="form-control" type="number" name="start" placeholder="Inicio">
		                                </div>
                            		</div>
                            		<div class="col-md-6">
                            			<div class="form-group">
		                                    
		                                    <input class="form-control" type="number" name="end" placeholder="Fin">
		                                </div>
                            		</div>
                            	</div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Ventana de pago</label>
                                    <input class="form-control" type="number" name="window" placeholder="4 horas y 30 minutos">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Banco</label>
                                    <select name="bank_account" id="" class="form-control">
                                        <option selected value>Seleccione Cuenta Bancaria</option>
                                        
                                            <option value=""></option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Término de pago</label>
                                    <textarea name="" id="" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="store_sell_btn" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </div>
    </div>