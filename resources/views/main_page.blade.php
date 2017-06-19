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
        <hr>

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
                    <li id="sub_link_{{$subcategory->id}}" class="sub_cat_li"><a href="{{ url('/subcategories/'.$subcategory->id.'/products') }}"><b>{{$subcategory->name}}</b></a></li>
                @endforeach
            </ul>
        @endforeach

        {{--Horizontal line--}}
        <hr>

        {{--Deals, promotions etc.--}}
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <h3><span class="glyphicon glyphicon-globe"></span>The best fighting and defending equipment in the world</h3>
                </div>
                <div class="item">
                    <h3><span class="glyphicon glyphicon-user"></span>First choice of professionals as also beginners</h3>
                </div>
                <div class="item">
                    <h3><span class="glyphicon glyphicon-usd"></span>The best prices and discounts</h3>
                </div>
                <div class="item">
                    <h3><span class="glyphicon glyphicon-gift"></span>$20 discount for all users who have an account to use when ordering</h3>
                </div>
            </div>
        </div>

        {{--Horizontal line--}}
        <hr>

        <div id="recommended_products_section">
            <!-- Recommended products slider-->
            <div class="row" style="margin-top: 30px; margin-bottom: 30px">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                        <div class="carousel-inner">

                            @foreach($recommendedProducts as $recommendedProduct)
                                @if($recommendedProducts->first() == $recommendedProduct)
                                    <div class="item active">
                                        <div class="col-xs-12 col-sm-6 col-md-2">
                                            <a href="{{ url('/products/'.$recommendedProduct->id) }}"><img src="{{$recommendedProduct->path_to_thumbnail}}" class="img-responsive center-block"></a>
                                            <h4 class="text-center">{{$recommendedProduct->name}}</h4>
                                            <h5 class="text-center" style="color: darkred">${{$recommendedProduct->price}}</h5>
                                        </div>
                                    </div>
                                @else
                                    <div class="item">
                                        <div class="col-xs-12 col-sm-6 col-md-2">
                                            <a href="{{ url('/products/'.$recommendedProduct->id) }}"><img src="{{$recommendedProduct->path_to_thumbnail}}" class="img-responsive center-block"></a>
                                            <h4 class="text-center">{{$recommendedProduct->name}}</h4>
                                            <h5 class="text-center" style="color: darkred">${{$recommendedProduct->price}}</h5>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div id="slider-control">
                            <a class="left carousel-control" href="#itemslider" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            <a class="right carousel-control" href="#itemslider" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>

            {{--Horizontal line--}}
            <hr>
        </div>
    </div>

    {{-- AJAX scripts--}}

    <script src="{{ asset('js/add_to_cart_ajax.js') }}"></script>
    <script src="{{ asset('js/delete_from_cart_view_products_ajax.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function(){

            localStorage.clear();

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

            $('.sub_cat_li').on('click', function () {

                var id = $(this).attr('id');
                localStorage.setItem('active_link', id);
            });

            $('#itemslider').carousel({ interval: 3000 });

            $('.carousel-showmanymoveone .item').each(function(){
                var itemToClone = $(this);

                for (var i=1;i<6;i++) {
                    itemToClone = itemToClone.next();

                    if (!itemToClone.length) {
                        itemToClone = $(this).siblings(':first');
                    }

                    itemToClone.children(':first-child').clone()
                        .addClass("cloneditem-"+(i))
                        .appendTo($(this));
                }
            });
        });

    </script>

@endsection