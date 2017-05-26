@extends('layouts.app_without_footer')

@section('content')

    <div class="container container-fix">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel_without_border panel-default">
                    <div class="panel-heading panel-heading-fix text-center">
                        <h2 style="margin-top: 0"><span class="glyphicon glyphicon-pencil"></span>Checkout:</h2>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <td><strong>Product</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                                </thead>

                                <tbody>
                                @if(Session::has('cart'))
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product['product']['name']}}</td>
                                            <td class="text-center">${{$product['priceForOneItem']}}</td>
                                            <td class="text-center">{{$product['quantity']}}</td>
                                            <td class="text-right">${{$product['priceForAllItems']}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">
                                        <b><span id="money" style="color: #720d18">${{number_format($totalPrice, 2, '.', '')}}</span></b>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-5">
                            <b>
                                <a href="{{ url('/cart') }}" class="nice_links">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                    Back to shopping cart
                                </a>
                            </b>
                        </div>

                    </div>
                </div>

                @if(count($products) > 0)
                    <hr>
                    <div class="col-md-5">
                        <b>
                            <a href="{{ url('/placeAnOrder') }}" class="nice_links">
                                <span class="glyphicon glyphicon-check"></span>
                                Choose delivery method and payment
                            </a>
                        </b>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection