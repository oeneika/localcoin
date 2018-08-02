@extends('layouts.layout')

@section('content')
<div class="content container">
        <h2 class="page-title">Dashboard <small>Estadisticas y datos más relevantes</small></h2>
        <div class="row">
            <div class="col-lg-12">
                <section class="widget">
                    <header>
                        <h4>
                            Bitcoin
                            <small>
                                Grafica en tiempo real
                            </small>
                        </h4>
                        <div class="widget-controls">
                            <a title="Options" href="#"><i class="glyphicon glyphicon-cog"></i></a>
                            <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                            <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                            <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="body no-margin">
                        <div id="visits-chart" class="chart visits-chart">
                            <svg></svg>
                        </div>
                        <div class="visits-info well well-sm">
                            <div class="row">
                                <div class="col-sm-3 col-xs-6">
                                    <div class="key"><i class="fa fa-users"></i> Total Traffic</div>
                                    <div class="value">24 541 <i class="fa fa-caret-up color-green"></i></div>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <div class="key"><i class="fa fa-bolt"></i> Unique Visits</div>
                                    <div class="value">14 778 <i class="fa fa-caret-down color-red"></i></div>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <div class="key"><i class="fa fa-plus-square"></i> Revenue</div>
                                    <div class="value">$3 583.18 <i class="fa fa-caret-up color-green"></i></div>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <div class="key"><i class="fa fa-user"></i> Total Sales</div>
                                    <div class="value">$59 871.12 <i class="fa fa-caret-down color-red"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="widget">
                    <header>
                        <h4>
                            Ventas
                        </h4>
                        <div class="widget-controls">
                            <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-plus"></i></a>
                            <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-minus"></i></a>
                            <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                        <div class="widget-table-overflow">
                            <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td><a href="#">ottoto@example.com</a></td>
                                        <td><a href="" class="btn btn-primary">Vender</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td><a href="#">fat.thor@example.com</a></td>
                                        <td><a href="" class="btn btn-primary">Vender</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td><a href="#">larry@example.com</a></td>
                                        <td><a href="" class="btn btn-primary">Vender</a></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Peter</td>
                                        <td>Horadnia</td>
                                        <td><a href="#">peter@example.com</a></td>
                                        <td><a href="" class="btn btn-primary">Vender</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                        </div>
                </section>
                <section class="widget">
                    <header>
                    <h4>
                        Compras
                    </h4>
                    <div class="widget-controls">
                        <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-plus"></i></a>
                        <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-minus"></i></a>
                            <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-table-overflow">
                        <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Accion</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td><a href="#">ottoto@example.com</a></td>
                                    <td><a href="" class="btn btn-primary">Comprar</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td><a href="#">fat.thor@example.com</a></td>
                                    <td><a href="" class="btn btn-primary">Comprar</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td><a href="#">larry@example.com</a></td>
                                    <td><a href="" class="btn btn-primary">Comprar</a></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Peter</td>
                                    <td>Horadnia</td>
                                    <td><a href="#">peter@example.com</a></td>
                                    <td><a href="" class="btn btn-primary">Comprar</a></td>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                </section>
                
            </div>
        </div>
            @include('layouts.footer')
        </div>
        <div class="loader-wrap hiding hide">
            <i class="fa fa-circle-o-notch fa-spin"></i>
        </div>
    </div>
@endsection
