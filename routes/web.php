<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $categories = \App\Category::all();

    /*
     * Recommended products - collection
     */
    $recommendedProducts = \App\Product::all()->where('recommended', true);

    return view('main_page', compact('categories', 'recommendedProducts'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');

/*
 * User Routes
 */
Route::group(['prefix' => 'users'], function () {

    Route::get('/', 'UserController@index');
    Route::get('/{user}/cart', 'UserController@showItemsInCart');
});

Route::get('/subcategories/{subcategory}/products', 'CategoryController@showAllProducts');
