<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Session;

class ShopController extends Controller
{
    public function showCheckout(){

        if (!Session::has('cart')){
            return back();
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('orders.checkout', ['products' => $cart->products, 'totalPrice' => $cart->totalPrice]);
    }
}
