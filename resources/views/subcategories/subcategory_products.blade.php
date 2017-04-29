@extends('layouts.app')

@section('content')
    <div class="container container-fix">
        <div class="well well-sm">
            <strong>Category: {{$category->name}} | Subcategory: {{$subcategory->name}}</strong>
            <div class="btn-group">
                <a id="list" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-th-list"></span>List
                </a>
                <a id="grid" class="btn btn-default btn-sm active">
                    <span class="glyphicon glyphicon-th"></span>Grid
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2">
                <div class="panel-group" id="accordion">
                    @foreach($categories as $category)
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$category->id}}">
                                    <span class="glyphicon glyphicon-menu-right"></span>{{$category->name}}
                                </a>
                            </h4>
                        </div>

                        <div id="collapse{{$category->id}}" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <table class="table">
                                    @foreach($category->subcategories as $subcategory)
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{ url('/subcategories/'.$subcategory->id.'/products') }}">{{$subcategory->name}}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

                <div class="col-sm-10 col-md-10">

                {{--List of products from subcategory--}}

                    <div id="products" class="row list-group">

                        @foreach($products as $product)

                            <div class="item col-xs-4 col-lg-4">
                                <div class="thumbnail">
                                    <img class="group list-group-image" src="{{$product->image}}" width="200" height="200"/>
                                    <div class="caption">
                                        <h2 class="group inner list-group-item-heading">
                                            <b>
                                                {{$product->name}}
                                                <a href="{{ url('/products/'.$product->id) }}" style="font-size: 12px">
                                                    <span class="glyphicon glyphicon-triangle-right"></span>See details
                                                </a>
                                            </b>
                                        </h2>

                                        <div class="row" style="margin-top: 50px">
                                            <div class="col-xs-12 col-md-4 group_div">
                                                <p><b>Buy now:</b></p>
                                                <p class="lead_sub"><b>{{$product->price}}$</b></p>
                                            </div>
                                            <div class="col-xs-12 col-md-6 group_div">
                                                <a id="add_{{$product->id}}" class="add_to_cart" href="{{ url('/cart/add/'.$product->id) }}">
                                                    <div id="add_to_cart_btn{{$product->id}}">
                                                        <span class="glyphicon glyphicon-shopping-cart"></span><b>Add to cart</b>
                                                    </div>
                                                </a>

                                                {{-- Hidden link - dynamically change--}}
                                                <a id="remove_{{$product->id}}" class="remove_from_cart" href="{{ url('/cart/delete/'.$product->id) }}" hidden>
                                                    <div id="remove_from_cart_btn{{$product->id}}">
                                                        <span class="glyphicon glyphicon-remove"></span><b>Remove</b>
                                                    </div>
                                                </a>

                                                {{--For autheniticated users--}}
                                                @if(Auth::check())
                                                    <a class="give_review" href="{{ url('/products/'.$product->id) }}">
                                                        <div id="give_review_btn">
                                                            <span class="glyphicon glyphicon-comment"></span><b>Give a review</b>
                                                        </div>
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
        </div>
    </div>

    {{-- AJAX Scripts--}}

    <script src="{{ asset('js/add_to_cart_ajax.js') }}"></script>
    <script src="{{ asset('js/delete_from_cart_view_products_ajax.js') }}"></script>

    {{-- Change view (grid, list)--}}
    <script src="{{ asset('js/change_view.js') }}"></script>

@endsection