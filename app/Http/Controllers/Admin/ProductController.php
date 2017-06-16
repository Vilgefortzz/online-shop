<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(){

        $products = Product::paginate(5);
        return view('admin.products.products', compact('products'));
    }

    public function changeQuantity(Product $product, Request $request){

        if ($request->quantity >= 0 && $request->quantity <= 100){

            $product->quantity = $request->quantity;
            $product->save();
        }
        return back();
    }
}
