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

                            @if(count($products) == 0)
                                <h3 class="text-center">Your cart is empty :(</h3>

                            @elseif(count($products) == 1)
                                <ul class="list-group">
                                    <li id="cart_product_{{array_first($products)['id']}}" class="list-group-item clearfix">
                                        <div id="product{{array_first($products)['id']}}_quantity">

                                            <img src="{{array_first($products)['product']['image']}}" width="50" height="50">
                                            <b>{{array_first($products)['product']['name']}}</b>

                                        </div>

                                        <div id="product{{array_first($products)['id']}}_price" class="pull-right">
                                            <b>Price: {{array_first($products)['price']}}$</b>
                                            <span class="btn-separator-products"></span>
                                            <a id="remove_{{array_first($products)['id']}}" class="remove_from_cart trash-remove" href="{{ url('/cart/delete/'.array_first($products)['id']) }}" data-toggle="tooltip" data-placement="top" title="Remove from cart">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </div>
                                    </li>
                                @else

                                    @foreach($products as $product)
                                        <li id="cart_product_{{$product['id']}}" class="list-group-item clearfix">
                                            <div id="product{{$product['id']}}_quantity">

                                                <img src="{{$product['product']['image']}}" width="50" height="50">

                                                <b>{{$product['product']['name']}}</b>

                                            </div>

                                            <div id="product{{$product['id']}}_price" class="pull-right">
                                                <b>Price: {{$product['price']}}$</b>
                                                <span class="btn-separator-products"></span>
                                                <a id="remove_{{$product['id']}}" class="remove_from_cart trash-remove" href="{{ url('/cart/delete/'.$product['id']) }}" data-toggle="tooltip" data-placement="top" title="Remove from cart">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            </div>

                                        </li>
                                    @endforeach

                                @endif

                            </ul>

                            <hr>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-9">
                                    <div class="text-center">Total price: <span id="money" style="color: darkred">{{number_format($totalPrice, 2, '.', '')}}$</span></div>
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

    {{-- AJAX Script--}}

    <script src="{{ asset('js/delete_from_cart_view_in_cart_ajax.js') }}"></script>

@endsection