@extends('layouts.app')

@section('content')
    <div class="container container-fix">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        All products in subcategory: {{$subcategory->name}}
                    </div>

                    <div class="panel-body">
                        <div class="list-group">

                            @foreach($products as $product)

                                    <h2>
                                        {{$product->name}}
                                    </h2>

                                    <img src="/images/{{$product->image}}">

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