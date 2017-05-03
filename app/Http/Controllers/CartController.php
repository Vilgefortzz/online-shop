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
        return view('cart', ['products' => $cart->products, 'totalPrice' => $cart->totalPrice, 'numberOfProducts' => $cart->numberOfProducts]);

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

        $newTotalPrice = $cart->deleteProduct($product);

        $request->session()->put('cart', $cart);

        return response()->json(array(
            'newTotalPrice' => $newTotalPrice,
            'product' => $product
        ));
    }

    /*
     * AJAX request
     */
    public function deleteAllProducts(Request $request) {

        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;

        $cart = new Cart($oldCart);

        $cart->deleteAllProducts();

        $request->session()->put('cart', $cart);
    }

    /*
     * AJAX request
     */
    public function setQuantity(Product $product, Request $request) {

        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;

        $cart = new Cart($oldCart);

        $newTotalPrice = $cart->setQuantity($product, $request->newQuantityValue);

        $request->session()->put('cart', $cart);

        return response()->json(array(
            'newTotalPrice' => $newTotalPrice,
            'product' => $product
        ));
    }
}
