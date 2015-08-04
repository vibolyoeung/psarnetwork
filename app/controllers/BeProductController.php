<?php

class BeProductController extends BaseController {
	const PRODUCT_FREE_PAGE = 'backend.modules.product.list_products_free';
	const PRODUCT_PREMIUM_PAGE = 'backend.modules.product.list_products_premium';
	const FREE_USER_ACCOUNT = 1;
	const PREMIUM_USER_ACCOUNT = 2;
	const DISABLE_STATUS = 0;
	const ENABLE_STATUS = 1;
	
	public function listAllProductsFree()
	{
		$tblProduct = Config::get ('constants.TABLE_NAME.PRODUCT');
		$tblUser = Config::get ('constants.TABLE_NAME.USER');
		$products = DB::table($tblProduct .' AS pro')
			->join($tblUser .' AS u', 'u.id','=', 'pro.user_id')
			->select(DB::raw('pro.id as pro_id, pro.*, u.*'))
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
			->select(DB::raw('pro.id as pro_id, pro.*, u.*'))
			->where('account_type', self::PREMIUM_USER_ACCOUNT)
			->orderBy('pro.id','desc')
			->paginate(10);
		return View::make(self::PRODUCT_PREMIUM_PAGE)
			->with('products', $products);
	}

	public function disableAndEnableProduct($page, $productid, $status)
	{
		if ($status == 2) {
			$this->statusOperation($productid, self::DISABLE_STATUS);
		}

		if ($status == 1) {
			$this->statusOperation($productid, self::ENABLE_STATUS);
		}
		$redirectPage = ($page === 'free') ? 'admin/products/free' : 'admin/products/premium';
		
		return Redirect::to($redirectPage)
			->with('SMG_SUCCESS','Data has been saved successfully!'); 
	}

	public function deleteProduct($page, $productid)
	{
		$tblProduct = Config::get ('constants.TABLE_NAME.PRODUCT');
		$product = DB::table($tblProduct.' AS pro')
			->where('id', '=', $productid)
			->select(DB::raw('pro.id as pro_id, pro.*'))
			->first();
		$pictures = json_decode($product->pictures, true);
		$this->deletePictures($pictures);
		$this->deleteOperation($productid);

		$redirectPage = ($page === 'free') ? 'admin/products/free' : 'admin/products/premium';
		return Redirect::to($redirectPage)
			->with('SMG_SUCCESS','Record has been deleted successfully!'); 
	}

	private function statusOperation($productid, $status)
	{
		$tblProduct = Config::get ('constants.TABLE_NAME.PRODUCT');
		$products = DB::table($tblProduct)
			->where('id', '=', $productid)
			->update(array('admin_status' => $status));
	}

	private function deleteOperation($productid)
	{
		$tblProduct = Config::get ('constants.TABLE_NAME.PRODUCT');
		$products = DB::table($tblProduct)
			->where('id', '=', $productid)
			->delete();
	}

	private function deletePictures($pictures)
	{
		if (!empty($pictures)) {
			$destinationPath = base_path() . '/public/upload/product/';
	        $destinationThumb = $destinationPath.'thumb/';
			foreach ($pictures as $file) {
				if (!empty($file)) {
					File::delete($destinationPath . $file['pic']);
					File::delete($destinationThumb . $file['pic']);
				}
			}
		}
	}
}