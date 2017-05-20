@extends('layouts.app')

@section('content')
    <div class="container text-center">
        {{--Welcome image - logo, idea of shop etc.--}}
        <div class="jumbotron">
            <h1><img src="/images/icons/brand_logo.png" width="90" height="90">{{config('app.name')}}</h1>
            <div class="small">
                <ul class="list-unstyled">
                    <li>
                        Own way, own path to create and provide you the best equipment
                    </li>
                    <li>
                        The best prices and quality confirmed by our satisfied customers
                    </li>
                </ul>
            </div>
        </div>

        {{--Horizontal line--}}
        <div class="horizontal_line"></div>

        {{--Categories bar menu--}}
        <ul class="horizontal_menu">
            @foreach($categories as $category)
                <li id="cat_{{$category->id}}" class="dropdown_cat">
                    <a href="#"><h2><img src="{{$category->path_to_image}}" width="100" height="100"><b>{{$category->name}}</b></h2></a>
                </li>
            @endforeach
        </ul>

        @foreach($categories as $category)
            <ul id="sub_cat_{{$category->id}}" class="sub_cat_menu" hidden>
                @foreach($category->subcategories as $subcategory)
                    <li id="sub_link_{{$subcategory->id}}"><a href="{{ url('/subcategories/'.$subcategory->id.'/products') }}"><b>{{$subcategory->name}}</b></a></li>
                @endforeach
            </ul>
        @endforeach

        {{--Horizontal line--}}
        <div class="horizontal_line"></div>

    </div>

    {{--Deals, promotions etc.--}}
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1" class="active"></li>
            <li data-target="#carousel" data-slide-to="2" class="active"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="/images/sales_promotions_deals/deal_1.png">
            </div>
            <div class="item">
                <img src="/images/sales_promotions_deals/deal_2.png">
            </div>
            <div class="item">
                <img src="/images/sales_promotions_deals/promotion_1.png">
            </div>
        </div>
    </div>

    {{--List of all recommended products--}}
    <div class="container">
        {{--Horizontal line--}}
        <div class="horizontal_line"></div>

        {{--Header!!--}}
        <h1 class="text-center bigger_header" style="margin-bottom: 50px"><span class="glyphicon glyphicon-thumbs-up"></span><b>Recommended products</b></h1>

        <div id="products" class="row list-group">

            @foreach($recommendedProducts as $recommendedProduct)

                <div class="item col-xs-4 col-lg-4">
                    <div class="thumbnail">
                        <img class="group list-group-image" src="{{$recommendedProduct->path_to_image}}" width="200" height="200"/>
                        <div class="caption">
                            <h2 class="group inner list-group-item-heading">
                                <b>
                                    {{$recommendedProduct->name}}
                                    <a href="{{ url('/products/'.$recommendedProduct->id) }}" style="font-size: 18px">
                                        <span class="glyphicon glyphicon-triangle-right"></span>See details
                                    </a>
                                </b>
                            </h2>

                            <div class="row" style="margin-top: 50px">
                                <div class="col-xs-12 col-md-4">
                                    <p><b>Buy now:</b></p>
                                    <p class="lead_main"><b>${{$recommendedProduct->price}}</b></p>
                                </div>
                                <div class="col-xs-12 col-md-7">
                                    @if(Session::has('cart'))

                                        @if(!array_key_exists($product->id, Session::get('cart')->products))

                                            <a id="add_{{$product->id}}" class="add_to_cart" href="{{ url('/cart/add/'.$product->id) }}">
                                                <span class="glyphicon glyphicon-shopping-cart"></span><b>Add to cart</b>
                                            </a>

                                            <a id="remove_{{$product->id}}" class="remove_from_cart" href="{{ url('/cart/delete/'.$product->id) }}" hidden>
                                                <span class="glyphicon glyphicon-remove"></span><b>Remove</b>
                                            </a>

                                        @else

                                            <a id="add_{{$product->id}}" class="add_to_cart" href="{{ url('/cart/add/'.$product->id) }}" hidden>
                                                <span class="glyphicon glyphicon-shopping-cart"></span><b>Add to cart</b>
                                            </a>

                                            <a id="remove_{{$product->id}}" class="remove_from_cart" href="{{ url('/cart/delete/'.$product->id) }}">
                                                <span class="glyphicon glyphicon-remove"></span><b>Remove</b>
                                            </a>

                                        @endif

                                    @else

                                        <a id="add_{{$product->id}}" class="add_to_cart" href="{{ url('/cart/add/'.$product->id) }}">
                                            <span class="glyphicon glyphicon-shopping-cart"></span><b>Add to cart</b>
                                        </a>

                                        <a id="remove_{{$product->id}}" class="remove_from_cart" href="{{ url('/cart/delete/'.$product->id) }}" hidden>
                                            <span class="glyphicon glyphicon-remove"></span><b>Remove</b>
                                        </a>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- AJAX scripts--}}

    <script src="{{ asset('js/add_to_cart_ajax.js') }}"></script>
    <script src="{{ asset('js/delete_from_cart_view_products_ajax.js') }}"></script>

    <script type="text/javascript">

        /**
         * Subcategory menu from main page
         */

        $('.dropdown_cat').on('click', function (e) {
            e.preventDefault();

            var cat_id = $(this).attr('id');
            var id = cat_id.split('_')[1];

            $('.sub_cat_menu').hide();

            $('#sub_cat_' + id).fadeIn();
        });

        $('.sub_cat_menu').on('click', function () {

            var id = $(this).find('li').attr('id');
            localStorage.setItem('active_link', id);
        });

    </script>

@endsection