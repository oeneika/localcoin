<!-- begin #sidebar -->
        <div id="sidebar" class="sidebar">
            <!-- begin sidebar scrollbar -->
            <div data-scrollbar="true" data-height="100%">
                <!-- begin sidebar user -->
                <ul class="nav">
                    <li class="nav-profile">
                        <a href="javascript:;" data-toggle="nav-profile">
                            <div class="cover with-shadow"></div>
                            <div class="image">
                                <img src="img/user/user-13.jpg" alt="" />
                            </div>
                            <div class="info">
                                <b class="caret pull-right"></b>
                                {{ Auth::user()->name }}
                            </div>
                        </a>
                    </li>
                    <li>
                        <ul class="nav nav-profile">
                            <li><a href="{{ route('myProfile') }}"><i class="fa fa-cog"></i> Editar perfil</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- end sidebar user -->
                <!-- begin sidebar nav -->
                <ul class="nav">
                    <li class="nav-header">Menú de navegación</li>
                    <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fa fa-image"></i>
                            <span>Ordenes</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('mySells') }}">Venta BTC</a></li>
                            <li><a href="{{ route('myBuys') }}">Compra BTC</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('completedTransactions') }}"><i class="fa fa-calendar"></i> <span>Transacciones realizadas</span></a></li>
                    
                    @if (Auth::user()->role == 1)
                        <li><a href="{{ route('onHold') }}"><i class="fa fa-calendar"></i> <span>Transacciones en espera</span></a></li>
                        <li><a href="{{ route('showUsers') }}"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>
                    @endif
                    
                    <!-- begin sidebar minify button -->
                    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                    <!-- end sidebar minify button -->
                </ul>
                <!-- end sidebar nav -->
            </div>
            <!-- end sidebar scrollbar -->
        </div>
        <div class="sidebar-bg"></div>
        <!-- end #sidebar -->