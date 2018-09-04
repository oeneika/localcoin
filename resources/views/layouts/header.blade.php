<!-- begin #header -->
        <div id="header" class="header navbar-default">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <a href="index-2.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Corp</b>binary</a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end navbar-header -->
            
            <!-- begin header-nav -->
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
                                <a href="{{ route('completedTransactions') }}">
                                    <div class="media-left">
                                        <img src="img/user/user-1.jpg" class="media-object" alt="" />
                                        <i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
                                    </div>
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
                        <img src="img/user/user-13.jpg" alt="" /> 
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span> <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('myProfile') }}" class="dropdown-item">Editar Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">Finalizar Sesión</a>
                    </div>
                </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end #header -->