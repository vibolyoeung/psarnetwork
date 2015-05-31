<?php

class Product extends Eloquent{

	const TRANSFER_TYPE = 'constants.TABLE_NAME.PRODUCT_TRANSFER_TYPE';
	const  CONDITION = 'constants.TABLE_NAME.PRODUCT_CONDITION';
	const IS_PUBLISH = 1;
	const HOT_PROMOTION_PRODUCT = 5;
	const MONTHLY_PRODUCT = 4;
	const BUYER_PRODUCT = 2;
	const NEW_PRODUCT = 1;
	const SECOND_HAND_PRODUCT = 2;

	public static $PRODUCT_STATUS = array(
		1 => 'In Stock',
		2 => 'Out Of Stock',
		3 => 'In Development'
	);

	public static $PRODUCT_IS_PUBLISH = array(
		1 => 'Publish',
		0 => 'Unpublish'
	);

	/**
	 *
	 * listing all product transfer types
	 * @return array
	 * @access public
	 */
	public function findAllTransferType() {
		$response = new stdClass();
		$arr = array();
		try {
			$result = DB::table(Config::get(self::TRANSFER_TYPE))
			->select('*')
			->get();
			foreach ($result as $row){
				$arr[$row->ptt_id] = $row->name;
			}
			$response->data = $arr;
		} catch (\Exception $e) {
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

	/**
	 *
	 * listing all product conditions
	 * @return array
	 * @access public
	 */
	public function findAllCondition() {
		$response = new stdClass();
		$arr = array();
		try {
			$result = DB::table(Config::get(self::CONDITION))
			->select('*')
			->get();
			foreach ($result as $row){
				$arr[$row->id] = $row->name;
			}
			$response->data = $arr;
		} catch (\Exception $e) {
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

	/**
	 *
	 * fetchCategoryTree: this function using for list dropdown
	 * @param integer $parent: the parent id
	 * @param string $spacing:The space for indent child
	 * @param array $treeArray: the array tree for category
	 * @return array
	 * @access public
	 */
	public function fetchCategoryTree($parent = 0, $spacing = '', $treeArray = ''){
		try {
			if(!is_array($treeArray)){
				$treeArray = array();
			}
			$result = DB::table(Config::get('constants.TABLE_NAME.S_CATEGORY'))
				->select('id','m_title','is_publish','parent_id')
				->where('parent_id','=',$parent)
				->where('user_id', '=', Session::get('currentUserId'))
				->where('is_publish', '=', self::IS_PUBLISH)
				->orderBy('id','asc')
				->get();
			if(count($result) > 0){
				foreach ($result as $row) {
					$treeArray[] = array('id' => $row->id,'parent_id' => $row->parent_id, 'm_title' => $spacing . $row->m_title);
					$treeArray = self::fetchCategoryTree($row->id, $spacing . '&nbsp;&nbsp;',$treeArray);
				}
			}
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $treeArray;
	}

	/**
	 *Persist product informations
	 * 
	 * @param array $products
	 * @return int last id
	 * @access public
	 */
	public function persistToProduct($products) {
		$lastId = $result = DB::table(Config::get('constants.TABLE_NAME.PRODUCT'))
			->insertGetId($products);
		return $lastId;
	}

	/**
	 *Update product informations
	 * 
	 * @param array $products
	 * @access public
	 */
	public function updateToProduct($products, $productId) {
		$lastId = $result = DB::table(Config::get('constants.TABLE_NAME.PRODUCT'))
			->where('id', '=', $productId)
			->where('user_id', '=', Session::get('currentUserId'))
			->update($products);
		return $lastId;
	}

	/**
	 * List all products by current user
	 * 
	 * @param array $productInStore
	 * @return array products
	 * @access public
	 */
	public function findAll(){
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product .' AS p')
			->select('*')
			->where('p.user_id', '=', Session::get('currentUserId'))
			->where('p.store_id', '=', Store::findStoreByUser(Session::get('currentUserId')))
			->orderBy('p.id', 'DESC')
			->paginate(10);
	}

	/**
	 * renewProduct by product id
	 * 
	 * @param integer $product_id
	 * @return void
	 * @access public
	 */
	public function renewProduct($product_id) {
		$data = array(
			'top_up' => date('Y-m-d H:i:s')
		);
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product .' AS p')
			->where('p.id', '=', $product_id)
			->update($data);
	}

	/**
	 * Delete product by id
	 * 
	 * @param int $product_id
	 * @return void
	 * @access public
	 */
	public function deleteProductById($product_id){
		try{
			$destinationPathQuotation = base_path() . '/public/upload/quotation/';
			$destinationPath = base_path() . '/public/upload/product/';
			$destinationThumb = $destinationPath. 'thumb/';
			$product = Config::get('constants.TABLE_NAME.PRODUCT');
			$result = DB::table($product)
				->where('id', '=', $product_id)
				->where('user_id', '=', Session::get('currentUserId'))
				->first();
			if (!empty($result->file_quotation)) {
				File::delete($destinationPathQuotation . $result->file_quotation);
			}

			$fileName = json_decode($result->pictures, true);
			foreach ($fileName as $file) {
				if (!empty($file)) {
					File::delete($destinationPath . $file['pic']);
					File::delete($destinationThumb . $file['pic']);
				}
			}
			return DB::table($product)
				->where('id', '=', $product_id)
				->where('user_id', '=', Session::get('currentUserId'))
				->delete();
		} catch (\Exception $e){
			throw $e;
		}
		
	}

	/**
	 * Disable or Enable product by id
	 * 
	 * @param int $product_id
	 * @param boolean $is_publish
	 * @return void
	 * @access public
	 */
	public function isPublishProduct($product_id, $is_publish) {
		if($is_publish == 1) {
			$status = array('is_publish' => 0);
		} else {
			$status = array('is_publish' => 1);
		}

		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product)
			->where('id', '=', $product_id)
			->where('user_id', '=', Session::get('currentUserId'))
			->update($status);
	}

	/**
	 * Update product by id
	 * 
	 * @param int $product_id
	 * @return void
	 * @access public
	 */
	public function findProductById($product_id) {
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product)
			->where('id', '=', $product_id)
			->where('user_id', '=', Session::get('currentUserId'))
			->first();
	}

	/**
	 *
	 * find province by province id
	 *
	 * @param integer $provinceId
	 * @return array provinces
	 * @access public
	 */
	public static function findProvinceById($provinceId){
		$result = DB::table(Config::get('constants.TABLE_NAME.PROVINCE'))
			->select('province_id','province_name')
			->where('province_id', '=', $provinceId)
			->first();
		return $result->province_name;
	}

	/**
	 *
	 * find reservation products
	 *
	 * @return array reservation products
	 * @access public
	 */
	public function findReservationProducts() {
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product .' AS p')
			->select('*')
			->where('p.user_id', '=', Session::get('currentUserId'))
			->where('p.store_id', '=', Store::findStoreByUser(Session::get('currentUserId')))
			->where('p.publish_date', '>', date('d/m/Y'))
			->orderBy('p.id', 'DESC')
			->paginate(10);
	}

