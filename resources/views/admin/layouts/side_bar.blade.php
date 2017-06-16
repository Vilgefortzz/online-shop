<div class="col-md-2 sidebar">
    <div class="row">
        <div class="absolute-wrapper"> </div>
        <!-- Menu -->
        <div class="side-menu">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Main Menu -->
                <div class="side-menu-container">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ url('/admin') }}"><span class="glyphicon glyphicon-dashboard"></span>Dashboard</a></li>
                        <li><a href="{{ url('/admin/users') }}"><span class="glyphicon glyphicon-user"></span>Users</a></li>

                        <!-- Dropdown 1-->
                        <li id="dropdown1">
                            <a data-toggle="collapse" href="#dropdown-1">
                                <span class="glyphicon glyphicon-list-alt"></span>Products<span class="caret"></span>
                            </a>

                            <div id="dropdown-1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li><a href="{{ url('/admin/products') }}">All products ( show, edit, delete, change quantity )</a></li>
                                        <li><a href="#">Add product</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <!-- Dropdown 2-->
                        <li id="dropdown2">
                            <a data-toggle="collapse" href="#dropdown-2">
                                <span class="glyphicon glyphicon-modal-window"></span>Orders<span class="caret"></span>
                            </a>

                            <div id="dropdown-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li><a href="{{ url('/admin/orders') }}">All orders ( show, change status )</a></li>
                                        <li><a href="{{ url('/admin/orders/pending') }}">Show orders with pending status ( show, change status )</a></li>
                                        <li><a href="{{ url('/admin/orders/preparingToSend') }}">Show orders with preparing to send status ( show, change status )</a></li>
                                        <li><a href="{{ url('/admin/orders/waitingForPayment') }}">Show orders with waiting for payment status ( show, change status )</a></li>
                                        <li><a href="{{ url('/admin/orders/send') }}">Show orders with send status ( show, change status )</a></li>
                                        <li><a href="{{ url('/admin/orders/completed') }}">Show orders with completed status ( show, change status )</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
