<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Auth;
use Illuminate\Http\Request;
use Session;

class OrderController extends Controller
{
    public function showCheckout(){

        if (!Session::has('cart')){
            return back();
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('orders.checkout', ['products' => $cart->products, 'totalPrice' => $cart->totalPrice]);
    }

    public function showPlaceAnOrder(){

        if (!Session::has('cart')){
            return back();
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('orders.place_an_order', ['products' => $cart->products, 'totalPrice' => $cart->totalPrice]);
    }

    public function store(Request $request){

        /*
         * Validate data
         */

        $this->validate($request, [
            'email' => 'required|email|max:255',
            'first_name' => 'required|min:3|max:30',
            'last_name' => 'required|min:5|max:50',
            'street' => 'required|min:5|max:50',
            'postal_code' => 'required|min:5|max:20',
            'city' => 'required|min:5|max:15',
            'phone_number' => 'required'
        ]);

        /*
         * Get items, total price from shopping cart
         */
        if (!Session::has('cart')){
            return back();
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        // Create order
        $order = new Order();

        if (Auth::check()){
            $order->user_id = Auth::user()->id;
        }

        $order->total_paid = $cart->totalPrice;
        $order->delivery_method = $request->delivery_methods;
        $order->payment_method = $request->payment_methods;
        $order->status = "New";
        $order->save();

        Session::flush();
        return redirect()->to('/madeAnOrder');
    }

    public function showMadeAnOrder(){

        return view('orders.made_order');
    }
}
