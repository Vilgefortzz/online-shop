{{-- Pagination links --}}
{{ $products->links() }}

<div id="load" style="position: relative;">
    @foreach($products as $product)

        <div class="item col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="/images/{{$product->image}}" width="200" height="200"/>
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
