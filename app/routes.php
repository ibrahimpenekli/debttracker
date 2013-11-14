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


Route::group(array('before' => 'auth'), function() {
	Route::get('profile', 'UsersController@index');
	Route::get('purchased-items', 'UsersController@purchasedItems');	
	Route::get('debts', 'UsersController@getDebts');		
	Route::get('add-debt', 'UsersController@getAddDebt');		
	Route::post('add-debt', 'UsersController@postAddDebt');	
	Route::get('add-purchased-item', 'UsersController@getAddPurchasedItem');		
	Route::post('add-purchased-item', 'UsersController@postAddPurchasedItem');		
});
Route::post('attempt', 'UsersController@attempt');
Route::get('logout', 'UsersController@logout');
Route::get('/', 'UsersController@login');

