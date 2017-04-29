<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Product $product, Request $request){

        /*
         * Validate review
         */
        $this->validate($request, [
            'review' => 'min:5|max:1000',
        ]);

        $user = Auth::user();

        // Create new review for user and product

        $review = new Review();
        $review->review = $request->review;
        $review->user_id = $user->id;
        $review->product_id = $product->id;
        $review->save();

        return back();
    }
}
