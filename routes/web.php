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
    if(Auth::check()){
        return redirect('/items');
    }
    
    return view('top');
});

Auth::routes();
Route::get('/home/', 'HomeController@index');
Route::get('/items', 'ItemController@index');


Route::get('/items/create','ItemController@add')->name("auth");
Route::post('/items/create','ItemController@create')->name("auth");

Route::get('/edit','ItemController@edit')->middleware('auth');
Route::post('/update,ItemController@update')->middleware('auth');

Route::get('/mypage','MypageController@index')->middleware('auth');
Route::get('/mypage/items/index','MypageController@items')->middleware('auth');

Route::get('/mypage/items/edit','MypageController@edit')->middleware('auth');
Route::post('/mypage/items/update','MypageController@update')->middleware('auth');
Route::get('/mypage/items/delete','MypageController@delete')->middleware('auth');

Route::get('/items/detail', 'ItemController@detail')->middleware('auth');

Route::post('/bookmark/create','BookmarkController@create')->middleware('auth');
Route::post('/bookmark/delete','BookmarkController@delete')->middleware('auth');

Route::get('/mypage/bookmarks','MypageController@bookmarks')->middleware('auth');
ROute::get('/mypage/bookmarks/destroy','MypageController@destroy')->middleware('auth');