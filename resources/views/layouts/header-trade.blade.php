<!-- begin #header -->
        <div id="header" class="header navbar-default">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <a href="{{ route('home') }}" class="navbar-brand"><b>Corp</b>binary</a>
            </div>
            <!-- end navbar-header -->
            
            <!-- begin header-nav -->
            <ul class="navbar-nav navbar-right">
                
                
                @if (Auth::user())
                    <li><a href="{{ route('myBuysTrade') }}">Comprar btc </a></li>
                    <li><a href="{{ route('mySellsTrade') }}"> Vender btc </a></li>
                    <ul class="navbar-nav navbar-right">
                
                        <li class="dropdown">
                            <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                                <i class="fa fa-bell"></i>
                                @if (count(Auth::user()->notifications)>0)
                                    <span class="label">{{ count(Auth::user()->notifications) }}</span>    
                                @endif
                            </a>
                            <ul class="dropdown-menu media-list dropdown-menu-right">
                                <li class="dropdown-header">NOTIFICACIONES ({{ count(Auth::user()->notifications) }})</li>
                                @foreach (Auth::user()->notifications as $notification)
                                    <li class="media">
                                        <a href="{{ route('home') }}">
                                        
                                            <div class="media-body">
                                                <h6 class="media-heading">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</h6>
                                                <p>{{ $notification->data['message'] }}.</p>
                                                <div class="text-muted f-s-11">{{ $notification->created_at }}</div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                                
                            </ul>
                        </li>
                        <li class="dropdown navbar-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('img/user/user-13.jpg') }}" alt="" /> 
                                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span> <b class="caret"></b>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('tradeProfile') }}" class="dropdown-item">Editar Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">Finalizar Sesión</a>
                            </div>
                        </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                    </ul>
                @else
                    <li><a href="{{ route('register') }}">Comprar btc </a></li>
                    <li><a href="{{ route('register') }}"> Vender btc </a></li>
                    <li><a href="{{ route('login') }}"> Iniciar sesión </a></li>
                    <li><a href="{{ route('register') }}"> Registrarse</a></li>
                @endif
            </ul>
            <!-- end header navigation right -->
        </div>
<!-- end #header -->