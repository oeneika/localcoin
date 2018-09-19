<div class="modal inmodal" id="createBuyModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
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
                                    <input class="form-control" type="number" name="price" id="" placeholder="0.00">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Moneda</label>
                                    <select name="currency" id="" class="form-control">
                                        <option selected value>Seleccione moneda</option>
                                            @foreach ($currencies as $currency)
                                                <option value="{{ $currency->id_currency }}">{{ $currency->name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
                                    <input class="form-control" type="text" name="payment_method" placeholder="Introduzca una ubicación">
                                </div>
                            </div>
                            <div class="col-md-6">
                            	<label>Límites comerciales</label>
                            	<div class="row">
                            		<div class="col-md-6">
                            			<div class="form-group">
		                                    
		                                    <input class="form-control" type="number" name="bottom_limit" placeholder="Inicio">
		                                </div>
                            		</div>
                            		<div class="col-md-6">
                            			<div class="form-group">
		                                    
		                                    <input class="form-control" type="number" name="upper_limit" placeholder="Fin">
		                                </div>
                            		</div>
                            	</div>
                                
                            </div>
                        </div>
                        {{-- 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Ventana de pago</label>
                                    <input class="form-control" type="number" name="payment_window" placeholder="4 horas y 30 minutos">
                                </div>
                            </div>
                        </div>
                         --}}
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Término de pago</label>
                                    <textarea name="terms" id="" rows="3" class="form-control"></textarea>
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