<?php

class BeProductController extends BaseController {
	const PRODUCT_FREE_PAGE = 'backend.modules.product.list_products_free';
	const PRODUCT_PREMIUM_PAGE = 'backend.modules.product.list_products_premium';
	const FREE_USER_ACCOUNT = 1;
	const PREMIUM_USER_ACCOUNT = 2;
	
	public function listAllProductsFree()
	{
		$tblProduct = Config::get ('constants.TABLE_NAME.PRODUCT');
		$tblUser = Config::get ('constants.TABLE_NAME.USER');
		$products = DB::table($tblProduct .' AS pro')
			->join($tblUser .' AS u', 'u.id','=', 'pro.user_id')
			->where('account_type', self::FREE_USER_ACCOUNT)
			->orderBy('pro.id','desc')
			->paginate(10);
		return View::make(self::PRODUCT_FREE_PAGE)
			->with('products', $products);
	}

	public function listAllProductsPremium()
	{
		$tblProduct = Config::get ('constants.TABLE_NAME.PRODUCT');
		$tblUser = Config::get ('constants.TABLE_NAME.USER');
		$products = DB::table($tblProduct .' AS pro')
			->join($tblUser .' AS u', 'u.id','=', 'pro.user_id')
			->where('account_type', self::PREMIUM_USER_ACCOUNT)
			->orderBy('pro.id','desc')
			->paginate(10);
		return View::make(self::PRODUCT_PREMIUM_PAGE)
			->with('products', $products);
	}
}