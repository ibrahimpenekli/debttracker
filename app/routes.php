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
	// Debt controller URIs
	Route::resource('debt', 'DebtController', array('except' => array('show')));
	Route::get('debt/{debt}/pay', 'DebtController@pay');
	Route::put('debt/{debt}/checkout', 'DebtController@checkout');
    Route::get('api/debts', 'DebtController@debts');
	
	// PurchasedItem controller URIs
	Route::resource('purchased-item', 'PurchasedItemController', array('except' => array('show')));

	Route::get('profile', 'UsersController@index');
    Route::get('api/users', 'UsersController@users');
    Route::get('api/items', 'UsersController@items');
    Route::get('stats', 'UsersController@stats');
	Route::post('close-period', 'UsersController@postClosePeriodVote');			
});

Route::post('attempt', 'UsersController@attempt');
Route::get('logout', 'UsersController@logout');
Route::get('/', 'UsersController@login');

