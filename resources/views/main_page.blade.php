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
                <li class="dropdown">
                    <a data-toggle="dropdown" href="#"><h3><b>{{$category->name}}</b></h3></a>
                    <ul class="dropdown-menu expose">
                        @foreach($category->subcategories as $subcategory)
                            <li><a href="#"><b>{{$subcategory->name}}</b></a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>

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
    @include('layouts.recommended_products_list')

    <div id="overlay"></div>

@endsection