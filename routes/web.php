<?php
use App\Brand;
use App\Product;
use App\Category;
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
////
//Route::get('group_bookings', function () {
//    return view('group_bookings');
//})->name('group_bookings');

Route::get('/add', [
    'uses' => 'CartController@addToCart',
    'as' => 'add'
]);

Route::get('/newsletter/subscribe', [
    'uses' => 'PageController@newsletterPost',
    'as' => 'newsletter/subscribe'
]);

Route::post('/newsletter/subscribe', [
    'uses' => 'PageController@newsletterPost',
    'as' => 'newsletter/subscribe'
]);

Route::get('/group-bookings/book', [
    'uses' => 'PageController@groupBookingPost',
    'as' => 'group-bookings/book'
]);
Route::post('/group-bookings/book', [
    'uses' => 'PageController@groupBookingPost',
    'as' => 'group-bookings/book'
]);

Route::get('/group_bookings', [
    'uses' => 'PageController@groupBookings',
    'as' => 'group_bookings'
]);

Route::group(['prefix' => '/'], function () {
    Route::get('/', [
        'uses' => 'PageController@indexPage',
        'as' => 'index_page'
    ]);

    Route::get('services', [
        'uses' => 'PageController@servicesPage',
        'as' => 'services_page'
    ]);

    Route::get('products', [
        'uses' => 'PageController@productsPage',
        'as' => 'products_page'
    ]);

    Route::get('tobacco', [
        'uses' => 'PageController@Tobacco',
        'as' => 'tobacco'
    ]);

    Route::get('shisha_pots', [
        'uses' => 'PageController@shishaPots',
        'as' => 'shisha_pots'
    ]);

    Route::group(['prefix' => 'tobacco'], function(){
        Route::get('/{brand_name?}', function ($brand_name=null){
            if($brand_name){
                $category = 2; //tobacco = 2
                $brand = Brand::where('brand_name',$brand_name)->get();
//                dd($brand->slug);
                $products = Product::where('category_id', $category)->where('brand_id', $brand[0]->id)->paginate();

                $all_categories =  Category::all();
                $brands =  Brand::all();
                $cart = session()->get('cart');

                $category_det = Category::find(2);
                return view("products_sub")->with(['products' => $products, 'cart' =>$cart,'category' => $category_det,
                    'categories' => $all_categories,'brands' => $brands,'brand' => $brand, "page" => 'Tobacco', "title" => 'Tobacco']);
            }

            return view('products.index')->with('page','products');
        });
    });

    Route::group(['prefix' => 'shisha_pots'], function(){
        Route::get('/{brand_name?}', function ($brand_name=null){
            if($brand_name){
                $category = 1;
                $brand = Brand::where('brand_name',$brand_name)->get();
//                dd($brand->slug);
                $products = Product::where('category_id', $category)->where('brand_id', $brand[0]->id)->paginate();

                $all_categories =  Category::all();
                $brands =  Brand::all();
                $cart = session()->get('cart');

                $category_det = Category::find($category);
                return view("products_sub")->with(['products' => $products, 'cart' =>$cart,'category' => $category_det,
                    'categories' => $all_categories,'brands' => $brands,'brand' => $brand, "page" => 'shisha_pots', "title" => 'Shisha Pots']);
            }

            return view('products.index')->with('page','products');
        });
    });


    Route::group(['prefix' => 'cart'], function(){
        Route::post('/', 'CartController@addToCart');
        Route::post('/update', 'CartController@updateItem');
        Route::get('/update', 'CartController@updateItem');
        Route::get('{product_id}/remove', [
            'uses' => 'CartController@removeItem',
            'as' => 'remove_item'
        ]);
    });

    Route::get('shopping-cart', [
        'uses' => 'PageController@bookingListPage',
        'as' => 'shopping-cart'
    ]);

    Route::post('update-cart', [
        'uses' => 'CartController@updateAllCart',
        'as' => 'update-cart'
    ]);

    Route::post('subtotal', [
        'uses' => 'PageController@SubnTotal',
        'as' => 'subtotal'
    ]);

    Route::get('shop-checkout', [
        'uses' => 'PageController@checkout',
        'as' => 'shop-checkout'
    ]);

//    Route::get('payment/confirmation/', [
//        'uses' => 'PageController@orderReceived',
//        'as' => 'order'
//    ]);

    Route::get('payment/confirmation/{ref}', 'OrderController@orderReceived');
    Route::get('order_completed', 'OrderController@orderCompleted')->name('order_completed');

    Route::post('place_order', [
        'uses' => 'OrderController@placeOrder',
        'as' => 'place_order'
    ]);


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/pay', 'RaveController@initialize')->name('pay');
Route::post('/rave/callback', 'RaveController@callback')->name('callback');

Route::get('logout', array('uses' => 'PageController@doLogout'));
