{{-- Pagination links --}}
{{ $products->links() }}

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

                        {{--For autheniticated users--}}
                        @if(Auth::check())
                            <br>
                            <a class="give_review" href="{{ url('/products/'.$product->id) }}">
                                <span class="glyphicon glyphicon-comment"></span><b>Give a review</b>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
