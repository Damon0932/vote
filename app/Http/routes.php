<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'VoteController@index');
Route::get('/vote', 'VoteController@votePage');
Route::get('/bra', 'VoteController@braIndex');
Route::get('/flr', 'VoteController@flrIndex');
Route::get('/bdr', 'VoteController@bdrIndex');
Route::post('/vote', 'VoteController@vote');
Route::any('/result', 'VoteController@result');
Route::any('/result/vote-detail', 'VoteController@voteDetails');
Route::any('/data', 'VoteController@data');
Route::any('/create-products', 'VoteController@createProducts');
