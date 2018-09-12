@extends('layouts.layout-trade')
@section('header_section')
<link href="{{ asset('css/estilos-trade.css') }}" rel="stylesheet" />
@endsection
@section('content')
<!-- begin #content -->
    <div id="content" class="content">

            <form action="" method="POST">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <input name="cantidad" type="text" value="" class="form-control" placeholder="Cantidad" />
                        </div>
                        <div class="col-md-2">
                            <select name="moneda" id="moneda" class="form-control">
                                <option selected value>Moneda</option>
                                <option value="usd">usd</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="moneda" id="moneda" class="form-control">
                                <option selected value>País</option>
                                <option value="venezuela">Venezuela</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="moneda" id="moneda" class="form-control">
                                <option selected value>Tipo de oferta</option>
                                <option value="of1">oferta 1</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" style="width: 100%">Buscar</button>
                        </div>
                    </div>
                </div>
            </form>  

            <br>

            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="chart-js-1">
                        <div class="panel-heading">
                            
                            <h4 class="panel-title">Últimas ofertas de compra</h4>
                        </div>
                        <div class="panel-body">
                        <!-- begin table-responsive -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Vendedor</th>
                                            <th># Transferencias ejecutadas</th>
                                            <th>Puntuación</th>
                                            <th>Forma de pago</th>
                                            <th>Precio/BTC</th>
                                            <th>Limites</th>
                                            <th>Acción</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>oeneikaphotos</td>
                                                <td>87</td>
                                                <td>3 <i class="fa fa-star amarillito"></i></td>
                                                <td>Transferencias con un banco específico: BANESCO</td>
                                                <td>123.123.123,00</td>
                                                <td>897 - 27,300 VES</td>
                                                <td><button class="btn btn-primary">Comprar</button></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->                     
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->

            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="chart-js-1">
                        <div class="panel-heading">
                            
                            <h4 class="panel-title">Últimas ofertas de venta</h4>
                        </div>
                        <div class="panel-body">
                        <!-- begin table-responsive -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Comprador</th>
                                            <th># Transferencias ejecutadas</th>
                                            <th>Puntuación</th>
                                            <th>Forma de pago</th>
                                            <th>Precio/BTC</th>
                                            <th>Limites</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>oeneikaphotos</td>
                                                <td>87</td>
                                                <td>3 <i class="fa fa-star amarillito"></i></td>
                                                <td>Transferencias con un banco específico: BANESCO</td>
                                                <td>123.123.123,00</td>
                                                <td>897 - 27,300 VES</td>
                                                <td><button class="btn btn-primary">Vender</button></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->                     
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
    </div>
<!-- end #content -->
@endsection

@section('footer_section')

@endsection