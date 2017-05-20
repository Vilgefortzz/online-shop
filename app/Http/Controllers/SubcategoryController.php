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
        $products = Product::where('subcategory_id', $subcategory->id)->paginate(3);

        if ($request->ajax()) {
            return view('products.products_list', compact('products'))->render();
        }
        return view('subcategories.subcategory_products', compact('categories','category','subcategory','products'));
    }

    public function showAllProductsByPriceAscending(Subcategory $subcategory, Request $request){

        $categories = Category::all();
        $category = $subcategory->category;
        $products = Product::where('subcategory_id', $subcategory->id)
            ->orderBy('price', 'asc')->paginate(3);

        if ($request->ajax()) {
            return view('products.products_list', compact('products'))->render();
        }
        return view('subcategories.subcategory_products', compact('categories','category','subcategory','products'));
    }

    public function showAllProductsByPriceDescending(Subcategory $subcategory, Request $request){

        $categories = Category::all();
        $category = $subcategory->category;
        $products = Product::where('subcategory_id', $subcategory->id)
            ->orderBy('price', 'desc')->paginate(3);

        if ($request->ajax()) {
            return view('products.products_list', compact('products'))->render();
        }
        return view('subcategories.subcategory_products', compact('categories','category','subcategory','products'));
    }
}
