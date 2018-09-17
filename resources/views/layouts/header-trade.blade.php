<!-- begin #header -->
        <div id="header" class="header navbar-default">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <a href="home/" class="navbar-brand"><b>Corp</b>binary</a>
            </div>
            <!-- end navbar-header -->
            
            <!-- begin header-nav -->
            <ul class="navbar-nav navbar-right">
                
                <li><a href="{{ route('buyTrade') }}">Comprar btc </a></li>
                <li><a href="{{ route('buyTrade') }}"> Vender btc </a></li>
                <li><a href="{{ route('login') }}"> Iniciar sesión </a></li>
                <li><a href="{{ route('register') }}"> Registrarse</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">Finalizar Sesión</a></li>
            </ul>
            <!-- end header navigation right -->
        </div>
<!-- end #header -->