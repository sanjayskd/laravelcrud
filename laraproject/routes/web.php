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
    return view('welcome');
});

// Route::view('/','admin.login'); or
Route::view('admin','admin.login');

Route::get("logout","AdminController@logout");
Route::post('checkuser','AdminController@store');
Route::get("dashboard","AdminController@index");
Route::get("addcat","CategoriesController@index");
Route::get("viewcat","CategoriesController@create");
Route::get("viewpost","PostController@show");
Route::get("delcat/{id}","CategoriesController@destroy");
Route::get("editcat/{id}","CategoriesController@edit");
Route::get("addpost","PostController@index");
Route::get("delpost/{id}","PostController@destroy");
Route::post("newcat","CategoriesController@store");
Route::post("updatecat","CategoriesController@update");
Route::post("newpost","PostController@store");
Route::get("goback","PostController@goback");
Route::get("editpost/{id}","PostController@edit");
Route::post("updatepost","PostController@update");