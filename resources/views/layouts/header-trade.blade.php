<!-- begin #header -->
        <div id="header" class="header navbar-default">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <a href="home/" class="navbar-brand"><b>Corp</b>binary</a>
            </div>
            <!-- end navbar-header -->
            
            <!-- begin header-nav -->
            <ul class="navbar-nav navbar-right">
                
                
                @if (Auth::user())
                    <li><a href="{{ route('myBuysTrade') }}">Comprar btc </a></li>
                    <li><a href="{{ route('mySellsTrade') }}"> Vender btc </a></li>
                    <li><a href="{{ route('logout') }}" class="dropdown-item">Finalizar Sesión</a></li>
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