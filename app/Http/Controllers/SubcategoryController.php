<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function showAllProducts(Subcategory $subcategory){

        $products = $subcategory->products;

        return view('subcategories.subcategory_products', compact('subcategory','products'));
    }
}
