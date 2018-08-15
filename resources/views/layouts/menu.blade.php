<div class="logo">
    <h4><a href="index-2.html">Corp<strong>binary</strong></a></h4>
</div>
<nav id="sidebar" class="sidebar nav-collapse collapse">
            <ul id="side-nav" class="side-nav">
                <li class="active">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> <span class="name">Dashboard</span></a>
                </li>
                <li class="panel">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#menu-levels-collapse" aria-expanded="false"><i class="fa fa-database"></i> <span class="name">Mis Transacciones</span></a>
                    <ul id="menu-levels-collapse" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <li class="">
                                <a href="{{ route('mySells') }}"> <span class="name">Compra de BTC</span></a>
                            </li>
                            <li class="">
                                <a href="{{ route('myBuys') }}"> <span class="name">Venta de BTC</span></a>
                            </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('completedTransactions') }}"><i class="fa fa-check"></i> <span class="name">Transacciones realizadas</span></a>
                </li>
            </ul>

</nav> 