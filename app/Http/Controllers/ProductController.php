<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product){

        // Get all reviews for this product
        $reviews = $product->reviews;

        // Check if has user already given a review to this product
        if (Auth::check()){
            $isGiven = $reviews->contains('user_id', Auth::user()->id);
            return view('product_details', compact('product', 'isGiven', 'reviews'));
        }

        return view('product_details', compact('product', 'reviews'));

    }
}
