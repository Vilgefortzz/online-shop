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
 * Checkout your products
 */
Route::get('/checkout', 'OrderController@showCheckout');

/**
 * Make orders
 */
Route::get('/placeAnOrder', 'OrderController@showPlaceAnOrder');
Route::post('/placeAnOrder', 'OrderController@store');

/**
 * Order was made, thanks for purchase
 */
Route::get('/madeAnOrder', 'OrderController@showMadeAnOrder');

/**
 * Admin routes, protected by middleware
 */
Route::group(['namespace' => 'Admin', 'middleware' => 'admin', 'prefix'=>'admin'], function () {

    Route::get('/', function (){
        return view('admin.main_page');
    });

    Route::get('/users', 'UserController@index');
    Route::get('/products', 'ProductController@index');
    Route::get('/orders', 'OrderController@index');
    Route::get('/orders/pending', 'OrderController@indexPending');
    Route::get('/orders/preparingToSend', 'OrderController@indexPreparingToSend');
    Route::get('/orders/waitingForPayment', 'OrderController@indexWaitingForPayment');
    Route::get('/orders/send', 'OrderController@indexSend');
    Route::get('/orders/completed', 'OrderController@indexCompleted');

    /**
     * Change orders status
     */
    Route::put('/orders/{order}/update/status', 'OrderController@updateStatus');

    /**
     * Change quantity of products
     */
    Route::put('/products/{product}/update/quantity', 'ProductController@changeQuantity');

});


/*
 * User Routes
 */
Route::group(['prefix' => 'users'], function () {

    /*
     * Personal data panel
     */
    Route::get('/{user}/personalData', 'UserController@showPersonalData');
    Route::get('/{user}/getPersonalData', 'UserController@getPersonalData');
    Route::put('/{user}/update/personalData', 'UserController@updatePersonalData');

    /*
     * Settings panel
     */
    Route::get('/{user}/settings', 'UserController@showSettings');
    Route::put('/{user}/update/username', 'UserController@updateUsername');
    Route::put('/{user}/update/password', 'UserController@updatePassword');
    Route::put('/{user}/update/email', 'UserController@updateEmail');
    Route::delete('/{user}/delete', 'UserController@delete');

    /*
     * Orders panel
     */
    Route::get('/{user}/orders','UserController@showOrders');

    /*
     * Sorting orders
     */

    Route::get('/{user}/orders/pending', 'UserController@showPendingOrders');
    Route::get('/{user}/orders/preparingToSend', 'UserController@showPreparingToSendOrders');
    Route::get('/{user}/orders/waitingForPayment', 'UserController@showWaitingForPaymentOrders');
    Route::get('/{user}/orders/send', 'UserController@showSendOrders');
    Route::get('/{user}/orders/completed', 'UserController@showCompletedOrders');

});

/*
 * Products Routes
 */
Route::group(['prefix' => 'products'], function () {

    /**
     * Search products
     */
    Route::get('/search', 'ProductController@search');

    Route::get('/{product}', 'ProductController@show');
});

/**
 * Subcategories, products, filtration
 */

Route::get('/subcategories/{subcategory}/products', 'SubcategoryController@showAllProducts');
Route::get('/subcategories/{subcategory}/products/prices/ascending', 'SubcategoryController@showAllProductsByPriceAscending');
Route::get('/subcategories/{subcategory}/products/prices/descending', 'SubcategoryController@showAllProductsByPriceDescending');

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

/**
 * Newsletter subscribe
 */
Route::post('/subscribe', 'SubscribeController@store');
