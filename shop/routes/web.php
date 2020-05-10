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
    return view('admins.home');
});
Route::prefix('admin')->group(function (){
    Route::get('/home','Admins\HomeController@index')->name('admins.home');

    Route::group(['prefix' =>'category'], function (){
        Route::get('/','Admins\CategoryController@index')->name('category.list');
        Route::get('/create','Admins\CategoryController@create')->name('category.create');
        Route::post('/create','Admins\CategoryController@store');
        Route::get('/update/{id}','Admins\CategoryController@edit')->name('category.edit');
        Route::post('/update/{id}','Admins\CategoryController@update');
        Route::get('/{action}/{id}','Admins\CategoryController@destroy')->name('category.destroy');
        Route::get('/active/{id}', 'Admins\CategoryController@active')->name('category.active');
    });
    Route::group(['prefix' =>'product'], function (){
        Route::get('/','Admins\ProductController@index')->name('product.list');
        Route::get('/create','Admins\ProductController@create')->name('product.create');
        Route::post('/create','Admins\ProductController@store');
        Route::get('/update/{id}','Admins\ProductController@edit')->name('product.edit');
        Route::post('/update/{id}','Admins\ProductController@update');
        Route::get('/{action}/{id}','Admins\ProductController@destroy')->name('product.destroy');
        Route::get('/active/{id}', 'Admins\ProductController@active')->name('product.active');
        Route::get('/hot/{id}', 'Admins\ProductController@hot')->name('product.hot');
    });

});
