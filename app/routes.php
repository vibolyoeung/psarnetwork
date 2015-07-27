<?php
/*
|-------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/admin', 'BeLoginController@showLogin');
Route::post('/admin/login', 'BeLoginController@doLogin');
Route::get('/admin/send-forget-password', 'BeLoginController@sendResetPassword');
Route::post('/admin/send-forget-password', 'BeLoginController@sendResetPassword');
Route::get('/admin/forget-password', 'BeLoginController@resetPassword');

Route::group(array('before' => 'auth'), function () {
    Route::get('/admin/user-role-play','BeUserRolePlayController@listUserRolePlay');
    Route::any('/admin/user-role-play/edit/{role_id}','BeUserRolePlayController@editUserRolePlay');
    Route::get('/admin/dashboard', 'BeLoginController@dashboard'); 
    Route::get('/admin/logout','BeLoginController@doLogout'); 
    Route::get('/admin/users',
        'BeUserController@listUser');
     Route::get('/admin/users/clients',
        'BeUserController@listClientUser');
         Route::any('/admin/create',
        'BeUserController@createUser'); Route::get('/admin/edit/{id}',
        'BeUserController@editUser'); Route::post('/admin/edit/',
        'BeUserController@editUser'); Route::any('/admin/delete/{id}',
        'BeUserController@deleteUser');
        Route::get('/admin/delete/client/{id}',
        'BeUserController@deleteClientUser'); Route::get('/admin/status/{status}/{id}/{route?}',
        'BeUserController@changeStatusUser'); Route::any('/admin/profile',
        'BeUserController@updateProfileUser'); Route::any('/admin/change-password',
        'BeUserController@changePasswordUser'); Route::any('/admin/users/filter-user',
        'BeUserController@filterUsers'); Route::get('/admin/user-group',
        'BeUserGroupController@listUserGroup'); Route::any('/admin/user-group-add',
        'BeUserGroupController@addUserGroup'); Route::any('/admin/user-group-edit/{id}',
        'BeUserGroupController@editUserGroup'); Route::post('/admin/user-group-edit',
        'BeUserGroupController@editUserGroup'); Route::get('/admin/user-group-delete/{id}',
        'BeUserGroupController@deleteUserGroup'); Route::get('/admin/client-user-type',
        'BeClientUserTypeController@listClientUserType'); Route::get('/admin/client-user-type-edit/{id}',
        'BeClientUserTypeController@editClientUserType'); Route::post('/admin/client-user-type-edit',
        'BeClientUserTypeController@editClientUserType'); Route::get('/admin/deny-permisson-page',
        'BeDenyPermissionPageController@denyPermissionPage'); Route::any('/admin/pages',
        'BePageController@listPage'); Route::any('/admin/create-page/{belong_to?}',
        'BePageController@createPage'); Route::get('/admin/edit-page/{id}/{belong_to?}',
        'BePageController@editPage'); Route::post('/admin/edit-page',
        'BePageController@editPage'); Route::get('/admin/delete-page/{id}',
        'BePageController@deletePage'); Route::get('/admin/status-page/{status}/{id}',
        'BePageController@isEnablePage'); Route::get('/admin/slideshows',
        'BeSlideshowController@listSlideshow'); Route::any('/admin/create-slideshow',
        'BeSlideshowController@createSlideshow'); Route::get('/admin/edit-slideshow/{id}',
        'BeSlideshowController@editSlideshow'); Route::post('/admin/edit-slideshow',
        'BeSlideshowController@editSlideshow'); Route::get('/admin/delete-slideshow/{id}',
        'BeSlideshowController@deleteSlideshow'); Route::get('/admin/status-slideshow/{id}/{status}',
        'BeSlideshowController@isPublicSlideshow'); Route::get('/admin/advertisements',
        'BeAdvertisementController@listAdvertisement'); Route::any('/admin/create-advertisement',
        'BeAdvertisementController@createAdvertisement'); Route::any('/admin/list-ads-positions/{id}',
        'BeAdvertisementController@listAdvertisemntPositions'); Route::any('/admin/list-ads-pages/{id}',
        'BeAdvertisementController@listAdvertisemntPage'); Route::get('/admin/list-user',
        'BeAdvertisementController@listUserInfo'); Route::get('/admin/list-user-admin',
        'BeAdvertisementController@listUserAdminInfo'); Route::post('/admin/edit-advertisement',
        'BeAdvertisementController@editAvertisement'); Route::any('/admin/edit-advertisement/{id}',
        'BeAdvertisementController@editAvertisement'); Route::get('/admin/delete-advertisement/{id}',
        'BeAdvertisementController@deleteAdvertisement'); Route::get('/admin/status-advertisement/{id}/{status}',
        'BeAdvertisementController@isEnableAdvertisement'); Route::get('/admin/categories',
        'BeCategoryController@listCategory'); Route::any('/admin/create-category',
        'BeCategoryController@createCategory'); Route::get('/admin/edit-category/{id}',
        'BeCategoryController@editCategory'); Route::post('/admin/edit-category',
        'BeCategoryController@editCategory'); Route::get('/admin/delete-category/{id}',
        'BeCategoryController@deleteCategory'); Route::get('/admin/status-category/{id}/{status}',
        'BeCategoryController@isPublicCategory'); Route::get('/admin/filter_category',
        'BeCategoryController@filterCategory'); Route::get('/admin/markets',
        'BeMarketController@listMarket'); Route::any('/admin/create-market',
        'BeMarketController@createMarket'); Route::get('/admin/edit-market/{id}',
        'BeMarketController@editMarket'); Route::post('/admin/edit-market',
        'BeMarketController@editMarket'); Route::get('/admin/delete-market/{id}',
        'BeMarketController@deleteMarket'); Route::get('/admin/list-district/{id}',
        'BeMarketController@listingDistricts'); Route::get('/admin/filter-market',
        'BeMarketController@filterMarket'); Route::get('/admin/back-end-setting',
        'BeSettingController@backEndSettingAction'); Route::any('/admin/setting-add-permission-name',
        'BeSettingController@addPermissionAction'); Route::get('/admin/setting-delete-permission-name/{id}',
        'BeSettingController@deletePermissionAction'); Route::any('/admin/setting-add-slideshow',
        'BeSettingController@addSettingSlideShow'); Route::get('/admin/front-end-setting',
        'BeSettingController@frontEndSettingAction'); 
        Route::any('/admin/front-end-setting/view-mode', 'BeSettingController@frontEndViewModeAction');Route::get('/admin/location-setting',
        'BeSettingController@listLocation'); Route::get('/admin/district-setting/{province_id}',
        'BeSettingController@listDistrict'); Route::any('/admin/province/add',
        'BeSettingController@addProvince'); Route::any('/admin/province/edit/{province_id}',
        'BeSettingController@editProvince'); Route::any('/admin/district/edit/{district_id}/{province_id}',
        'BeSettingController@editDistrict'); Route::any('/admin/district/add/{province_id}',
        'BeSettingController@addDistrict'); Route::any('/admin/product-condition',
        'BeSettingController@loadProductConditionList'); Route::any('/admin/product-condition/edit/{id}',
        'BeSettingController@loadProductConditionEdit'); Route::any('/admin/product-transfer-type/',
        'BeSettingController@loadProductTransferType'); Route::any('/admin/product-transfer-type/edit/{id}',
        'BeSettingController@loadProductTransferTypeEdit'); }
);

//=============Routes for front end page==============

Route::any('/', 'FePageController@index');
Route::any('/page/{store}', 'FeStoreController@index');
Route::any('/page/{store}/search/{label}', 'FeStoreController@searchUserPropuctByCategory');
Route::any('/page/{store}/p/{page_id}', 'FeStoreController@getUserPage');
Route::any('/page/{store}/my/detail/{product_id}', 'FeStoreController@myDetail');
Route::any('/{lang}/user/signin', 'FeUserController@signIn');
Route::any('/{lang}/user/signup', 'FeUserController@signUp');

Route::get('/{lang}/search', 'FeSearchController@search');
Route::get('/search', 'FeSearchController@search');
Route::get('/{lang}/search/products', 'FeSearchController@searchProduct');
Route::get('/search/products', 'FeSearchController@searchProduct');

/*for detail page*/
Route::any('/{lang}/pro/{y}/{m}/{d}/{product_name}/{pro_id}',
    'FeDetailController@index');
