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
//
//Route::get('/add', function () {
//    return view('index');
//});

Route::get('/add', [
    'uses' => 'CartController@addToCart',
    'as' => 'add'
]);

Route::group(['prefix' => '/'], function () {
    Route::get('/', [
        'uses' => 'PageController@indexPage',
        'as' => 'index_page'
    ]);

    Route::get('servcies', [
        'uses' => 'PageController@servicesPage',
        'as' => 'services_page'
    ]);

    Route::get('products', [
        'uses' => 'PageController@productsPage',
        'as' => 'products_page'
    ]);

    Route::group(['prefix' => 'cart'], function(){
        Route::post('/', 'CartController@addToCart');
        Route::get('{product_id}/remove', [
            'uses' => 'CartController@removeItem',
            'as' => 'remove_item'
        ]);
    });

    Route::get('shopping-cart', [
        'uses' => 'PageController@bookingListPage',
        'as' => 'shopping-cart'
    ]);

    Route::get('shop-checkout', [
        'uses' => 'PageController@checkout',
        'as' => 'shop-checkout'
    ]);

    Route::post('place_order', [
        'uses' => 'OrderController@placeOrder',
        'as' => 'place_order'
    ]);


});
