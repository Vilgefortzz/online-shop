@extends('layouts.app_without_footer')

@section('content')
    <div class="container container-fix">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel_without_border panel-default">
                    <div class="panel-heading panel-heading-fix text-center">
                        <h2 style="margin-top: 0"><span class="glyphicon glyphicon-shopping-cart"></span>Products in cart:</h2>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('cart'))
                            <ul id="main_list" class="list-group">
                                @foreach($products as $product)
                                    <li id="cart_product_{{$product['id']}}" class="list-group-item clearfix">
                                        <div id="product{{$product['id']}}_quantity">

                                            <img src="{{$product['product']['path_to_thumbnail']}}" width="50" height="50">

                                            <b>{{$product['product']['name']}}</b>

                                            {{-- Change items number --}}
                                            <div class="input-group pull-right" style="width: 150px;">

                                                @if($product['quantity'] == 1)
                                                    <span class="input-group-btn">
                                                         <button id="minus_{{$product['id']}}" type="button" class="btn btn-default delete-item set-quantity" disabled="disabled" data-type="minus" style="width: 38px">
                                                             <span class="glyphicon glyphicon-minus"></span>
                                                         </button>
                                                        </span>
                                                @else
                                                    <span class="input-group-btn">
                                                         <button id="minus_{{$product['id']}}" type="button" class="btn btn-default delete-item set-quantity" data-type="minus" style="width: 38px">
                                                             <span class="glyphicon glyphicon-minus"></span>
                                                         </button>
                                                        </span>
                                                @endif

                                                <input id="input_{{$product['id']}}" type="text"
                                                       href="{{ url('/cart/products/'.$product['id'].'/quantity') }}"
                                                       class="text-center form-control input-number"
                                                       value="{{$product['quantity']}}" min="1" max="{{$product['onStock']}}">

                                                @if($product['quantity'] == $product['onStock'])
                                                    <span class="input-group-btn">
                                                                <button id="plus_{{$product['id']}}" type="button" class="btn btn-default add-item set-quantity" disabled="disabled" data-type="plus" style="width: 38px">
                                                                    <span class="glyphicon glyphicon-plus"></span>
                                                                </button>
                                                            </span>
                                                @else
                                                    <span class="input-group-btn">
                                                                <button id="plus_{{$product['id']}}" type="button" class="btn btn-default add-item set-quantity" data-type="plus" style="width: 38px">
                                                                    <span class="glyphicon glyphicon-plus"></span>
                                                                </button>
                                                            </span>
                                                @endif
                                            </div>

                                        </div>

                                        <div id="product{{$product['id']}}_price" class="pull-right">

                                            <b>Price: {{$product['priceForOneItem']}}$</b> x
                                            <b id="quantity_product_{{$product['id']}}">{{$product['quantity']}}</b> =
                                            <b id="price_product_all_{{$product['id']}}">${{$product['priceForAllItems']}}</b>
                                            <span class="btn-separator-products"></span>
                                            <a id="remove_{{$product['id']}}" class="remove_from_cart trash-remove" href="{{ url('/cart/delete/'.$product['id']) }}" data-toggle="tooltip" data-placement="top" title="Remove from cart">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </div>

                                    </li>
                                @endforeach
                            </ul>

                            <hr>
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="text-center">
                                        <b>
                                            <a href="{{ url('/cart/delete/products') }}" class="remove_all">
                                                <span class="glyphicon glyphicon-remove"></span>Empty cart
                                            </a>
                                        </b>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="text-center">
                                        <b>
                                            <a href="/" class="nice_links">
                                                Continue shopping
                                            </a>
                                        </b>
                                    </div>
                                </div>

                                <div class="col-md-3 col-md-offset-4">
                                    <div class="text-center">Total price: <span id="money" style="color: darkred">${{number_format($totalPrice, 2, '.', '')}}</span></div>
                                </div>
                            </div>

                            @if(count($products) > 0)

                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="text-center">
                                            <b>
                                                <a href="{{ url('/checkout') }}" class="btn btn-default">
                                                    <span class="glyphicon glyphicon-ok"></span>Go to checkout panel
                                                </a>
                                            </b>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        @else
                            <h3 class="text-center">Your cart is empty :(</h3>
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