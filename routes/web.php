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
    return view('top');
});


Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/items', 'ItemController@index');

Route::get('/items/detail/{id}', 'ItemController@detail');

Route::get('/items/create','ItemController@add')->name("auth");
Route::post('/items/create','ItemController@create')->name("auth");

Route::get('/edit','ItemController@edit')->middleware('auth');
Route::post('/update,ItemController@update')->middleware('auth');

Route::get('/mypage','MypageController@index')->middleware('auth');
Route::get('/mypage/items','MypageController@items')->middleware('auth');

Route::get('/mypage/items/edit','MypageController@edit')->middleware('auth');
Route::get('/mypage/items/update','MypageController@update')->middleware('auth');



