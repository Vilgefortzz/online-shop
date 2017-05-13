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

/**
 * Cart - Session ( show, add, delete )
 */

Route::get('/cart','CartController@showProducts');
Route::post('/cart/add/{product}','CartController@addProduct');

Route::delete('/cart/delete/products','CartController@deleteAllProducts');
Route::delete('/cart/delete/{product}','CartController@deleteProduct');

Route::post('/cart/products/{product}/quantity', 'CartController@setQuantity');

/**
 * Checkout, orders
 */

Route::get('/checkout', 'ShopController@showCheckout');

/*
 * User Routes
 */
Route::group(['prefix' => 'users'], function () {

    Route::get('/{user}/settings', 'UserController@showSettings');

    /*
     * Settings panel
     */
    Route::put('/{user}/update/name', 'UserController@updateName');
    Route::put('/{user}/update/password', 'UserController@updatePassword');
    Route::put('/{user}/update/email', 'UserController@updateEmail');
    Route::delete('/{user}/delete', 'UserController@delete');
});

/*
 * Products Routes
 */
Route::group(['prefix' => 'products'], function () {

    Route::get('/{product}', 'ProductController@show');
});

Route::get('/subcategories/{subcategory}/products', 'SubcategoryController@showAllProducts');
Route::post('/products/{product}/reviews/add', 'ReviewController@store');

/*
 * Info - terms and conditions, faq
 */

Route::get('/faq', function () {
    return view('info.faq');
});

Route::get('/aboutUs', function () {
    return view('info.about_us');
});

Route::get('/termsAndConditions', function () {
    return view('info.terms_and_conditions');
});
