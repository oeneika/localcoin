@extends('layouts.layout-trade')
@section('header_section')
<link href="{{ asset('css/estilos-trade.css') }}" rel="stylesheet" />
@endsection
@section('content')
<!-- begin #content -->
    <div id="content" class="content">
            
            <!-- begin page-header -->
            <h1 class="page-header"><strong>Comprar BTC con {{ $transaction->payment_method }}</strong></h1>
            <p>El usuario <strong>{{ $transaction->submittingUser->name }} {{ $transaction->submittingUser->lastname }}</strong> de corpbinary.com desea vender bitcoin.</p>
            <!-- end page-header -->   
            
            <div class="row">
                <div class="col-md-6">
                <!-- begin panel -->
                <div class="panel panel-inverse" data-sortable-id="table-basic-1">
                    <!-- begin panel-heading -->
                    <div class="panel-heading">
                        <h3 class="panel-title">Información de la transacción</h3>
                    </div>
                    <!-- end panel-heading -->

                    <!-- begin panel-body -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5">
                                <p><strong><i class="fa fa-caret-right"></i> Precio: </strong>{{ $transaction->price }}</p>
                                <p><strong><i class="fa fa-caret-right"></i> Usuario: </strong><a href="#">{{ $transaction->submittingUser->user }}</a></p>
                                <p><strong><i class="fa fa-caret-right"></i> Ubicación: </strong>{{ $transaction->location }}</p>
                            </div>
                            <div class="col-md-7">
                                <p><strong><i class="fa fa-caret-right"></i> Forma de pago: </strong>{{ $transaction->payment_method }} </p>
                                <p><strong><i class="fa fa-caret-right"></i> Límites comerciales: </strong>{{ $transaction->bottom_limit }} - {{ $transaction->upper_limit }} {{ $transaction->abv }} </p>
                                {{-- <p><strong><i class="fa fa-caret-right"></i> Ventana de pago: </strong>4 horas 30 minutos</p> --}}
                            </div>
                        </div>
                                
                    </div>
                    <!-- end panel-body -->
                </div>
                <!-- end panel -->

                    <div class="panel-body border">
                        <h3 class="panel-title" align="center"><strong>¿Cuánto deseas vender?</strong></h3>
                        <br>
                    <form id="make_buy_id" action="{{ route('makeTransaction',['id'=>$transaction->id_transaction]) }}" method="POST">
                                @method('PUT')
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 fondo">
                                            <label class="control-label">Monto en bolívares</label>
                                            <input step='any' id="id_price" name="price" min='{{ $transaction->bottom_limit }}' max='{{ $transaction->upper_limit }}' type="number" value="" class="form-control" placeholder="0.00" />
                                        </div>
                                        <div class="col-md-6 fondo">
                                            <label class="control-label">Monto en bitcoin</label>
                                            <input step='any' id="id_quantity" name="quantity" type="number" value="" class="form-control" placeholder="0.00" />
                                        </div>
                                    </div>
                                </div>

                            <hr>
                            <h3 class="font-11"><strong>Recordatorio:</strong></h3>
                            <p class="font-11 rojo">( * ) La cantidad mínima que se puede comprar de este anuncio es 5 USD.</p>
                            <p class="font-11 rojo">( * ) La cantidad máxima que se puede comprar de este anuncio es 200 USD.</p>
                        </div>

                        <hr>

                        <!-- begin #accordion -->
                        <div id="accordion" class="card-accordion">
                            <h3 class="panel-title"><strong>Preguntas frecuentes</strong></h3>
                            <br>
                            <!-- begin card -->
                            <div class="card">
                                <div class="card-header verdecito text-white pointer-cursor" data-toggle="collapse" data-target="#collapseOne">
                                    ¿Cómo empezar y ponerse en contacto con el comerciante?
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <!-- begin card -->
                            <div class="card">
                                <div class="card-header verdecito text-white pointer-cursor collapsed" data-toggle="collapse" data-target="#collapseTwo">
                                    ¿Cómo cancelar el intercambio?
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <!-- begin card -->
                            <!-- <div class="card">
                                <div class="card-header bg-black text-white pointer-cursor collapsed" data-toggle="collapse" data-target="#collapseThree">
                                    Collapsible Group Item #3
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div> -->
                            <!-- end card -->
                        </div>
                        <!-- end #accordion -->
                    </div>
                    <div class="col-md-6">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="table-basic-1">
                        <!-- begin panel-heading -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Términos de comercio con oriana_pc</h3>
                        </div>
                        <!-- end panel-heading -->

                        <!-- begin panel-body -->
                        <div class="panel-body" style="text-align: justify;">
                            <p>
                                {{ $transaction->terms }}
                            </p>
                        </div>
                        <!-- end panel-body -->
                    </div>
                    <!-- end panel -->

                        @if (Auth::user())
                            <button type="submit" class="btn btn-primary" href="" role="button" style="width: 100%;">Comprar </button>
                        @else
                            <div class="panel-body dashed">
                                <h3 class="font-22" align="center"><strong>¡Regístrese y venda bitcoins al instante!</strong></h3>
                                <a class="btn btn-primary" href="{{ route('register') }}" role="button" style="width: 100%;">Registrese aquí</a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
            
            
            
    </div>
<!-- end #content -->
@endsection

@section('footer_section')
    <script>
        var btc_current_price = {{ $transaction->price }}
    </script> 
    <script src="{{ asset('js/transaction/calculator.js') }}"></script>
@endsection 