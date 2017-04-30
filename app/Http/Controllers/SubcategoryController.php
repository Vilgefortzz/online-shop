<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function showAllProducts(Subcategory $subcategory, Request $request){

        $categories = Category::all();
        $category = $subcategory->category;
        $products = Product::where('subcategory_id', $subcategory->id)->paginate(30);

        if ($request->ajax()) {
            return view('products.products_list', compact('products'))->render();
        }
        return view('subcategories.subcategory_products', compact('categories','category','subcategory','products'));
    }
}
