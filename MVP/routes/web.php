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

$proxy_url    = getenv('PROXY_URL');
$proxy_schema = getenv('PROXY_SCHEMA');

if (!empty($proxy_url)) {
   URL::forceRootUrl($proxy_url);
}

if (!empty($proxy_schema)) {
   URL::forceScheme($proxy_schema);
}

Auth::routes();
Auth::routes(['/register' => false]);

Route::get('/', 'HomeController@getImages');
Route::get('/getTransportation', 'ProductController@getTransportation');
Route::get('/getRoutes', 'ProductController@getRoutes');
Route::get('/checkout', function(){
    return view('checkout');
});

Route::get('/cart', function(){
    return view('cart');
});
Route::post('/cart/getAddons', 'ProductController@getCartAddons');
Route::post('/cart/getTransportation', 'ProductController@getCartTransportation');

Route::get('/getAddons', 'ProductController@getAddons');

//Admin routes
Route::post('/addons/uploadAddon', 'ProductController@newAddon')->middleware('auth');
Route::post('/addons/deleteAddon', 'ProductController@deleteAddon')->middleware('auth');
Route::post('/carousel/uploadImage', 'HomeController@uploadCarouselImage')->middleware('auth');
Route::get('/carousel/requestImages', 'HomeController@getCarouselImages')->middleware('auth');
Route::post('/carousel/deleteImage', 'HomeController@deleteCarouselImage')->middleware('auth');
Route::get('/home', function(){
    return view('admin');
});

