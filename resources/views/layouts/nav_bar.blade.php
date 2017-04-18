<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <div class="brandFont">{{ config('app.name') }}</div>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse" style="text-align: center">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">

            </ul>

            <!-- Center Side Of Navbar - used to display flash messages -->
            <ul class="nav nav-center">

                @if(Session::has('changed_name'))
                    <div class="alert alert-success text-center">{{ Session::get('changed_name') }}</div>
                @endif

                @if(Session::has('changed_password'))
                    <div class="alert alert-success text-center">{{ Session::get('changed_password') }}</div>
                @endif

                    @if(Session::has('changed_email'))
                        <div class="alert alert-success text-center">{{ Session::get('changed_email') }}</div>
                    @endif

                    @if(Session::has('removed_account'))
                        <div class="alert alert-danger text-center">{{ Session::get('removed_account') }}</div>
                    @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else

                <!-- Cart -->
                    <li>
                        <a href="{{ url('/users/'.Auth::user()->id.'/cart') }}">
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span>{{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('users/'.Auth::user()->id.'/settings') }}">
                                    <span class="glyphicon glyphicon-cog"></span>Settings
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-modal-window"></span>Your orders
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="glyphicon glyphicon-log-out"></span>Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>