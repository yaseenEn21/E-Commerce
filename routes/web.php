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
use  App\HTTP\Controllers\Voyager\ProductsController as PC;

Auth::routes();


//for the first/main page in website
Route::get('/','ProductController@index')->name('home.index');

//for the product for the specific category
Route::get('/shop','ProductController@productsCategory')->name('shop.index');

//for the details for the specific product
Route::get('/details/{product}','ProductController@show')->name('product.show');


Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@store')->name('addToCart');
Route::delete('/cart/{id}','CartController@destroy')->name('cart.delete');



Route::get('/checkout','CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout','CheckoutController@store')->name('checkout.store');
Route::get('/confirmation', 'CheckoutController@requestConfirmationPage');
Route::post('/coupon', 'CheckoutController@coupon')->name('coupon');



Route::get('/my-profile', 'UserController@index')->name('profile.index');
Route::patch('/profile', 'UserController@update')->name('profile.update');

Route::get('/my-orders', 'OrderController@index')->name('order.index');
Route::get('/order/{order}', 'OrderController@show')->name('order.show');






 


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('products/{slug}', 'ProductsController@show')->name('products.show');
    //Route::get('products/{slug}', 'ProductsController@destroy')->name('products.destroy');

});


Route::get('/home', 'HomeController@index')->name('home');
