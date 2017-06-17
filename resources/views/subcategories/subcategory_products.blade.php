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

                {{--Products filtration--}}

                <div class="well well-sm">
                    <div class="text-center">
                        <strong>Sort by price: </strong>
                        <br>
                        <div class="btn-group">
                            <a href="{{ url('/subcategories/'.$subcategory->id.'/products/prices/ascending') }}" id="ascending" class="btn btn-default btn-sm sorting">
                                <span class="glyphicon glyphicon-sort-by-attributes"></span>Asc
                            </a>
                            <a href="{{ url('/subcategories/'.$subcategory->id.'/products/prices/descending')}}" id="descending" class="btn btn-default btn-sm sorting">
                                <span class="glyphicon glyphicon-sort-by-attributes-alt"></span>Desc
                            </a>
                        </div>
                    </div>
                </div>

                <div class="panel-group" id="accordion">
                    @foreach($categories as $category)
                        <div class="panel well well-sm">
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
                                            <tr id="sub_link_{{$subcategory->id}}" class="subcategory_links">
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
    <script src="{{ asset('js/pagination_products_ajax.js') }}"></script>

    {{-- Change view (grid, list)--}}
    <script src="{{ asset('js/change_view.js') }}"></script>

    {{-- star rating --}}
    <script src="{{ asset('js/star-rating/star-rating.min.js') }}"></script>

    <script type="text/javascript">

        $(function () {

            $('.subcategory_links').on('click', function () {

                var id = $(this).attr('id');
                console.log("Dupa tam : " + id);

                localStorage.setItem('active_link', id);
                localStorage.removeItem('sort_id');
            });

            $('.sorting').on('click', function () {

                var id = $(this).attr('id');

                localStorage.setItem('sort_id', id);
            });

            if (localStorage.getItem('sort_id') !== null){

                $('#' + localStorage.getItem('sort_id')).addClass('active');
            }

            if (localStorage.getItem('active_link') !== null){

                $('#' + localStorage.getItem('active_link')).css('backgroundColor', '#b4b37a');
            }
        });

    </script>

@endsection