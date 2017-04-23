<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use App\Product;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{

    public function showProducts() {

        if (!Session::has('cart')){
            return view('cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart', ['products' => $cart->products, 'totalPrice' => $cart->totalPrice, 'totalQuantity' => $cart->totalQuantity]);

    }

    /*
     * AJAX request
     */
    public function addProduct(Product $product, Request $request) {

        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;

        $cart = new Cart($oldCart);

        $cart->addProduct($product);

        $request->session()->put('cart', $cart);

        /*
         * To have essential data in ajax request
         */
        return response()->json($product);
    }

    /*
     * AJAX request
     */
    public function deleteProduct(Product $product, Request $request) {

        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;

        $cart = new Cart($oldCart);

        $cart->deleteProduct($product);

        $request->session()->put('cart', $cart);

        return response()->json($product);
    }
}
