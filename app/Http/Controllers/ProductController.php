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

        // Check if has user already given a review to this product
        if (Auth::check()){

            $isGiven = $reviews->contains('user_id', Auth::user()->id);

            return view('products.product_details', compact('product', 'isGiven', 'reviews'));
        }

        return view('products.product_details', compact('product', 'reviews'));
    }
}
