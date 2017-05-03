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

                            <ul id="main_list" class="list-group">

                                @if(count($products) == 0)
                                    <h3 class="text-center">Your cart is empty :(</h3>

                                @elseif(count($products) == 1)

                                    <li id="cart_product_{{array_first($products)['id']}}" class="list-group-item clearfix">
                                        <div id="product{{array_first($products)['id']}}_quantity">

                                            <img src="{{array_first($products)['product']['image']}}" width="50" height="50">
                                            <b>{{array_first($products)['product']['name']}}</b>

                                            {{-- Change items number --}}
                                            <div class="input-group pull-right" style="width: 150px;">

                                                <span class="input-group-btn">
                                                    <button id="minus_{{array_first($products)['id']}}" type="button" class="btn btn-default delete-item set-quantity" disabled="disabled" data-type="minus" style="width: 38px">
                                                        <span class="glyphicon glyphicon-minus"></span>
                                                    </button>
                                                </span>

                                                <input id="input_{{array_first($products)['id']}}" type="text"
                                                       href="{{ url('/cart/products/'.array_first($products)['id'].'/quantity')}}"
                                                       class="text-center form-control input-number"
                                                       value="{{array_first($products)['quantity']}}" min="1" max="{{array_first($products)['onStock']}}">

                                                <span class="input-group-btn">
                                                    <button id="plus_{{array_first($products)['id']}}" type="button" class="btn btn-default add-item set-quantity" data-type="plus" style="width: 38px">
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>

                                        <div id="product{{array_first($products)['id']}}_price" class="pull-right">

                                            <b>Price: {{array_first($products)['priceForOneItem']}}$</b>x
                                            <b id="quantity_product_{{array_first($products)['id']}}">{{array_first($products)['quantity']}}</b>=
                                            <b id="price_product_all_{{array_first($products)['id']}}">{{array_first($products)['priceForAllItems']}}$</b>
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

                                                {{-- Change items number --}}
                                                <div class="input-group pull-right" style="width: 150px;">

                                                    <span class="input-group-btn">
                                                         <button id="minus_{{$product['id']}}" type="button" class="btn btn-default delete-item set-quantity" disabled="disabled" data-type="minus" style="width: 38px">
                                                             <span class="glyphicon glyphicon-minus"></span>
                                                         </button>
                                                    </span>

                                                    <input id="input_{{$product['id']}}" type="text"
                                                           href="{{ url('/cart/products/'.$product['id'].'/quantity') }}"
                                                           class="text-center form-control input-number"
                                                           value="{{$product['quantity']}}" min="1" max="{{$product['onStock']}}">

                                                    <span class="input-group-btn">
                                                        <button id="plus_{{$product['id']}}" type="button" class="btn btn-default add-item set-quantity" data-type="plus" style="width: 38px">
                                                            <span class="glyphicon glyphicon-plus"></span>
                                                        </button>
                                                    </span>
                                                </div>

                                            </div>

                                            <div id="product{{$product['id']}}_price" class="pull-right">

                                                <b>Price: {{$product['priceForOneItem']}}$</b>x
                                                <b id="quantity_product_{{$product['id']}}">{{$product['quantity']}}</b>=
                                                <b id="price_product_all_{{$product['id']}}">{{$product['priceForAllItems']}}$</b>
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

                                <div class="col-md-3">
                                    <div class="text-center">
                                        <a href="{{ url('/cart/delete/products') }}" class="remove_all">
                                            <b><span class="glyphicon glyphicon-remove"></span>Empty cart</b>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-3 col-md-offset-6">
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
    <script src="{{ asset('js/delete_from_cart_all_products_ajax.js') }}"></script>
    <script src="{{ asset('js/change_quantity_ajax.js') }}"></script>

@endsection