<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showAllProducts(Category $category){

        $products = $category->products;

        return view('category_products', compact('category', 'products'));

    }
}
