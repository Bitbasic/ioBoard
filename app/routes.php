<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@getIndex');

Route::get('data', 'HomeController@getData');

Route::get('status/{id}', 'HomeController@getStatusForm');
Route::post('status', 'HomeController@postStatusForm');

Route::get('future/{id}', 'HomeController@getFutureForm');
Route::post('future', 'HomeController@postFutureForm');
Route::delete('future/{id}', 'HomeController@deleteFuture');

Route::get('future-edit/{id}', 'HomeController@getEditFutureForm');
Route::put('future-edit/{id}', 'HomeController@putEditFutureForm');