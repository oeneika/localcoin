@extends('layouts.layout-trade')
@section('header_section')
<link href="{{ asset('css/estilos-trade.css') }}" rel="stylesheet" />
@endsection
@section('content')
<!-- begin #content -->
    <div id="content" class="content">
            <hr>
                <div class="panel panel-inverse" data-sortable-id="chart-js-1">
                    
                
                    <div class="panel-body border">
                        <h3 class="panel-title" align="center"><strong>Búsqueda rápida</strong></h3>
                        <br>
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
                                        <a class="btn btn-primary" href="#" role="button">Buscar</a>
                                    </div>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>
            <hr>
            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="chart-js-1">
                        <div class="panel-heading">
                            
                            <h3 class="panel-title"><strong>Últimas ofertas de compra</strong></h3>
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
                                                <td><a class="btn btn-primary" href="{{ route('buyTrade') }}" role="button">Comprar</a></td>
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
                            
                            <h3 class="panel-title"><strong>Últimas ofertas de venta</strong></h3>
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
                                                <td><a class="btn btn-primary" href="{{ route('buyTrade') }}" role="button">Vender</a></td>
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
                <br>
            </div>
            <!-- end row -->
    </div>
<!-- end #content -->
@endsection

@section('footer_section')

@endsection