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

Route::get('/', function () {
    return view('home');
});

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
