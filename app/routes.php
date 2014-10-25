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
Route::get('/admin/send-forget-password', 'BeLoginController@sendResetPassword');
Route::post('/admin/send-forget-password', 'BeLoginController@sendResetPassword');
Route::get('/admin/forget-password', 'BeLoginController@resetPassword');

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
	Route::any('/admin/change-password','BeUserController@changePasswordUser');

	Route::any('/admin/pages','BePageController@listPage');
	Route::any('/admin/create-page','BePageController@createPage');
	Route::get('/admin/edit-page/{id}','BePageController@editPage');
	Route::post('/admin/edit-page','BePageController@editPage');
	Route::get('/admin/delete-page/{id}','BePageController@deletePage');
	Route::get('/admin/status-page/{status}/{id}','BePageController@isEnablePage');

	Route::get('/admin/slideshows','BeSlideshowController@listSlideshow');
	Route::any('/admin/create-slideshow','BeSlideshowController@createSlideshow');
	Route::get('/admin/edit-slideshow/{id}','BeSlideshowController@editSlideshow');
	Route::post('/admin/edit-slideshow','BeSlideshowController@editSlideshow');
	Route::get('/admin/delete-slideshow/{id}','BeSlideshowController@deleteSlideshow');
	Route::get('/admin/status-slideshow/{id}/{status}','BeSlideshowController@isPublicSlideshow');

	Route::get('/admin/advertisements','BeAdvertisementController@listAdvertisement');
	Route::any('/admin/create-advertisement','BeAdvertisementController@createAdvertisement');
	Route::any('/admin/list-ads-positions/{id}','BeAdvertisementController@listAdvertisemntPositions');
	Route::get('/admin/edit-advertisement/{id}','BeAdvertisementController@editAvertisement');
	Route::post('/admin/delete-advertisement','BeAdvertisementController@deleteAdvertisement');
	Route::get('/admin/status-advertisement/{id}/{status}','BeAdvertisementController@isEnableAdvertisement');

	Route::get('/admin/categories','BeCategoryController@listCategory');
	Route::any('/admin/create-category','BeCategoryController@createCategory');
	Route::get('/admin/edit-category/{id}','BeCategoryController@editCategory');
	Route::post('/admin/edit-category','BeCategoryController@editCategory');
	Route::get('/admin/delete-category/{id}','BeCategoryController@deleteCategory');
	Route::get('/admin/status-category/{id}/{status}','BeCategoryController@isPublicCategory');

	Route::get('/admin/markets','BeMarketController@listMarket');
	Route::any('/admin/create-market','BeMarketController@createMarket');
	Route::get('/admin/edit-market/{id}','BeMarketController@editMarket');
	Route::post('/admin/edit-market','BeMarketController@editMarket');
	Route::get('/admin/delete-market/{id}','BeMarketController@deleteMarket');
	Route::get('/admin/list-district/{id}','BeMarketController@listingDistricts');

	Route::get('/admin/market/store/{store_name}/{id}','BeStoreController@listStore');
	Route::any('/admin/market/store/create/{store_name}/{id}','BeStoreController@createStore');
	Route::any('/admin/market/store/edit/{stor_id}/{store_name}/{id}','BeStoreController@editStore');
	Route::get('/admin/market/store/delete/{stor_id}/{store_name}/{id}','BeStoreController@deleteStore');
});

Route::any('/{lang}', 'FePageController@index');
Route::any('/', 'FePageController@index');
Route::any('/{lang}/search/{category_name}', 'FeSearchController@index');

