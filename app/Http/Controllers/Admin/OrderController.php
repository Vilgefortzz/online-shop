<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders.orders', compact('orders'));
    }

    public function indexPending(){

        $orders = Order::where('status', 'Pending')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders.orders', compact('orders'));
    }

    public function indexPreparingToSend(){

        $orders = Order::where('status', 'Preparing to send')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders.orders', compact('orders'));
    }

    public function indexWaitingForPayment(){

        $orders = Order::where('status', 'Waiting for payment')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders.orders', compact('orders'));
    }

    public function indexSend(){

        $orders = Order::where('status', 'Send')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders.orders', compact('orders'));
    }

    public function indexCompleted(){

        $orders = Order::where('status', 'Completed')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders.orders', compact('orders'));
    }

    public function updateStatus(Order $order, Request $request){

        $order->status = $request->status;
        $order->save();

        return back();
    }
}
