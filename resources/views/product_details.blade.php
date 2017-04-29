@extends('layouts.app')

@section('content')

    <div class="container container-fix">
        <div class="row">
            <div class="col-md-10 col-lg-offset-1">

                <div class="panel panel_without_border panel-default">
                    <div class="panel-heading">
                        <img src="{{$product->image}}" width="80" height="80" style="float: left">
                        <h1 style="margin-left: 90px"><b>{{$product->name}}</b></h1>
                    </div>

                    <div class="panel-body">

                        <h5><b>Description:</b></h5>

                        <div class="row">
                            <div class="col-md-6">
                                {{$product->description}}
                            </div>

                            <div class="col-md-4 group_div">
                                <p><b>Buy now:</b></p>
                                <p class="lead_sub"><b>{{$product->price}}$</b></p>
                            </div>
                            <div class="col-md-6 group_div">
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
                                    <a id="give_review_this_page" class="give_review" href="javascript:undefined">
                                        <div id="give_review_btn">
                                            <span class="glyphicon glyphicon-comment"></span><b>Give a review</b>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-offset-6">
                                <div class="col-md-2 text-center">
                                    <b>Product availability</b>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100000" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                {{-- Reviews section --}}

                {{--Header!!--}}
                <h1 class="text-center" style="margin-bottom: 50px"><span class="glyphicon glyphicon-comment"></span><b>Reviews</b></h1>

                <div id="reviews">
                    {{--Autheniticated users can give reviews--}}
                    @if(Auth::check())
                        @if(!$isGiven)
                            <div id="write_review">
                                <form role="form" method="POST" action="{{ url('/products/'.$product->id.'/reviews/add')}}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('review') ? ' has-error' : '' }}" style="margin-bottom: 0">
                                        <label for="review_text_area"><span class="glyphicon glyphicon-pencil"></span>Write your review below:</label>
                                        <br>
                                        <textarea id="review_text_area" name="review" class="textarea_review" placeholder="Write here!!" required></textarea>
                                        @if ($errors->has('review'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('review') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <button class="btn btn-info" type="submit">Post</button>
                                </form>
                            </div>
                        @else
                            <div id="review_given">
                                <span class="glyphicon glyphicon-ok-sign"></span>You have already given a review to this product.
                            </div>
                        @endif
                    @endif

                    <div class="vertical-space"></div>

                    <hr>

                    {{-- All reviews connected with this product--}}

                    @foreach($reviews as $review)
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="thumbnail thumbnail-user">
                                    <i>{{$review->user->name}}</i>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="panel panel-review panel-default">
                                    <div class="panel-heading panel-heading-review">
                                        <span class="glyphicon glyphicon-time"></span><span class="text-muted"><u><b>{{$review->created_at->toDateString()}}</b></u></span>
                                    </div>
                                    <div class="panel-body">
                                        {{$review->review}}
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

@endsection