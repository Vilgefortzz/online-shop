<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Delivery;
use App\Order;
use App\OrderProduct;
use App\Payment;
use App\Product;
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

        // Delivery methods
        $deliveries = Delivery::all();

        // Payment methods
        $payments = Payment::all();

        return view('orders.place_an_order', ['products' => $cart->products, 'totalPrice' => $cart->totalPrice, 'deliveries' => $deliveries, 'payments' => $payments]);
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

        // Fill essential data
        $order->email = $request->email;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->street = $request->street;
        $order->postal_code = $request->postal_code;
        $order->city = $request->city;
        $order->country = $request->country;
        $order->phone_number = $request->phone_number;

        $discount = 0;

        if (Auth::check()){
            $order->user_id = Auth::user()->id;
            $discount = Auth::user()->discount;
        }

        $order->delivery_id = $request->delivery_methods;
        $order->payment_id = $request->payment_methods;

        $delivery = Delivery::find($order->delivery_id);

        // Total paid for order
        $totalPriceForProducts = $cart->totalPrice;
        $shipping = $delivery->price;
        $totalPaidForOrder = $totalPriceForProducts + $shipping - $discount;

        $order->total_paid = $totalPaidForOrder;
        $order->status = "Pending";
        $order->save();

        // Create order products

        foreach ($cart->products as $product){

            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $product['id'];

            $orderProduct->quantity = $product['quantity'];
            $orderProduct->priceForAllItems = $product['priceForAllItems'];
            $orderProduct->save();

            // Decrease quantity of products on stock

            $dbProduct = Product::find($product['id']);
            $dbProduct->quantity -= $product['quantity'];
            $dbProduct->save();
        }

        // Clear shopping cart after making order
        Session::forget('cart');

        return redirect()->to('/madeAnOrder');
    }

    public function showMadeAnOrder(){

        return view('orders.made_order');
    }
}