	/**
	 *
	 * find unpublic products
	 *
	 * @return array unpublic products
	 * @access public
	 */
	public function findUnpublicProducts() {
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product .' AS p')
			->select('*')
			->where('p.user_id', '=', Session::get('currentUserId'))
			->where('p.store_id', '=', Store::findStoreByUser(Session::get('currentUserId')))
			->where('p.is_publish', '=', 0)
			->orderBy('p.id', 'DESC')
			->paginate(10);
	}

	/**
	 *
	 * find license products
	 *
	 * @return array license products
	 * @access public
	 */
	public function findLicenseProducts() {
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product .' AS p')
			->select('*')
			->where('p.user_id', '=', Session::get('currentUserId'))
			->where('p.store_id', '=', Store::findStoreByUser(Session::get('currentUserId')))
			->where('p.point_to_view', '=', 1)
			->orderBy('p.id', 'DESC')
			->paginate(10);
	}


	/*This place for frontend */

	/**
	 *
	 * find hot-promotion products
	 *
	 * @return array hot promotion products
	 * @access public
	 */
	public static function findHotPromotionProducts() {
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product .' AS p')
			->select('*')
			->where('p.pro_transfer_type_id', '=', self::HOT_PROMOTION_PRODUCT)
			->where('p.is_publish', '=', self::IS_PUBLISH)
			->orderBy('p.id', 'DESC')
			->get();
	}

	/**
	 *
	 * find new products
	 *
	 * @return array new products
	 * @access public
	 */
	public static function findNewProducts() {
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product .' AS p')
			->select('*')
			->where('p.pro_condition_id', '=', self::NEW_PRODUCT)
			->where('p.is_publish', '=', self::IS_PUBLISH)
			->orderBy('p.id', 'DESC')
			->get();
	}

	/**
	 *
	 * find monthly  products
	 *
	 * @return array monthly products
	 * @access public
	 */
	public static function findMonthlyProducts() {
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product .' AS p')
			->select('*')
			->where('p.pro_transfer_type_id', '=', self::MONTHLY_PRODUCT)
			->where('p.is_publish', '=', self::IS_PUBLISH)
			->where('p.publish_date','>=',date("d/m/Y"))
			->orderBy('p.id', 'DESC')
			->get();
	}

	/**
	 *
	 * find buyer  products
	 *
	 * @return array buyer products
	 * @access public
	 */
	public static function findBuyerProducts() {
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product .' AS p')
			->select('*')
			->where('p.pro_transfer_type_id', '=', self::BUYER_PRODUCT)
			->where('p.is_publish', '=', self::IS_PUBLISH)
			->where('p.publish_date','>=',date("d/m/Y"))
			->orderBy('p.id', 'DESC')
			->get();
	}

	/**
	 *
	 * find Second Hand  products
	 *
	 * @return array second-handed products
	 * @access public
	 */
	public static function findSecondHandProducts() {
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product .' AS p')
			->select('*')
			->where('p.pro_condition_id', '=', self::SECOND_HAND_PRODUCT)
			->where('p.is_publish', '=', self::IS_PUBLISH)
			->where('p.publish_date','>=',date("d/m/Y"))
			->orderBy('p.id', 'DESC')
			->get();
	}

	/**
	 * findProductDetail by id
	 * 
	 * @param int $product_id
	 * @return product detail
	 * @access public
	 */
	public function findProductDetailById($product_id) {
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product)
			->where('id', '=', $product_id)
			->first();
	}

	/**
	 * findRelatedPostProduct
	 * 
	 * @param int $category id
	 * @return product that related post
	 * @access public
	 */
	public static function findRelatedPostProduct($category_id) {
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product)
			->where('s_category_id', '=', $category_id)
			->take(8)
			->get();
	}

	/**
	 * findPostProductByCategory
	 * 
	 * @param int $category id
	 * @return products by category
	 * @access public
	 */
	public function findPostProductByCategory($category_id) {
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product)
			->where('s_category_id', '=', $category_id)
			->get();
	}

	/**
	 * listAllProductsByOwnStore
	 * 
	 * @return products by Own store
	 * @access public
	 */
	public function listAllProductsByOwnStore() {
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product .' AS p')
			->select('*')
			->where('p.user_id', '=', Session::get('currentUserId'))
			->where('p.store_id', '=', Store::findStoreByUser(Session::get('currentUserId')))
			->orderBy('p.id', 'DESC')
			->paginate(10);
	}

	/**
	 * productDetailByOwnStore
	 * 
	 * @return products by Own store
	 * @access public
	 */
	public function productDetailByOwnStore($productId) {
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product .' AS p')
			->select('*')
			->where('p.user_id', '=', Session::get('currentUserId'))
			->where('p.store_id', '=', Store::findStoreByUser(Session::get('currentUserId')))
			->where('p.id', '=', $productId)
			->first();
	}
	
}
