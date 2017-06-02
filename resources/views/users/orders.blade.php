@extends('layouts.app_without_footer')

@section('content')

    <div class="container container-fix">
        <div class="row">

            <div class="panel panel-default panel-order">
                <div class="panel-heading">
                    <strong>Order history</strong>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Filter order history <i class="fa fa-filter"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{{ url('/users/'.Auth::user()->id.'/orders') }}">All</a></li>
                                <li><a href="{{ url('/users/'.Auth::user()->id.'/orders/pending') }}">Pending</a></li>
                                <li><a href="{{ url('/users/'.Auth::user()->id.'/orders/preparingToSend') }}">Preparing to send</a></li>
                                <li><a href="{{ url('/users/'.Auth::user()->id.'/orders/waitingForPayment') }}">Waiting for payment</a></li>
                                <li><a href="{{ url('/users/'.Auth::user()->id.'/orders/send') }}">Send</a></li>
                                <li><a href="{{ url('/users/'.Auth::user()->id.'/orders/completed') }}">Completed</a></li>
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
                                        <span><strong>Date: </strong></span>{{ $order->created_at }}
                                        <br>
                                        <div class="pull-right"><small>status changed at: </small>{{ $order->updated_at }}</div>
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
                                            <strong><span class="glyphicon glyphicon-gift"></span>Discount for having account: </strong>${{ $order->user->discount }}
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
                                                        <td class="text-right"><strong>Give review</strong></td>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach($order->orderProducts as $orderProduct)
                                                            <tr>
                                                                <td>{{$orderProduct->product->name}}</td>
                                                                <td class="text-center">${{$orderProduct->product->price}}</td>
                                                                <td class="text-center">{{$orderProduct->quantity}}</td>
                                                                <td class="text-center">${{$orderProduct->priceForAllItems}}</td>

                                                                <td class="text-right">
                                                                    {{-- Give a review after you made an order --}}
                                                                    @if(!Auth::user()->reviews->contains('product_id', $orderProduct->product->id))
                                                                        <a class="give_review" href="{{ url('/products/'.$orderProduct->product->id) }}" style="margin-left: 20px">
                                                                            <span class="glyphicon glyphicon-comment"></span><b>Give a review</b>
                                                                        </a>
                                                                    @else
                                                                        {{--You have already gave a review--}}
                                                                        <span class="glyphicon glyphicon-ok"></span>Done
                                                                    @endif
                                                                </td>
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

        </div>
    </div>

    <script type="text/javascript">

        $(function () {

            $('.orders').on('click', function (e) {
                e.preventDefault();

                var order_id = $(this).attr('id');
                var id = order_id.split('_')[1];

                $('#order_details_' + id).slideDown();
            });

            $('.give_review').on('click', function () {

                localStorage.setItem('animate', 'animate');
            })
        })

    </script>

@endsection