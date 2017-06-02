<nav class="navbar navbar-default navbar-fix navbar-fixed-top">
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

                @if(Session::has('changed_username'))
                    <div class="alert alert-success flash-message text-center">{{ Session::get('changed_username') }}</div>
                @endif

                @if(Session::has('changed_password'))
                    <div class="alert alert-success flash-message text-center">{{ Session::get('changed_password') }}</div>
                @endif

                    @if(Session::has('changed_personal_data'))
                        <div class="alert alert-success flash-message text-center">{{ Session::get('changed_personal_data') }}</div>
                    @endif

                    @if(Session::has('changed_email'))
                        <div class="alert alert-success flash-message text-center">{{ Session::get('changed_email') }}</div>
                    @endif

                    @if(Session::has('removed_account'))
                        <div class="alert alert-danger flash-message text-center">{{ Session::get('removed_account') }}</div>
                    @endif

                    @if(Session::has('subscribed'))
                        <div class="alert alert-success flash-message text-center">{{ Session::get('subscribed') }}</div>
                    @endif

                    {{--AJAX flash messages--}}
                    <div id="added_to_cart" class="alert alert-success flash-message" hidden>Added new product</div>
                    <div id="removed_from_cart" class="alert alert-danger flash-message" hidden>Removed product</div>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                <!-- Cart -->
                <li class="dropdown dropdown-dynamic">
                    <a id="shopping_cart" href="{{ url('/cart') }}">
                        <span class="glyphicon glyphicon-shopping-cart glyphicon-fix"></span>
                        {{--Number of products--}}
                        <span class="badge cart_counter">{{ Session::has('cart') ? Session::get('cart')->numberOfProducts : '0' }}</span>
                    </a>

                    @if(Session::has('cart'))
                        <ul id="cart_list" class="dropdown-menu dropdown-menu-dynamic" role="menu">
                            @if(Session::get('cart')->numberOfProducts == 0)
                                <li>
                                    <h5 class="text-center">Cart is empty</h5>
                                </li>
                            @else
                                @foreach(Session::get('cart')->products as $product)
                                    <li>
                                        <a href="{{ url('/products/'.$product['id']) }}">
                                            <img src="{{$product['product']['path_to_thumbnail']}}" width="30" height="30">
                                            <b>{{$product['product']['name']}}</b>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    @else

                            <ul id="cart_list" class="dropdown-menu dropdown-menu-dynamic" role="menu">
                                <li>
                                    <h5 class="text-center">Cart is empty</h5>
                                </li>
                            </ul>
                    @endif
                </li>

                @if (Auth::guest())

                    <!-- Without Authentication Links -->
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else

                <!-- Authentication Links -->
                    <li class="dropdown dropdown-dynamic">
                        <a href="#" onclick="event.preventDefault();">
                            <span class="glyphicon glyphicon-user"></span>{{ Auth::user()->username }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-dynamic" role="menu">
                            <li>
                                <a href="{{ url('users/'.Auth::user()->id.'/personalData') }}">
                                    <span class="glyphicon glyphicon-briefcase"></span>Your personal data
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('users/'.Auth::user()->id.'/settings') }}">
                                    <span class="glyphicon glyphicon-cog"></span>Settings
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/users/'.Auth::user()->id.'/orders') }}">
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

            <!-- Admin panel link -->
            @if(Auth::check() && Auth::user()->admin)
                    <li>
                        <a href="{{ url('/admin') }}">
                            <span class="glyphicon glyphicon-wrench"></span>Admin panel
                        </a>
                    </li>
            @endif

            <!-- Search products -->
                <li id="search_section" class="dropdown">
                    <a id="search_link" href="#toogle-search" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-search"></span>
                    </a>

                    <ul id="search_menu" class="dropdown-menu" role="menu">
                        <li style="margin-bottom: 15px">
                            <input id="search_input" type="text" name="search" href="{{ url('/products/search') }}" class="form-control" placeholder="Type here to search product..." style="border: none;">
                        </li>
                        <div id="searched_products"></div>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>