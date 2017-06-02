@extends('admin.layouts.app')

@section('content')

    <div class="col-md-10 content">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td class="text-center"><strong>Id</strong></td>
                    <td class="text-center"><strong>Subcategory</strong></td>
                    <td class="text-center"><strong>Name</strong></td>
                    <td class="text-center"><strong>Thumbnail image</strong></td>
                    <td class="text-center"><strong>Description</strong></td>
                    <td class="text-center"><strong>Price</strong></td>
                    <td class="text-center"><strong>Quantity</strong></td>
                </tr>
                </thead>

                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="text-center">{{$product->id}}</td>
                        <td class="text-center">{{$product->subcategory->name}}</td>
                        <td class="text-center">{{$product->name}}</td>
                        <td class="text-center"><img src="{{$product->path_to_thumbnail}}" width="50" height="50"></td>
                        <td class="text-center">{{$product->description}}</td>
                        <td class="text-center">${{$product->price}}</td>
                        <td class="text-center">{{$product->quantity}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{$products->links()}}
    </div>

    <script type="text/javascript">

        $(function () {
            $('.navbar-toggle-sidebar').click(function () {
                $('.navbar-nav').toggleClass('slide-in');
                $('.side-body').toggleClass('body-slide-in');
            });
        });

    </script>

@endsection