Route::any('/pro/{y}/{m}/{d}/{product_name}/{pro_id}',
    'FeDetailController@index');
Route::any('/pro/{lang}/{product_name}/{pro_id}', 'FeDetailController@index');
Route::any('/pro/{product_name}/{pro_id}', 'FeDetailController@index');

/*for member page*/
Route::group(array('prefix' => 'member'), function () {
	Route::any('/logout', 'FeMemberController@getSignOut');
	Route::any('/login', 'FeMemberController@index');
	Route::any('/register','FeMemberController@register'); 
	Route::any('/getdistrict','FeMemberController@getDistric');
	Route::any('/getmarkettype/{id}','FeMemberController@getMarketType');
	Route::any('/agreement/{usertype}','FeMemberController@agreement');
});

Route::group(array('before' => 'auth_member'), function () {
    Route::group(array('prefix' => 'member'), function () {
        /*regirst page*/ 
        Route::any('/userinfo/{step}','FeMemberController@userinfo');
        Route::any('/addmenuajax','FeMemberController@addmenuajax'); 
        Route::any('/ajaxupload','FeMemberController@ajaxupload'); 
        Route::any('/getsubmenu','FeMemberController@getsubmenu');
        Route::any('/toolview','FeMemberController@toolview');
        Route::any('/slideshow','FeMemberController@slideshow');
    }); 
    /*for product*/
    Route::group(array('prefix' => 'products'), function () {
        Route::any('/list/{list_type?}', 'FeProductController@listAllProducts'); 
        Route::any('/create','FeProductController@addProduct'); 
        Route::any('/ispublished/{product_id}/{is_publish}', 'FeProductController@isPublishProduct');
        Route::any('/delete/{product_id}', 'FeProductController@deleteProduct');
        Route::any('/edit/{product_id}', 'FeProductController@editProduct');
        Route::any('/topup/{product_id}', 'FeProductController@topUpProduct');
        }
    );
});

Route::any('products/productbycategories/{cateID}/{id}',
            'FePageController@getProductbyCategory'); 

/*===========Product Details==*/
Route::group(array('prefix' => 'product'), function () {
	Route::any('/list/{ID}', 'FePageController@listSuppermarket'); 
    Route::any('/details/{id}', 'FePageController@getProductDetials');
    Route::any('/js_detail/{product_id}', 'FePageController@popupDetailProduct');
	Route::any('/findRelatedProducts/{category_id}', 'FePageController@findRelatedProducts');
} );
// [your site path]/app/routes.php

Route::any('/doeun/k', 'FeMemberController@test');
