@extends('layouts.app')

@section('content')
    <div class="container container-fix">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel_without_border panel-default">
                    <div class="panel-heading text-center">
                        <h2 style="margin-top: 0"><span class="glyphicon glyphicon-shopping-cart"></span>Products in cart:</h2>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('cart'))
                            <ul class="list-group">
                                @if(count($products) == 1)
                                    <li class="list-group-item">
                                        <div id="product{{array_first($products)['id']}}_quantity">

                                            <img src="images/{{array_first($products)['product']['image']}}" width="50" height="50">
                                            <b>{{array_first($products)['product']['name']}}</b>

                                            <span id="product{{array_first($products)['id']}}_price" class="pull-right">
                                                    <b>Price: {{array_first($products)['product']['price']}}$</b>
                                                </span>
                                        </div>
                                    </li>

                                @elseif(count($products) == 0)
                                    <h3 class="text-center">Your cart is empty :(</h3>
                                @else

                                    @foreach($products as $product)
                                        <li class="list-group-item">
                                            <div id="product{{$product['id']}}_quantity">

                                                <img src="{{$product['product']['image']}}" width="50" height="50">

                                                <b>{{$product['product']['name']}}</b>

                                                <span id="product{{$product['id']}}_price" class="pull-right">
                                                    <b>Price: {{$product['price']}}$</b>
                                                </span>
                                            </div>
                                        </li>
                                    @endforeach

                                @endif

                            </ul>

                            <hr>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-9">
                                    <div class="text-center">Total price: <span style="color: darkred">{{$totalPrice}}</span> $</div>
                                </div>
                            </div>

                        @else
                            <h3 class="text-center" style="border-radius: 80px">Your cart is empty :(</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection