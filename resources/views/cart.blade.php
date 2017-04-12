@extends('layouts.app')

@section('content')
    <div class="container container-fix">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2 style="margin-top: 0">Your items in cart:</h2>
                    </div>

                    <div class="panel-body">

                        Zero items in cart
                        @if($items->isEmpty())
                            Your cart is empty. Add some products to cart to make it not empty :)
                        @else
                            <div class="list-group">

                                @foreach($items as $item)

                                    <div class="list-group-item">

                                        {{$item->product->image}}
                                        {{$item->product->name}}
                                        {{$item->product->description}}
                                        {{$item->product->price}}

                                    </div>

                                @endforeach

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection