@extends('layouts.app_without_footer')

@section('content')

    <div class="container container-fix">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel_without_border panel-default">
                    <div class="panel-heading panel-heading-fix">
                        <img src="{{$product->path_to_thumbnail}}" width="80" height="80" style="float: left">
                        <h1 style="margin-left: 90px"><b>{{$product->name}}</b></h1>

                        {{-- Rating - stars --}}
                            <input id="rating_star_1" name="rating_star_show_1"
                                   value="{{$product->average_rating}}" class="rating-star-show rating-loading" data-size="sm">

                    </div>

                    <div class="panel-body">
                        <div class="panel panel_without_border with-nav-tabs panel-default">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#info" data-toggle="tab">Info</a></li>
                                    <li><a href="#gallery" data-toggle="tab">Gallery</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    {{-- Info content --}}
                                    <div class="tab-pane fade in active" id="info">

                                        <h5><b>Description:</b></h5>

                                        <div class="row">
                                            <div class="col-md-6">
                                                {{$product->description}}
                                            </div>

                                            <div class="col-md-4 group_div">
                                                <p><b>Buy now:</b></p>
                                                <p class="lead_sub"><b>${{$product->price}}</b></p>
                                            </div>
                                            <div class="col-md-6 group_div">
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

                                                <br>
                                                <a id="see_reviews_this_page" class="give_review" href="javascript:undefined">
                                                    <span class="glyphicon glyphicon-comment"></span><b>See reviews</b>
                                                </a>
                                            </div>

                                            {{-- Product availability--}}
                                            <div class="text-center">
                                                <b>Product availability</b>
                                                <div class="progress">
                                                    @if($product->quantity <= 5)
                                                        <div class="progress-bar progress-bar-danger"
                                                             role="progressbar" data-toggle="tooltip" data-placement="bottom"
                                                             title="Available: {{$product->quantity}} pcs of product" style="width: {{$product->quantity}}%"></div>
                                                    @elseif($product->quantity > 5 && $product->quantity <= 30)
                                                        <div class="progress-bar progress-bar-warning"
                                                             role="progressbar" data-toggle="tooltip" data-placement="bottom"
                                                             title="Available: {{$product->quantity}} pcs of product" style="width: {{$product->quantity}}%"></div>
                                                    @elseif($product->quantity > 30)
                                                        <div class="progress-bar progress-bar-success"
                                                             role="progressbar" data-toggle="tooltip" data-placement="bottom"
                                                             title="Available: {{$product->quantity}} pcs of product" style="width: {{$product->quantity}}%"></div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Gallery of images content --}}
                                    <div class="tab-pane fade" id="gallery">
                                        <div class="sp-wrap text-center">
                                            @foreach($images as $image)
                                                <a href="{{$image->path_to_image}}"><img src="{{$image->path_to_thumbnail}}" alt=""></a>
                                            @endforeach
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

                <div id="reviews_section">
                    {{--Autheniticated users can give reviews--}}
                    @if(Auth::check())
                        @if($isOrdered)
                            @if(!$isGiven)
                                <div id="write_review">
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="thumbnail">
                                                <b><i>You</i></b>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="panel panel-review panel-default">
                                                <div class="panel-heading panel-heading-fix panel-heading-review">
                                                    <label for="review_text_area"><span class="glyphicon glyphicon-pencil"></span>Write your review below</label>
                                                    <br>
                                                    <u><b class="info">Please write truth to help others make a good purchase</b></u>
                                                </div>
                                                <div class="panel-body">
                                                    <form role="form" method="POST" action="{{ url('/products/'.$product->id.'/reviews/add')}}">
                                                        {{ csrf_field() }}

                                                        <div class="form-group{{ $errors->has('review') ? ' has-error' : '' }}" style="margin-bottom: 0">
                                                            <br>
                                                            <textarea id="review_text_area" name="review" class="textarea_review" placeholder="Write here!!" required></textarea>
                                                            @if ($errors->has('review'))
                                                                <span class="help-block">
                                                                <strong>{{ $errors->first('review') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label for="input_rating_star" class="control-label">Rate this product</label>
                                                            <input id="input_rating_star" name="stars"
                                                                   class="rating-star-give rating-loading"
                                                                   value="2.5" data-min="0" data-max="5" data-step="0.1" data-size="xs">
                                                        </div>
                                                        <button class="btn btn-info" type="submit">Post</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div id="review_given">
                                    <span class="glyphicon glyphicon-ok-sign"></span>You have already given a review to this product.
                                </div>
                            @endif
                        @else
                            <div>
                                <span class="glyphicon glyphicon-info-sign"></span>You cannot give reviews to this product without buying it
                            </div>
                        @endif
                    @endif

                    <div class="vertical-space"></div>

                    <hr>

                    <div id="reviews">

                        {{--All reviews connected with this product--}}
                        @include('reviews.reviews_list')

                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- AJAX Scripts--}}

    <script src="{{ asset('js/add_to_cart_ajax.js') }}"></script>
    <script src="{{ asset('js/delete_from_cart_view_products_ajax.js') }}"></script>

    {{-- jscroll --}}
    <script src="{{ asset('js/jscroll/jquery.jscroll.min.js') }}"></script>

    {{-- smoothproducts in gallery --}}
    <script src="{{ asset('js/smoothproducts/smoothproducts.min.js') }}"></script>

    {{-- star rating --}}
    <script src="{{ asset('js/star-rating/star-rating.min.js') }}"></script>

    <script type="text/javascript">

        $('ul.pagination').hide();

        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function () {
                $('ul.pagination').remove();
            }
        });

        $('.sp-wrap').smoothproducts();

        $(document).ready(function () {

            /**
             * Focus effects on review text area
             */
            var orig_height = $('#review_text_area').height();
            var new_height = 150;

            $('#review_text_area').on('focus', function(){

                $(this).animate({height: new_height + 'px'});
            });

            $('#review_text_area').on('blur', function(){

                $(this).animate({height: orig_height + 'px'});
            });

            /**
             * Animate from this page to reviews section
             */
            $('#see_reviews_this_page').on('click', function() {

                $('html, body').animate({
                    scrollTop: $('#reviews').offset().top - 170
                }, 800);
            });

            /**
             * Animate from another page
             */
            if (localStorage.getItem('animate') !== null){

                if($('#write_review').length != 0) {
                    $('html, body').animate({
                        scrollTop: $('#write_review').offset().top - 170
                    }, 1200);

                    $('#review_text_area').focus();
                }
                else{
                    $('html, body').animate({
                        scrollTop: $('#review_given').offset().top - 170
                    }, 1200);
                }

                localStorage.clear();
            }
        });

        // Ratings stuff
        $('.rating-star-show').rating({
            displayOnly: true,
            step: 0.1
        });

        $('.rating-star-give').rating({
            hoverOnClear: false,
            containerClass: 'is-star'
        });

    </script>

@endsection