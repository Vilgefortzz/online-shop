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
                    <div id="products" class="row list-group">

                        {{--List of products from subcategory--}}
                        @include('products.products_list')

                    </div>
                </div>
        </div>
    </div>

    {{-- AJAX Scripts --}}

    <script src="{{ asset('js/add_to_cart_ajax.js') }}"></script>
    <script src="{{ asset('js/delete_from_cart_view_products_ajax.js') }}"></script>
    <script src="{{ asset('js/pagination_ajax.js') }}"></script>

    {{-- Change view (grid, list)--}}
    <script src="{{ asset('js/change_view.js') }}"></script>

@endsection