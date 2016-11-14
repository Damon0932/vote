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
Route::post('/vote', 'VoteController@vote');

Route::get('result', function(){
	return view('votes.table');
});

Route::auth();