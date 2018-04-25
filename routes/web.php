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

Route::get('/', 'CategoryController@index');

Route::get('item/{url}', 'PostController@index');

Route::get('setlocale/{locale}', function ($locale) {
//    Session::put('locale', $locale);
    Cookie::queue('locale', $locale);
    return redirect()->back();
});