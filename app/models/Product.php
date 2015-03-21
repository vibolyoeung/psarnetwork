<?php

class Product extends Eloquent{

	const TRANSFER_TYPE = 'constants.TABLE_NAME.PRODUCT_TRANSFER_TYPE';
	const  CONDITION = 'constants.TABLE_NAME.PRODUCT_CONDITION';
	const IS_PUBLISH = 1;

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
				->where('user_id', '=', 1)
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
			->paginate(10);
	}

	/**
	 * Delete product by id
	 * 
	 * @param int $product_id
	 * @return void
	 * @access public
	 */
	public function deleteProductById($product_id){
		$product = Config::get('constants.TABLE_NAME.PRODUCT');
		return DB::table($product)
			->where('id', '=', $product_id)
			->where('user_id', '=', Session::get('currentUserId'))
			->delete();
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
	
}
