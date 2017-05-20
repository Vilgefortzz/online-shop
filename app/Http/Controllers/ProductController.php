<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product){

        // Get all reviews for this product and sort reviews by date from the newest one
        $reviews = Review::where('product_id', $product->id)->orderBy('created_at', 'desc')->paginate(2);

        // Check if has user already given a review to this product and if has user ordered this product
        if (Auth::check()){

            $isGiven = $reviews->contains('user_id', Auth::user()->id);
            $isOrdered = false;

            foreach (Auth::user()->orders as $order){
                if ($order->orderProducts->contains('product_id', $product->id)){
                    $isOrdered = true;
                }
            }
            return view('products.product_details', compact('product', 'isGiven', 'isOrdered', 'reviews'));
        }

        return view('products.product_details', compact('product', 'reviews'));
    }
}
