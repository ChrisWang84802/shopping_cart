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
Route::Auth();
Route::group(['middleware'=>['auth']],function(){
    Route::get('/todo','TodoController@index');
    Route::get('/todo/{todo}','TodoController@show');
    Route::post('/todo','TodoController@update');
    Route::delete('/todo/{todo}','TodoController@destory');
});

Route::get('/',[
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);

Route::get('/shopping-cart',[
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/add-to-cart/{id}',[
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/clear-cart',[
    'uses' => 'ProductController@clear',
    'as' => 'product.ClearCart',
]);


//Route::group(['middleware'=>['auth']],function(){
Route::get('/test',function(){   
    Session::put('123','hello');
    $get_session = Session::get('123');
    var_dump($get_session);
    exit;    
});
Route::get('/userdata','UserdataController@show');
Route::get('/userdata/{userdata}','UserdataController@index');
//Route::get('/logout','LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
