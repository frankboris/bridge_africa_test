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

Auth::routes();

Route::get('', 'HomeController@index')->name('home');
Route::get('products/{product}', 'HomeController@show')->name('home.show')->where(['product' => '[1-9][0-9]*']);

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'account'], function () {
        Route::get('', 'AccountController@index')->name('account.profile');

        Route::group(['prefix' => 'products'], function () {
            $c = 'ProductController';
            Route::get('', $c.'@index')->name('account.products');
            Route::get('create', $c.'@create')->name('account.products.create');
            Route::post('store', $c.'@store')->name('account.products.store');
            Route::get('{product}', $c.'@show')->name('account.products.show')->where(['product' => '[1-9][0-9]*'])->middleware('can:view,product');
            Route::put('{product}', $c.'@update')->name('account.products.update')->where(['product' => '[1-9][0-9]*'])->middleware('can:update,product');
            Route::get('{product}/edit', $c.'@edit')->name('account.products.edit')->where(['product' => '[1-9][0-9]*'])->middleware('can:update,product');
            Route::delete('{product}', $c.'@destroy')->name('account.products.destroy')->where(['product' => '[1-9][0-9]*'])->middleware('can:delete,product');
        });
    });
});
