@extends('admin.layouts.app')

@section('content')

    <div class="panel panel-default panel-order col-md-9" style="margin-left: 30px">
        <div class="panel-heading">
            <strong>Orders</strong>
            <div class="btn-group pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                        Filter orders <i class="fa fa-filter"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="{{ url('/admin/orders') }}">All</a></li>
                        <li><a href="{{ url('/admin/orders/pending') }}">Pending</a></li>
                        <li><a href="{{ url('/admin/orders/preparingToSend') }}">Preparing to send</a></li>
                        <li><a href="{{ url('/admin/orders/waitingForPayment') }}">Waiting for payment</a></li>
                        <li><a href="{{ url('/admin/orders/send') }}">Send</a></li>
                        <li><a href="{{ url('/admin/orders/completed') }}">Completed</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel-body">
            @foreach($orders as $order)
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right"><strong>Status: </strong>{{ $order->status }}</div>
                                <span><strong>Order number: </strong></span> <span class="label label-info">#{{ $order->id }}</span>
                                <br>
                                <div class="pull-right"><small>status changed at: </small>{{ $order->updated_at }}</div>
                                <span><strong>Date: </strong></span>{{ $order->created_at }}
                                <br>
                                {{-- Change status of order--}}
                                <div class="pull-right">
                                    <form id="change_status_{{$order->id}}" name="change_status" method="POST" action="{{ url('/admin/orders/'.$order->id.'/update/status') }}">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}

                                        <select id="order_status_{{$order->id}}" name="status" class="form-control order_status">

                                            <option {{old('order_status_'.$order->id,$order->status)=="Pending" ? 'selected':''}} value="Pending">Pending</option>
                                            <option {{old('order_status_'.$order->id,$order->status)=="Preparing to send" ? 'selected':''}} value="Preparing to send">Preparing to send</option>
                                            <option {{old('order_status_'.$order->id,$order->status)=="Waiting for payment" ? 'selected':''}} value="Waiting for payment">Waiting for payment</option>
                                            <option {{old('order_status_'.$order->id,$order->status)=="Send" ? 'selected':''}} value="Send">Send</option>
                                            <option {{old('order_status_'.$order->id,$order->status)=="Completed" ? 'selected':''}} value="Completed">Completed</option>

                                        </select>
                                        <label for="order_status_{{$order->id}}" class="control-label">Change status<span class="glyphicon glyphicon-triangle-top"></span></label>
                                    </form>
                                </div>
                                <span><strong>Made by: </strong></span>{{ $order->first_name }} {{ $order->last_name }}
                                <br>
                                <a id="order_{{$order->id}}" href="#" class="orders"><small>See order details</small></a>

                                {{--Hidden content - order details--}}

                                <div id="order_details_{{$order->id}}" style="margin-top: 15px" hidden>
                                    <strong><span class="glyphicon glyphicon-envelope"></span>E-mail: </strong>{{ $order->email }}
                                    <br>
                                    <strong><span class="glyphicon glyphicon-user"></span>Full name: </strong>{{ $order->first_name }} {{ $order->last_name }}
                                    <br>
                                    <strong><span class="glyphicon glyphicon-map-marker"></span>Street and postal code: </strong>{{ $order->street }}, {{ $order->postal_code }}
                                    <br>
                                    <strong><span class="glyphicon glyphicon-globe"></span>City and country: </strong>{{ $order->city }}, {{ $order->country }}
                                    <br>
                                    <strong><span class="glyphicon glyphicon-phone-alt"></span>Contact number: </strong>{{ $order->phone_number }}
                                    <hr>
                                    <strong><span class="glyphicon glyphicon-plane"></span>Delivery method: </strong>{{ $order->delivery->name }}
                                    <br>
                                    <strong><span class="glyphicon glyphicon-usd"></span>Price for delivery: </strong>${{ $order->delivery->price }}
                                    <br>
                                    <strong><span class="glyphicon glyphicon-credit-card"></span>Payment method: </strong>{{ $order->payment->name }}
                                    <br>
                                    @if($order->user)
                                        <strong><span class="glyphicon glyphicon-gift"></span>Discount for having account: </strong>${{ $order->user->discount }}
                                    @endif
                                    <hr>
                                    <strong><span class="glyphicon glyphicon-usd"></span>Total paid: </strong>${{number_format($order->total_paid, 2, '.', '')}}
                                    <br><br>

                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <thead>
                                            <tr>
                                                <td><strong>Product</strong></td>
                                                <td class="text-center"><strong>Price</strong></td>
                                                <td class="text-center"><strong>Quantity</strong></td>
                                                <td class="text-center"><strong>Totals</strong></td>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($order->orderProducts as $orderProduct)
                                                <tr>
                                                    <td>{{$orderProduct->product->name}}</td>
                                                    <td class="text-center">${{$orderProduct->product->price}}</td>
                                                    <td class="text-center">{{$orderProduct->quantity}}</td>
                                                    <td class="text-center">${{$orderProduct->priceForAllItems}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{ $orders->links() }}

    <script type="text/javascript">

        $(document).ready(function() {

            $('.navbar-toggle-sidebar').click(function () {
                $('.navbar-nav').toggleClass('slide-in');
                $('.side-body').toggleClass('body-slide-in');
            });

            $('.order_status').on('change', function() {

                var order_id = $(this).attr('id');
                var id = order_id.split('_')[2];

                // Submit form to change order status
                $('#change_status_' + id).submit();
            });

            $('.orders').on('click', function (e) {
                e.preventDefault();

                var order_id = $(this).attr('id');
                var id = order_id.split('_')[1];

                $('#order_details_' + id).slideDown();
            });
        });

    </script>

@endsection