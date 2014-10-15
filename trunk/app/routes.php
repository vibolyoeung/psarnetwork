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
	Route::get('/admin/dashboard', 'BeLoginController@dashboard');
	Route::get('/admin/logout', 'BeLoginController@doLogout');
	Route::get('/admin/users', 'BeUserController@listUser');
	Route::any('/admin/create', 'BeUserController@createUser');
	Route::get('/admin/edit/{id}', 'BeUserController@editUser');
	Route::post('/admin/edit/', 'BeUserController@editUser');
	Route::any('/admin/delete/{id}', 'BeUserController@deleteUser');
	Route::get('/admin/status/{status}/{id}', 'BeUserController@changeStatusUser');
	Route::any('/admin/profile', 'BeUserController@updateProfileUser');
	Route::any('/admin/change_password','BeUserController@changePasswordUser');
	Route::any('/admin/pages','BePageController@listPage');
	Route::any('/admin/create_page','BePageController@createPage');
	Route::get('/admin/edit_page/{id}','BePageController@editPage');
	Route::post('/admin/edit_page','BePageController@editPage');
	Route::get('/admin/delete_page/{id}','BePageController@deletePage');
	Route::get('/admin/status_page/{status}/{id}','BePageController@isEnablePage');
	
});

Route::any('/{lang}', 'FePageController@index');
Route::any('/', 'FePageController@index');
 
