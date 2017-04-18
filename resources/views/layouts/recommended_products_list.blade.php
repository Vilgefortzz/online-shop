<div class="container">
    {{--Horizontal line--}}
    <div class="horizontal_line"></div>

    {{--Header!!--}}
    <h1 class="text-center bigger_header" style="margin-bottom: 50px"><span class="glyphicon glyphicon-thumbs-up"></span><b>Recommended products</b></h1>

    <div id="products" class="row list-group">

        @foreach($recommendedProducts as $recommendedProduct)

            <div class="item col-xs-4 col-lg-4">
                <div class="thumbnail">
                    <img class="group list-group-image" src="/images/{{$recommendedProduct->image}}" width="200" height="200"/>
                    <div class="caption">
                        <h2 class="group inner list-group-item-heading">
                            <b>
                                {{$recommendedProduct->name}}
                                <a href="#" style="font-size: 18px">
                                    <span class="glyphicon glyphicon-triangle-right"></span>See details
                                </a>
                            </b>
                        </h2>

                        <div class="row" style="margin-top: 50px">
                            <div class="col-xs-12 col-md-4">
                                <p><b>Buy now:</b></p>
                                <p class="lead"><b>${{$recommendedProduct->price}}</b></p>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <a class="btn btn-success" href="#">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>Add to cart
                                </a>
                                {{--For autheniticated users--}}
                                @if(Auth::check())
                                    <a class="btn btn-warning" href="#" style="margin-top: 3px">
                                        <span class="glyphicon glyphicon-comment"></span>Give a review
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