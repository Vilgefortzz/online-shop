<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function showAllProducts(Subcategory $subcategory){

        $categories = Category::all();
        $category = $subcategory->category;
        $products = $subcategory->products;

        return view('subcategories.subcategory_products', compact('categories','category','subcategory','products'));
    }
}
