<?php
// file : app/config/constants.php
return array (
		'SUPER_ADMINISTRATOR' => 1,
		'GoogleAnalytics' => array(
				'email' => "698385122092-fnj9lbbsa3ep5d64dhh1qsucq2u0j2j6@developer.gserviceaccount.com",
				'oauthkeyfile' => "Project-6247018c782f.p12", // please check in \app\library
				'profileDd' => 75180249, //In Google Analytics *Administration > User Management*, give the service account 'Read and Analyse' permissions on the analytics accounts you want to access
		),
		'ADMINISTRATOR' => 2,
		'ADMIN' => 3,
		'BACKEND_PAGINATION_USER' => 10,
		'BACKEND_PAGINATION_PAGE' => 10,
		'BACKEND_PAGINATION_SLIDESHOW' => 10,
		'BACKEND_PAGINATION_AVERTISEMENT' => 10,
		'BACKEND_PAGINATION_STORE' => 10,
		'SLIDESHOW_RESIZE_WIDTH' => 100,
		'SLIDESHOW_RESIZE_HEGHT' => 100,
		'ADVERTISEMENT_RESIZE_WIDTH' => 100,
		'ADVERTISEMENT_RESIZE_HEGHT' => 100,
		'BACKEND_PAGINATION_MARKET' => 10,
		'MARKET_RESIZE_HEGHT' => 100,
		'MARKET_RESIZE_WIDTH' => 100,
		'STORE_RESIZE_WIDTH' => 100,
		'STORE_RESIZE_HEGHT' => 100,
		'USER_GROUP_PAGINATION' => 10,
		'HOMESHOP' => 'Homeshop',
		'PRIVATE_COMPANY' => 'Private company',
		'TRADITIONAL_MARKET' => 'Traditional Market',
		'SUPERMARKET' => 'Supermarket',
		'CLIENT_USER' => 4,
		'CLIENT_TYPE_ID' => array (
				'INDIVIDUAL' => 1,
				'HOMESHOP' => 2 
		),
		'DIR_IMAGE' => array (
				'ALLOW_FILE' => 'mimes:jpeg,png,bmp,gif|image',
				'THUMB_WIDTH' => 100,
				'THUMB_HEIGTH' => 100,
				'DEFAULT' => '/public/upload/',
				'DIR_DEFAULT' => '/public/upload/images/',
				'DIR_STORE' => '/public/upload/store/',
				'USER_BANNER' => '/public/upload/user-banner/' 
		),
		'TABLE_NAME' => array (
				'ACCOUNT_TYPE' => 'account_type',
				'ADV_PAGE' => 'adv_page',
				'ADV_CAT_PAGE' => 'category_adv_position',
				'ADV_CAT_PAGE_POSITION_MM' => 'cat_page_position_mm',
				'ADV_POSITION' => 'adv_position',
				'ADV_PAGE_POSITION_MM' => 'adv_page_position_mm',
				'ADVERTISEMENT' => 'advertisement',
				'LICENSE' => 'license',
				'PAYMENT_METHOD' => 'payment_method',
				'ADVERTISER_PROFILE' => 'advertiser_profile',
				'CLIENT_TYPE' => 'client_type',
				'COUNTER' => 'counter',
				'DISTRICT' => 'district',
				'IMAGE' => 'image',
				'LAYOUT' => 'layout',
				'M_CATEGORY' => 'm_category',
				'M_PAGE' => 'm_page',
				'MARKET' => 'market',
				'PRODUCT' => 'product',
				'PRODUCT_IN_STORE' => 'product_in_store',
				'PRODUCT_CONDITION' => 'product_condiction',
				'PROVINCE' => 'province',
				'S_CATEGORY' => 's_category',
				'S_PAGE' => 's_page',
				'SETTING' => 'setting',
				'SLIDESHOW' => 'slideshow',
				'STORE' => 'store',
				'TEMPLATE' => 'template',
				'USER' => 'user',
				'USER_TYPE' => 'user_type',
				'USER_BANNER' => 'user_banner',
				'PERMISSION' => 'permission',
				'PRODUCT_TRANSFER_TYPE' => 'product_transfer_type',
				'ACCOUNT_ROLE' => 'account_role' 
		),
		'LAYOUT' => array (
				0 => array (
						'stylesheet' => 'main-layout-user-a.css',
						'color' => '#3498db',
						'name' => trans('register.TAB_Layout_a') 
				),
				1 => array (
						'stylesheet' => 'main-layout-user-b.css',
						'color' => '#2980b9',
						'name' => trans('register.TAB_Layout_b')
				),
				2 => array (
						'stylesheet' => 'main-layout-user-c.css',
						'color' => '#2ecc71',
						'name' => trans('register.TAB_Layout_c')
				),
				3 => array (
						'stylesheet' => 'main-layout-user-d.css',
						'color' => '#FFA500',
						'name' => trans('register.TAB_Layout_d')
				),
				4 => array (
						'stylesheet' => 'main-layout-user-e.css',
						'color' => '#FFFF33',
						'name' => trans('register.TAB_Layout_e')
				),
				5 => array (
						'stylesheet' => 'main-layout-user-f.css',
						'color' => '#CCCC00',
						'name' => trans('register.TAB_Layout_f')
				),
				6 => array (
						'stylesheet' => 'main-layout-user-g.css',
						'color' => '#e74c3c',
						'name' => trans('register.TAB_Layout_g')
				),
				7 => array (
						'stylesheet' => 'main-layout-user-h.css',
						'color' => '#808080',
						'name' => trans('register.TAB_Layout_h')
				),
				8 => array (
						'stylesheet' => 'main-layout-user-i.css',
						'color' => '#F52887',
						'name' => trans('register.TAB_Layout_i')
				),
				9 => array (
						'stylesheet' => 'main-layout-user-j.css',
						'color' => '#800080',
						'name' => trans('register.TAB_Layout_j')
				)
		) 
);