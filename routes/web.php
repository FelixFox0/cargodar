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

/*Route::get('/', function () {
//    return view('welcome');
    return 'azaza';
    
});*/
//Route::get('/players', 'PlayerController@show')->name('player.show');


Route::get('account', 'CustomerController@index');

Route::get('setlocale/{locale}', function ($locale) {
//    Session::put('locale', $locale);
    Cookie::queue('locale', $locale);
    return redirect()->back();
});

Route::get('{category?}', 'CategoryController@index');
Route::get('{category}/{url}', 'PostController@index');