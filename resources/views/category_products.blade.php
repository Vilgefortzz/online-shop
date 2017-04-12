@extends('layouts.app')

@section('content')
    <div class="container">
        <br><br><br>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default text-center">
                    <div class="panel-heading h1 text-center">All products in category: <span style="color: #5e5e5e">{{$category->name}}</span> </div>

                    <div class="panel-body">
                        <div class="list-group">

                            @foreach($products as $product)

                                    <h2>
                                        {{$product->name}}
                                    </h2>

                                    <img src="/images/swords/{{$product->image}}" style="width: 20%">

                                    <br><br>
                                    <h4>Description: </h4>
                                    {{$product->description}}

                                    <h4>Price: </h4>
                                    <div style="color: darkred">{{$product->price}}$</div>

                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection