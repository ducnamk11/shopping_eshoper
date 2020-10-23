<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/redirect', 'Auth\LoginController@redirectToProvider')->name('admin_redirect');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/category/{id}/{slug}', 'HomeController@category')->name('category');
Route::get('/product/{id}/{slug}', 'HomeController@product_detail')->name('product_detail');
Route::get('/search', 'HomeController@search')->name('search');


Route::get('/admin', 'AdminController@loginAdmin')->name('admin_login');
Route::post('/admin', 'AdminController@postLoginAdmin')->name('admin_login_post');
Route::get('/admin/logout', 'AdminController@postLogout')->name('admin_logout');

Route::group(['prefix' => 'order','middleware' => ['auth'] ], function () { //'
     Route::get('/checkout', 'OrderController@checkout')->name('order_checkout');
    Route::post('/pay/', 'OrderController@pay')->name('order_pay');
    Route::get('/complete', 'OrderController@complete')->name('order_complete');
 });

Route::group(['prefix' => 'paypal','middleware' => ['auth'] ], function () { //'
    Route::get('handle-payment', 'PayPalController@handlePayment')->name('make_payment');
    Route::get('cancel-payment', 'PayPalController@paymentCancel')->name('cancel_payment');
    Route::get('payment-success', 'PayPalController@paymentSuccess')->name('success_payment');
});

Route::group(['prefix' => 'cart','middleware' => ['auth'] ], function () { //'
    Route::get('/', 'CartController@index')->name('cart_index');
    Route::get('/checkout', 'CartController@checkout')->name('cart_checkout');
    Route::get('/store/{id}', 'CartController@store')->name('cart_store');
    Route::get('/update/{id} }', 'CartController@update')->name('cart_update');
    Route::get('/delete/{id}', 'CartController@delete')->name('cart_delete');
    Route::get('/allDelete', 'CartController@allDelete')->name('cart_all_delete');
});

Route::group(['prefix' => 'wishlist', ], function () { //'middleware' => ['auth']
    Route::get('/', 'WishlistController@index')->name('wish_index');
    Route::get('/checkout', 'WishlistController@checkout')->name('wish_checkout');
    Route::get('/store/{id}', 'WishlistController@store')->name('wish_store');
    Route::get('/update/{id} }', 'WishlistController@update')->name('wish_update');
    Route::get('/delete/{id}', 'WishlistController@delete')->name('wish_delete');
    Route::get('/allDelete', 'WishlistController@allDelete')->name('wish_all_delete');
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth:staff']], function () {
    Route::get('/home', 'AdminController@index')->name('admin_home');
    Route::prefix('categories')->group(function () {
        Route::get('/', 'CategoryController@index')->name('category_index');
        Route::get('/create', 'CategoryController@create')->name('category_create');
        Route::post('/store', 'CategoryController@store')->name('category_store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category_edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('category_update');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('category_delete');
    });
    Route::prefix('menus')->group(function () {
        Route::get('/', 'MenuController@index')->name('menu_index');
        Route::get('/create', 'MenuController@create')->name('menu_create');
        Route::post('/store', 'MenuController@store')->name('menu_store');
        Route::get('/edit/{id}', 'MenuController@edit')->name('menu_edit');
        Route::post('/update/{id}', 'MenuController@update')->name('menu_update');
        Route::get('/delete/{id}', 'MenuController@delete')->name('menu_delete');
    });
    Route::prefix('products')->group(function () {
        Route::get('/', 'AdminProductController@index')->name('product_index');
        Route::get('/create', 'AdminProductController@create')->name('product_create');
        Route::post('/store', 'AdminProductController@store')->name('product_store');
        Route::get('/edit/{id}', 'AdminProductController@edit')->name('product_edit');
        Route::post('/update/{id}', 'AdminProductController@update')->name('product_update');
        Route::get('/delete/{id}', 'AdminProductController@delete')->name('product_delete');
    });
    Route::prefix('sliders')->group(function () {
        Route::get('/', 'SliderController@index')->name('slider_index');
        Route::get('/create', 'SliderController@create')->name('slider_create');
        Route::post('/store', 'SliderController@store')->name('slider_store');
        Route::get('/edit/{id}', 'SliderController@edit')->name('slider_edit');
        Route::post('/update/{id}', 'SliderController@update')->name('slider_update');
        Route::get('/delete/{id}', 'SliderController@delete')->name('slider_delete');
    });
    Route::prefix('settings')->group(function () {
        Route::get('/', 'SettingController@index')->name('setting_index');
        Route::get('/create', 'SettingController@create')->name('setting_create');
        Route::post('/store', 'SettingController@store')->name('setting_store');
        Route::get('/edit/{id}', 'SettingController@edit')->name('setting_edit');
        Route::post('/update/{id}', 'SettingController@update')->name('setting_update');
        Route::get('/delete/{id}', 'SettingController@delete')->name('setting_delete');
    });
    Route::prefix('staffs')->group(function () {
        Route::get('/', 'StaffController@index')->name('staff_index');
        Route::get('/create', 'StaffController@create')->name('staff_create');
        Route::post('/store', 'StaffController@store')->name('staff_store');
        Route::get('/edit/{id}', 'StaffController@edit')->name('staff_edit');
        Route::post('/update/{id}', 'StaffController@update')->name('staff_update');
        Route::get('/delete/{id}', 'StaffController@delete')->name('staff_delete');
    });
    Route::prefix('permissions')->group(function () {
        Route::get('/', 'PermissionController@index')->name('permission_index');
        Route::post('/store', 'PermissionController@store')->name('permission_store');
        Route::get('/edit/{id}', 'PermissionController@edit')->name('permission_edit');
        Route::post('/update/{id}', 'PermissionController@update')->name('permission_update');
        Route::get('/delete/{id}', 'PermissionController@delete')->name('permission_delete');
    });
    Route::prefix('roles')->group(function () {
        Route::get('/', 'RoleController@index')->name('role_index');
        Route::get('/create', 'RoleController@create')->name('role_create');
        Route::post('/store', 'RoleController@store')->name('role_store');
        Route::get('/edit/{id}', 'RoleController@edit')->name('role_edit');
        Route::post('/update/{id}', 'RoleController@update')->name('role_update');
        Route::get('/delete/{id}', 'RoleController@delete')->name('role_delete');
    });
    
    Route::prefix('orders')->group(function () {
        Route::get('/', 'AdminOrderController@index')->name('order_index');
        Route::post('/store', 'AdminOrderController@store')->name('order_store');
        Route::get('/update/{id}', 'AdminOrderController@update')->name('order_update');
     
    });
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => []], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();
