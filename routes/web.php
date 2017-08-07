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

Auth::routes();

Route::get('/', 'ThreadController@index');
Route::get('users/', 'UserController@index');
Route::get('threads/create', 'ThreadController@create');
Route::get('threads/{thread}', 'ThreadController@show');
Route::post('threads', 'ThreadController@store');
Route::patch('threads/{thread}', 'ThreadController@update');
Route::post('threads/{thread}/replies', 'ReplyController@store');

Route::patch('replies/{reply}/reply', 'ReplyController@update');
Route::delete('replies/{reply}', 'ReplyController@destroy');

Route::post('replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('replies/{reply}/favorites', 'FavoritesController@destroy');


//Socializate
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
