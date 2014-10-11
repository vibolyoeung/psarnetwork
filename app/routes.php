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

Route::get('/admin', 'BeLoginController@showLogin');
Route::get('/login', 'BeLoginController@showLogin');
Route::post('/admin/login', 'BeLoginController@doLogin');

Route::group(array('before' => 'auth'), function() {
	Route::get('/admin/dashboard', 'BeUserController@dashboard');
	Route::get('/admin/logout', 'BeLoginController@doLogout');
	Route::get('/admin/users', 'BeUserController@listUser');
	Route::any('/admin/create', 'BeUserController@createUser');
	Route::get('/admin/edit', 'BeUserController@editUser');
});

Route::get('/', 'FePageController@index');
