<?php

namespace App\Http\Controllers;

use App\Product;
use App\Rating;
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
            'review' => 'min:15|max:1000',
        ]);

        $user = Auth::user();

        // Create new review for user and product
        $review = new Review();
        $review->review = $request->review;
        $review->user_id = $user->id;
        $review->product_id = $product->id;
        $review->save();

        // Create rating for user and product
        $rating = new Rating();
        $rating->rating = $request->stars;
        $rating->user_id = $user->id;
        $rating->product_id = $product->id;
        $rating->review_id = $review->id;
        $rating->save();

        // Compute rating for that product
        $numberOfRatings = count($product->ratings);
        $ratingsSum = $product->ratings_sum;

        $ratingsSum += $rating->rating;
        $averageRating = $ratingsSum / $numberOfRatings;

        $product->number_of_ratings = $numberOfRatings;
        $product->ratings_sum = $ratingsSum;
        $product->average_rating = $averageRating;
        $product->save();

        return back();
    }
}
