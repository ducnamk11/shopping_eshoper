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
Route::get('/home', function () {
    return view('home');
});


Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@loginAdmin')->name('login');
    Route::post('/', 'AdminController@postLoginAdmin')->name('admin_login_post');
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
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => []], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
