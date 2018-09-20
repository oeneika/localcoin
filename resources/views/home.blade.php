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
                        <form action="{{ route('home') }}" method="GET">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input name="price" type="number" value="" class="form-control" placeholder="Cantidad que desea pagar" />
                                    </div>
                                    <div class="col-md-2">
                                        <select name="currency" id="moneda" class="form-control">
                                            <option selected value>Moneda</option>
                                            
                                            @foreach ($currencies as $currency)
                                                <option value="{{ $currency->id_currency }}">{{ $currency->abv }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="location" id="" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <select name="type" id="moneda" class="form-control">
                                            <option selected value>Tipo de oferta</option>
                                            <option value="1">Compra</option>
                                            <option value="2">Venta</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary" href="#">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>
            <hr>
            @if(!empty($responses))
            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="chart-js-1">
                        <div class="panel-heading">
                            
                            <h3 class="panel-title"><strong>Resultados</strong></h3>
                        </div>
                        <div class="panel-body">
                        <!-- begin table-responsive -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th># Transferencias ejecutadas</th>
                                            <th>Puntuación</th>
                                            <th>Forma de pago</th>
                                            <th>Precio/BTC</th>
                                            <th>Limites</th>
                                            <th>Acción</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($responses as $buy)
                                                <tr>
                                                    <td>{{ $buy->submittingUser->user }}</td>
                                                    <td>{{ sizeof($buy->submittingUser->createdTransactions->where('status',2)) + sizeof($buy->submittingUser->madeTransactions->where('status',2)) }}</td>
                                                    <td>{{ $buy->submittingUser->rank ? $buy->submittingUser->rank->reputation : 0 }} <i class="fa fa-star amarillito"></i></td>
                                                    <td>{{ $buy->payment_method }}</td>
                                                    <td>{{ $buy->price }} {{ $buy->currency->abv }}</td>
                                                    <td>{{ $buy->bottom_limit }} - {{ $buy->upper_limit }} {{ $buy->currency->abv }}</td>
                                                    @if($buy->type == 0)
                                                        <td><td><a class="btn btn-primary"  href="{{ route('buy',['id'=>$buy->id_transaction]) }}"   role="button">Vender</a></td></td>
                                                    @else 
                                                        <td><td><a class="btn btn-primary"  href="{{ route('buy',['id'=>$buy->id_transaction]) }}"   role="button">Comprar</a></td></td>
                                                    @endif
                                                </tr>
                                            @endforeach
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
            @endif
            @if(Auth::user())
            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="chart-js-1">
                        <div class="panel-heading">
                            
                            <h3 class="panel-title"><strong>Transacciones en proceso</strong></h3>
                        </div>
                        <div class="panel-body">
                        <!-- begin table-responsive -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Tipo</th>
                                            <th>Puntuación</th>
                                            <th>Forma de pago</th>
                                            <th>Precio/BTC</th>
                                            <th>Limites</th>
                                            <th>Acción</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trades as $trade)
                                            <tr>
                                                <td>@if($trade->submittingUser->id == Auth::user()->id){{ $trade->receivingUser->user }}@else {{ $trade->submittingUser->user }} @endif</td>
                                                <td>@if($trade->type == 0) Compra @else Venta @endif</td>
                                                <td>{{ $trade->submittingUser->rank ? $trade->submittingUser->rank->reputation : 0 }} <i class="fa fa-star amarillito"></i></td>
                                                <td>{{ $trade->payment_method }}</td>
                                                <td>{{ $trade->price }} {{ $trade->abv }}</td>
                                                <td>{{ $trade->bottom_limit }} - {{ $trade->upper_limit }} {{ $trade->abv }}</td>
                                                <td><td><a class="btn btn-primary" @if ($trade->submittingUser->id == Auth::user()->id)href="{{ route('messagesSell',['id'=>$trade->id_transaction]) }}" @else href="{{ route('messagesBuy',['id'=>$trade->id_transaction]) }}" @endif role="button">Ir a chat</a></td></td>
                                            </tr>
                                        @endforeach
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
            @endif

            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="chart-js-1">
                        <div class="panel-heading">
                            
                            <h3 class="panel-title"><strong>Vender</strong></h3>
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
                                            @foreach ($buys as $buy)
                                                <tr>
                                                    <td>{{ $buy->submittingUser->user }}</td>
                                                    <td>{{ sizeof($buy->submittingUser->createdTransactions->where('status',2)) + sizeof($buy->submittingUser->madeTransactions->where('status',2)) }}</td>
                                                    <td>{{ $buy->submittingUser->rank ? $buy->submittingUser->rank->reputation : 0 }} <i class="fa fa-star amarillito"></i></td>
                                                    <td>{{ $buy->payment_method }}</td>
                                                    <td>{{ $buy->price }} {{ $buy->abv }}</td>
                                                    <td>{{ $buy->bottom_limit }} - {{ $buy->upper_limit }} {{ $buy->abv }}</td>
                                                    @if(Auth::user())
                                                        @if ($buy->submittingUser->id != Auth::user()->id)
                                                            <td><td><a class="btn btn-primary" href="{{ route('buy',['id'=>$buy->id_transaction]) }}" role="button">Vender</a></td></td>
                                                        @endif
                                                    @else
                                                        <td><td><a class="btn btn-primary" href="{{ route('buy',['id'=>$buy->id_transaction]) }}" role="button">Vender</a></td></td>
                                                    @endif
                                                </tr>
                                            @endforeach
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
                            
                            <h3 class="panel-title"><strong>Comprar</strong></h3>
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
                                    @foreach ($sells as $sell)
                                        <tr>
                                            <td>{{ $sell->submittingUser->user }}</td>
                                            <td>{{ sizeof($sell->submittingUser->createdTransactions->where('status',2)) + sizeof($sell->submittingUser->madeTransactions->where('status',2)) }}</td>
                                            <td>{{ $sell->submittingUser->rank ? $sell->submittingUser->rank->reputation : 0 }} <i class="fa fa-star amarillito"></i></td>
                                            <td>{{ $sell->payment_method }}</td>
                                            <td>{{ $sell->price }} {{ $sell->abv }}</td>
                                            <td>{{ $sell->bottom_limit }} - {{ $sell->upper_limit }} {{ $sell->abv }}</td>
                                            @if(Auth::user())
                                                @if ($buy->submittingUser->id != Auth::user()->id)
                                                    <td><a class="btn btn-primary" href="{{ route('buy',['id'=>$sell->id_transaction]) }}" role="button">Comprar</a></td>
                                                @endif
                                            @else
                                                <td><a class="btn btn-primary" href="{{ route('buy',['id'=>$sell->id_transaction]) }}" role="button">Comprar</a></td>
                                            @endif
                                            
                                        </tr>
                                    @endforeach
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