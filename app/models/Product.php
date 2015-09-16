<?php
class Product extends Eloquent {
	const TRANSFER_TYPE = 'constants.TABLE_NAME.PRODUCT_TRANSFER_TYPE';
	const CONDITION = 'constants.TABLE_NAME.PRODUCT_CONDITION';
	const IS_PUBLISH = 1;
	const HOT_PROMOTION_PRODUCT = 5;
	const MONTHLY_PRODUCT = 4;
	const BUYER_PRODUCT = 2;
	const NEW_PRODUCT = 1;
	const SECOND_HAND_PRODUCT = 2;
	const PREMINUM = 2;
	const LIST_NUMBER = 20;
	public static $PRODUCT_STATUS = array (
			1 => 'In Stock',
			2 => 'Out Of Stock',
			3 => 'In Development' 
	);
	public static $PRODUCT_IS_PUBLISH = array (
			1 => 'Publish',
			0 => 'Unpublish' 
	);
	
	/**
	 *
	 * listing all product transfer types
	 *
	 * @return array
	 * @access public
	 */
	public function findAllTransferType() {
		$response = new stdClass ();
		$arr = array ();
		try {
			$result = DB::table ( Config::get ( self::TRANSFER_TYPE ) )->select ( '*' )->get ();
			foreach ( $result as $row ) {
				$arr [$row->ptt_id] = $row->{'name_'.Session::get('lang')};
			}
			$response->data = $arr;
		} catch ( \Exception $e ) {
			Log::error ( 'Message: ' . $e->getMessage () . ' File:' . $e->getFile () . ' Line' . $e->getLine () );
		}
		return $response;
	}
	
	/**
	 * listing all transer type
	 *
	 * @return array
	 * @access public
	 */
	public function listAllTransferType() {
		return $result = DB::table ( Config::get ( self::TRANSFER_TYPE ) )->select ( '*' )->get ();
	}
	
	/**
	 * list product condition
	 *
	 * @return array
	 * @access public
	 */
	public function listAllConditions() {
		return $result = DB::table ( Config::get ( self::CONDITION ) )->select ( '*' )->get ();
	}
	
	/**
	 *
	 * listing all product conditions
	 *
	 * @return array
	 * @access public
	 */
	public function findAllCondition() {
		$response = new stdClass ();
		try {
			$arr = array ();
			$result = DB::table ( Config::get ( self::CONDITION ) )->select ( '*' )->get ();
			foreach ( $result as $row ) {
				$arr [$row->id] = $row->{'name_'.Session::get('lang')};
			}
			$response->data = $arr;
		} catch ( \Exception $e ) {
			$response->data = array();
			Log::error ( 'Message: ' . $e->getMessage () . ' File:' . $e->getFile () . ' Line' . $e->getLine () );
		}
		return $response;
	}
	
	/**
	 *
	 * fetchCategoryTree: this function using for list dropdown
	 *
	 * @param integer $parent:
	 *        	the parent id
	 * @param string $spacing:The
	 *        	space for indent child
	 * @param array $treeArray:
	 *        	the array tree for category
	 * @return array
	 * @access public
	 */
	public function fetchCategoryTree($parent = 0, $spacing = '', $treeArray = '') {
		try {
			if (! is_array ( $treeArray )) {
				$treeArray = array ();
			}
			
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.S_CATEGORY' ) )->select ( '*' )->where ( 'parent_id', '=', $parent )->where ( 'user_id', '=', Session::get ( 'currentUserId' ) )->where ( 'is_publish', '=', self::IS_PUBLISH )->orderBy ( 'id', 'asc' )->get ();
			if (count ( $result ) > 0) {
				foreach ( $result as $row ) {
					$treeArray [] = array (
							'id' => $row->id,
							'parent_id' => $row->parent_id,
							'name_en' => $spacing . $row->name_en,
							'name_km' => $spacing . $row->name_km 
					);
					$treeArray = self::fetchCategoryTree ( $row->id, $spacing . '&nbsp;&nbsp;', $treeArray );
				}
			}
		} catch ( \Exception $e ) {
			Log::error ( 'Message: ' . $e->getMessage () . ' File:' . $e->getFile () . ' Line' . $e->getLine () );
		}
		return $treeArray;
	}
	
	/**
	 *
	 * fetchCategoryTree: this function using for list dropdown
	 *
	 * @param integer $parent:
	 *        	the parent id
	 * @param string $spacing:The
	 *        	space for indent child
	 * @param array $treeArray:
	 *        	the array tree for category
	 * @return array
	 * @access public
	 */
	public function getCategoryTree($userID, $parent=0,$level=0, $selected='') {
		$userMenus = "";
		try {
			$where = array (
					'is_publish' => 1,
					'user_id' => $userID,
					'parent_id' => $parent 
			);
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.S_CATEGORY' ) )->select ( '*' )->where ( $where )->get ();
			if (! empty ( $result )) {
				foreach ( $result as $userMenu ) {
					$select = '';
					// echo $userMenu->m_cat_id;die;
					if($selected == $userMenu->m_cat_id) {
						$select =' selected="selected"';
					}
					$userMenus .= "<option value='{$userMenu->m_cat_id}' {$select}>";
					$userMenus .= $userMenu->{'name_' . Session::get ( 'lang' )};
					
					// Run this function again (it would stop running when the mysql_num_result is 0
					$userMenus .= $this->menuShowNestedList ($userID, $userMenu->m_cat_id, $level + 1 , $selected);
					$userMenus .= "</option>\n";
				}
			}
			
			//$userMenus .= "</ol>\n";
		} catch ( \Exception $e ) {
			Log::error ( 'Message: ' . $e->getMessage () . ' File:' . $e->getFile () . ' Line' . $e->getLine () );
		}
		return $userMenus;
	}

	
	/**
	 * Get sub User category
	 * @method menuShowNestedList
	 * @return void
	 * @author Socheat Ngann
	 */
	public function menuShowNestedList($userID, $parent=0,$level=0, $selected='') {
		$response = new stdClass();
		try {
			$where = array(
					'is_publish' => 1,
					'user_id' => $userID,
					'parent_id' => $parent
			);
			$result = DB::table(Config::get('constants.TABLE_NAME.S_CATEGORY'))
			->select('*')
			->where($where)
			->get();
			$userMenus = "";
			//$userMenus .= "<ol class='dd-list' id='sub{$level}-{$parent}'>\n";
			if(!empty($result)) {
				foreach($result as $userMenu){
					$id_level = $level+1;
					$select = '';
					if($selected == $userMenu->m_cat_id) {
						$select =' selected="selected"';
					}
					$userMenus .= "<option value='{$userMenu->m_cat_id}' {$select}>";
					$userMenus .= str_repeat('&#8212;&nbsp;', $level) . $userMenu->{'name_'.Session::get('lang')};
	
					// Run this function again (it would stop running when the mysql_num_result is 0
					$userMenus .= $this->menuShowNestedList($userID, $userMenu->m_cat_id,$level+1,$selected);
					$userMenus .= "</option>\n";
				}
			}
			//$userMenus .= "</ol>\n";
			return $userMenus;
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return $response;
	}
	
	/**
	 * Persist product informations
	 *
	 * @param array $products        	
	 * @return int last id
	 * @access public
	 */
	public function persistToProduct($products) {
		$lastId = $result = DB::table ( Config::get ( 'constants.TABLE_NAME.PRODUCT' ) )->insertGetId ( $products );
		return $lastId;
	}
	
	/**
	 * Update product informations
	 *
	 * @param array $products        	
	 * @access public
	 */
	public function updateToProduct($products, $productId) {
		$lastId = $result = DB::table ( Config::get ( 'constants.TABLE_NAME.PRODUCT' ) )->where ( 'id', '=', $productId )->where ( 'user_id', '=', Session::get ( 'currentUserId' ) )->update ( $products );
		return $lastId;
	}
	
	/**
	 * List all products by current user
	 *
	 * @param array $productInStore        	
	 * @return array products
	 * @access public
	 */
	public function findAll() {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product . ' AS p' )->select ( '*' )->where ( 'p.user_id', '=', Session::get ( 'currentUserId' ) )->where ( 'p.store_id', '=', Store::findStoreByUser ( Session::get ( 'currentUserId' ) ) )->orderBy ( 'p.id', 'DESC' )->paginate ( 10 );
	}
	
	/**
	 * renewProduct by product id
	 *
	 * @param integer $product_id        	
	 * @return void
	 * @access public
	 */
	public function renewProduct($product_id) {
		$data = array (
			'top_up' => date( 'Y-m-d H:i:s' ) 
		);
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product . ' AS p' )->where ( 'p.id', '=', $product_id )->update ( $data );
	}
	
	/**
	 * Delete product by id
	 *
	 * @param int $product_id        	
	 * @return void
	 * @access public
	 */
	public function deleteProductById($product_id) {
		try {
			$destinationPathQuotation = base_path ()  . Config::get ( 'constants.DIR_IMAGE.DEFAULT' ).'quotation/';
			$destinationPath = base_path () . Config::get ( 'constants.DIR_IMAGE.DEFAULT' ). 'product/';
			$destinationThumb = $destinationPath . 'thumb/';
			$destinationPathPicSlideshow = $destinationPath.'/picslideshow/';
        	$destinationPathThumbSlideshow = $destinationPath.'/thumbslideshow/';

			$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
			$result = DB::table ( $product )->where ( 'id', '=', $product_id )->where ( 'user_id', '=', Session::get ( 'currentUserId' ) )->first ();
			if (! empty ( $result->file_quotation )) {
				File::delete ( $destinationPathQuotation . $result->file_quotation );
			}
			
			$fileName = json_decode ( $result->pictures, true );
			if (! empty ( $fileName )) {
			foreach ( $fileName as $file ) {
					if (File::exists ( $destinationPath . $file ['pic'] )) {
						File::delete ( $destinationPath . $file ['pic'] );
					}
					if (File::exists ( $destinationPathPicSlideshow . $file ['pic'] )) {
						File::delete ( $destinationPathPicSlideshow . $file ['pic'] );
					}
					if (File::exists ( $destinationPathThumbSlideshow . $file ['pic'] )) {
						File::delete ( $destinationPathThumbSlideshow . $file ['pic'] );
					}
				}
			}
			return DB::table ( $product )->where ( 'id', '=', $product_id )->where ( 'user_id', '=', Session::get ( 'currentUserId' ) )->delete ();
		} catch ( \Exception $e ) {
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
		if ($is_publish == 1) {
			$status = array (
					'is_publish' => 0 
			);
		} else {
			$status = array (
					'is_publish' => 1 
			);
		}
		
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product )->where ( 'id', '=', $product_id )->where ( 'user_id', '=', Session::get ( 'currentUserId' ) )->update ( $status );
	}
	
	/**
	 * Update product by id
	 *
	 * @param int $product_id        	
	 * @return void
	 * @access public
	 */
	public function findProductById($product_id) {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product )->where ( 'id', '=', $product_id )->where ( 'user_id', '=', Session::get ( 'currentUserId' ) )->first ();
	}
	/**
	 * Update product by id
	 *
	 * @param int $product_id
	 * @return void
	 * @access public
	 */
	public function findProductByCondition($where) {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product )->where ( $where )->where ( 'user_id', '=', Session::get ( 'currentUserId' ) )->get ();
	}	
	/**
	 *
	 * find province by province id
	 *
	 * @param integer $provinceId        	
	 * @return array provinces
	 * @access public
	 */
	public static function findProvinceById($provinceId) {
		$result = DB::table (Config::get ( 'constants.TABLE_NAME.PROVINCE' ) )
		->select ( 'province_id', 'province_name_en', 'province_name_km' )
		->where ( 'province_id', '=', $provinceId )->first ();
		
		return $result->{'province_name_'.Session::get('lang')};
	}
	
	/**
	 *
	 * find reservation products
	 *
	 * @return array reservation products
	 * @access public
	 */
	public function findReservationProducts() {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product . ' AS p' )->select ( '*' )->where ( 'p.user_id', '=', Session::get ( 'currentUserId' ) )->where ( 'p.store_id', '=', Store::findStoreByUser ( Session::get ( 'currentUserId' ) ) )->where ( 'p.publish_date', '>', date ( 'd/m/Y' ) )->orderBy ( 'p.id', 'DESC' )->paginate ( 10 );
	}
	
	/**
	 *
	 * find unpublic products
	 *
	 * @return array unpublic products
	 * @access public
	 */
	public function findUnpublicProducts() {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product . ' AS p' )->select ( '*' )->where ( 'p.user_id', '=', Session::get ( 'currentUserId' ) )->where ( 'p.store_id', '=', Store::findStoreByUser ( Session::get ( 'currentUserId' ) ) )->where ( 'p.is_publish', '=', 0 )->orderBy ( 'p.id', 'DESC' )->paginate ( 10 );
	}
	
	/**
	 *
	 * find license products
	 *
	 * @return array license products
	 * @access public
	 */
	public function findLicenseProducts() {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product . ' AS p' )->select ( '*' )->where ( 'p.user_id', '=', Session::get ( 'currentUserId' ) )->where ( 'p.store_id', '=', Store::findStoreByUser ( Session::get ( 'currentUserId' ) ) )->where ( 'p.point_to_view', '=', 1 )->orderBy ( 'p.id', 'DESC' )->paginate ( 10 );
	}
	
	/* This place for frontend */
	
	/**
	 *
	 * find hot-promotion products
	 *
	 * @return array hot promotion products
	 * @access public
	 */
	public static function findHotPromotionProducts() {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product . ' AS p' )->select ( '*' )->where ( 'p.pro_transfer_type_id', '=', self::HOT_PROMOTION_PRODUCT )->where ( 'p.is_publish', '=', self::IS_PUBLISH )->orderBy ( 'p.id', 'DESC' )->get ();
	}
	
	/**
	 *
	 * find new products
	 *
	 * @return array new products
	 * @access public
	 */
	public static function findNewProducts() {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product . ' AS p' )->select ( '*' )
		->where ( 'p.pro_condition_id', '=', self::NEW_PRODUCT )
		->where ( 'p.is_publish', '=', self::IS_PUBLISH )
		->where('p.publish_date','>=',date('Y-m-d'))
		->orderBy ( 'p.id', 'DESC' )->get ();
	}
	
	/**
	 *
	 * find monthly products
	 *
	 * @return array monthly products
	 * @access public
	 */
	public static function findMonthlyProducts() {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product . ' AS p' )->select ( '*' )->where ( 'p.pro_transfer_type_id', '=', self::MONTHLY_PRODUCT )->where ( 'p.is_publish', '=', self::IS_PUBLISH )->where ( 'p.publish_date', '>=', date ( "d/m/Y" ) )->orderBy ( 'p.id', 'DESC' )->get ();
	}
	
	/**
	 *
	 * find buyer products
	 *
	 * @return array buyer products
	 * @access public
	 */
	public static function findBuyerProducts() {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product . ' AS p' )->select ( '*' )->where ( 'p.pro_transfer_type_id', '=', self::BUYER_PRODUCT )->where ( 'p.is_publish', '=', self::IS_PUBLISH )->where ( 'p.publish_date', '>=', date ( "d/m/Y" ) )->orderBy ( 'p.id', 'DESC' )->get ();
	}
	
	/**
	 *
	 * find Second Hand products
	 *
	 * @return array second-handed products
	 * @access public
	 */
	public static function findSecondHandProducts() {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product . ' AS p' )->select ( '*' )->where ( 'p.pro_condition_id', '=', self::SECOND_HAND_PRODUCT )->where ( 'p.is_publish', '=', self::IS_PUBLISH )->where ( 'p.publish_date', '>=', date ( "d/m/Y" ) )->orderBy ( 'p.id', 'DESC' )->get ();
	}
	
	/**
	 * findProductDetail by id
	 *
	 * @param int $product_id        	
	 * @return product detail
	 * @access public
	 */
	public function findProductDetailById($product_id) {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		$productCondition = Config::get ( 'constants.TABLE_NAME.PRODUCT_CONDITION' );
		$productTransferType = Config::get('constants.TABLE_NAME.PRODUCT_TRANSFER_TYPE');
		$accountRole = Config::get ( 'constants.TABLE_NAME.ACCOUNT_ROLE' );
		$clientType = Config::get ( 'constants.TABLE_NAME.CLIENT_TYPE' );
		$store = Config::get ( 'constants.TABLE_NAME.STORE' );
		$user = Config::get ( 'constants.TABLE_NAME.USER' );
		return DB::table ( $product . ' AS p ' )->select (
			'p.title',
			'p.id',
			'st.title_en',
			'st.title_km',
			'p.pictures as pictures',
			'st.image',
			'p.pro_status',
			'p.price',
			'p.view',
			'p.created_date',
			'u.name as name',
			'u.address as address',
			'p.store_id as store_id',
			'p.description as description',
			'p.contact_info as contact_info',
			'p.file_quotation as file_quotation',
			'p.s_category_id as s_category_id',
			'proType.name_en as type_name_en',
			'proType.name_km as type_name_km',
			'pcon.name_en as pcon_name_en',
			'pcon.name_km as pcon_name_km',
			'role.rol_name_en as role_name_en',
			'role.rol_name_km as role_name_km',
			'cType.name_en as client_type_name_en',
			'cType.name_km as client_type_name_km'

		)->join (
			$store . ' AS st', 
			'st.id', '=', 'p.store_id'
		)->join (
			$productCondition . ' AS pcon', 
			'pcon.id', '=', 'p.pro_condition_id'
		)->join(
			$productTransferType . ' AS proType',
			'proType.ptt_id', '=', 'p.pro_transfer_type_id'
		)->join (
			$user . ' AS u',
			'u.id', '=', 'p.user_id'
		)->join (
			$accountRole . ' AS role',
			'u.account_role', '=', 'role.rol_id'
		)->join (
			$clientType . ' AS cType',
			'u.client_type', '=', 'cType.id'
		)->where ( 'p.id', '=', $product_id )->first ();
	}

	public static function getProductStatus($status) {
		return self::$PRODUCT_STATUS[$status];
	}

	/**
	 * findRelatedPostProduct
	 *
	 * @param int $category
	 *        	id
	 * @return product that related post
	 * @access public
	 */
	public static function findRelatedPostProduct($category_id) {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product )
		->where ( 's_category_id', '=', $category_id )
		->where('publish_date','<=',date('Y-m-d'))
		->take ( 8 )->get ();
	}
	
	/**
	 * Find preminum latest product
	 *
	 * @return Product
	 */
	public static function findPreminumLatest() {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		$user = Config::get ( 'constants.TABLE_NAME.USER' );
		
		return DB::table ( $product . ' AS p' )->select ( 'p.*' )->join ( 'user AS u', 'p.user_id', '=', 'u.id' )
		->where ( 'u.account_type', '=', self::PREMINUM )
		->where( 'p.publish_date','<=',date('Y-m-d'))
		->orderBy ( 'p.id', 'DESC' )->take ( 12 )->get ();
	}
	
	/**
	 * findPostProductByCategory
	 *
	 * @param int $category
	 *        	id
	 * @return products by category
	 * @access public
	 */
	public function findPostProductByCategory($category_id) {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		$product_in_category = Config::get ( 'constants.TABLE_NAME.PRODUCT_IN_CATEGORY' );
		
		return DB::table ( $product . ' AS p' )->select ( '*' )->join ($product_in_category.' AS pro', 'pro.product_id', '=', 'p.id' )
		->whereIn( 'pro.category_id',$category_id)
		->where( 'p.publish_date','>=',date('Y-m-d'))
		->groupby('pro.product_id')
		->orderBy ( 'p.id', 'DESC' )->get ();
	}
	
	/**
	 * findPostProductByCategory
	 *
	 * @param int $category
	 *        	id
	 * @return products by category
	 * @access public
	 *         @developer Socheat Ngann
	 */
	public function findProductByCategory($store, $idArr) {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		$productRelated = Config::get ( 'constants.TABLE_NAME.PRODUCT_IN_CATEGORY' );
		return DB::table ( $product )
		->leftJoin($productRelated, $product.'.id', '=', $productRelated.'.product_id')
		->whereIn ( $productRelated.'.category_id', $idArr )
		->where ( 'store_id', '=', $store )
		->groupBy($product.'.id')
		->orderBy ( 'id', 'DESC' )
		->paginate ( 10 );
	}
	
	/**
	 * listAllProductsByOwnStore
	 *
	 * @return products by Own store
	 * @access public
	 */
	public function listAllProductsByOwnStore($where = array()) {
		if (! empty ( $where )) {
			$where = $where;
		} else {
			$where = array (
					'user_id' => Session::get ( 'currentUserId' ) 
			);
		}
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product )->select ( '*' )->where ( $where )->orderBy ( 'id', 'DESC' )->paginate ( 10 );
	}
	
	/**
	 * productDetailByOwnStore
	 *
	 * @return products by Own store
	 * @access public
	 */
	public function productDetailByOwnStore($productId, $userID) {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product . ' AS p' )->select ( '*' )->where ( 'p.user_id', '=', $userID )->where ( 'p.id', '=', $productId )->first ();
	}
	
	/**
	 * Find product by location, type and keyword
	 *
	 * @param string $keyword        	
	 * @param int $province        	
	 * @param int $businessType        	
	 *
	 * @return array $products
	 */
	public function searchProducts($keyword = '', $province, $businessType) {
		$usersId = $this->findUserByProvince ( $province );
		
		switch (( int ) $businessType) {
			case 1 :
				return $this->searchByProduct ( $usersId, $keyword );
			
			case 2 :
				return $this->searchByBuyer ( $usersId, $keyword );
			
			case 3 :
				return $this->searchBySuppliers ( $usersId, $keyword );
			
			default :
				return;
		}
	}
	
	/**
	 * Find product by location, type and keyword
	 *
	 * @param int $province        	
	 * @param int $transferType        	
	 * @param int $condition        	
	 * @param int $price        	
	 * @param string $date        	
	 * @param int $displayNumber        	
	 *
	 * @return array $products
	 */
	public function searchProductFromCategory($location, $transferType, $condition, $price, $date, $displayNumber = null) {
		$productTable = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		
		if (( int ) $location === 0) {
			$query = DB::table ( $productTable . ' AS p' );
			$query->select ( '*' );
			$query->where ( 'p.is_publish', '=', self::IS_PUBLISH );
			if (( int ) $transferType !== 0) {
				$query->where ( 'p.pro_transfer_type_id', '=', ( int ) $transferType );
			}
			if (( int ) $condition !== 0) {
				$query->where ( 'p.pro_condition_id', '=', ( int ) $condition );
			}
			if (! empty ( $date )) {
				$query->where ( 'p.publish_date', '=', $date );
			}
			if (! empty ( $price )) {
				$query->where ( 'p.price', '=', $price );
			}
			$query->orderBy ( 'p.id', 'DESC' );
			
			$limitNumber = self::LIST_NUMBER;
			if ($displayNumber !== null) {
				$limitNumber = $displayNumber;
			}
			
			return $query->paginate ( $limitNumber );
		}
		
		return $products;
		
		$usersId = $this->findUserByProvince ( $province );
		
		foreach ( $usersId as $userId ) {
			$query = DB::table ( $productTable . ' AS p' );
			$query->select ( '*' );
			$query->where ( 'p.user_id', '=', ( int ) $userId );
			$query->where ( 'p.is_publish', '=', self::IS_PUBLISH );
			if (( int ) $transferType !== 0) {
				$query->where ( 'p.pro_transfer_type_id', '=', ( int ) $transferType );
			}
			if (( int ) $condition !== 0) {
				$query->where ( 'p.pro_condition_id', '=', ( int ) $condition );
			}
			if (! empty ( $date )) {
				$query->where ( 'p.publish_date', '=', $date );
			}
			if (! empty ( $price )) {
				$query->where ( 'p.price', '=', $price );
			}
			$query->orderBy ( 'p.id', 'DESC' );
			
			$data = $query->get ();
			
			if (! empty ( $data )) {
				$products = $data;
			}
		}
		
		return $products;
	}
	
	/**
	 * Get user by province and bussiness type
	 *
	 * @param int $province        	
	 *
	 * @return array $usersId
	 */
	private function findUserByProvince($province) {
		$userTable = Config::get ( 'constants.TABLE_NAME.USER' );
		
		$usersExcludeProvince = DB::table ( $userTable . ' AS u' )->select ( '*' )->get ();
		
		$usersId = [ ];
		
		foreach ( $usersExcludeProvince as $userExcludeProvince ) {
			$arrayProvinces = json_decode ( $userExcludeProvince->address, true );
			
			if (( int ) $province === 0) {
				$userId [] = $userExcludeProvince->id;
			} else {
				if (( int ) $arrayProvinces ['province'] === ( int ) $province) {
					$usersId [] = $userExcludeProvince->id;
				}
			}
		}
		
		return $usersId;
	}
	public function searchByProduct($usersId, $keyword) {
		$productTable = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		$products = [ ];
		
		foreach ( $usersId as $userId ) {
			
			$data = DB::table ( $productTable . ' AS p' )->select ( '*' )->where ( 'p.user_id', '=', ( int ) $userId )->where ( 'p.is_publish', '=', self::IS_PUBLISH )->where ( function ($query) use($keyword) {
				$query->orWhere ( 'p.title', 'LIKE', '%' . $keyword . '%' )->orWhere ( 'p.description', 'LIKE', '%' . $keyword . '%' );
			} )->orderBy ( 'p.id', 'DESC' )->get ();
			
			if (! empty ( $data )) {
				$products = $data;
			}
		}
		
		return $products;
	}
	public function searchByBuyer($usersId, $keyword) {
		$productTable = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		$products = [ ];
		
		if ($keyword === '' && empty ( $usersId )) {
			$data = DB::table ( $productTable . ' AS p' )->select ( '*' )->where ( 'p.is_publish', '=', self::IS_PUBLISH )->where ( 'p.pro_transfer_type_id', '=', self::BUYER_PRODUCT )->orderBy ( 'p.id', 'DESC' )->get ();
			
			return $data;
		}
		
		foreach ( $usersId as $userId ) {
			
			$data = DB::table ( $productTable . ' AS p' )->select ( '*' )->where ( 'p.user_id', '=', ( int ) $userId )->where ( 'p.is_publish', '=', self::IS_PUBLISH )->where ( 'p.pro_transfer_type_id', '=', self::BUYER_PRODUCT )->where ( function ($query) use($keyword) {
				$query->orWhere ( 'p.title', 'LIKE', '%' . $keyword . '%' )->orWhere ( 'p.description', 'LIKE', '%' . $keyword . '%' );
			} )->orderBy ( 'p.id', 'DESC' )->get ();
			
			if (! empty ( $data )) {
				$products = $data;
			}
		}
		
		return $products;
	}
	public function searchBySuppliers($usersId, $keyword) {
		$productTable = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		$userTable = Config::get ( 'constants.TABLE_NAME.USER' );
		$accountRoleTable = Config::get ( 'constants.TABLE_NAME.ACCOUNT_ROLE' );
		$products = [ ];
		
		if ($keyword === '' && empty ( $usersId )) {
			$data = DB::table ( $productTable . ' AS p' )->join ( $userTable . ' AS u', 'u.id', '=', 'p.user_id' )->join ( $accountRoleTable . ' AS ar', 'ar.rol_id', '=', 'u.account_role' )->select ( '*' )->where ( 'p.is_publish', '=', self::IS_PUBLISH )->where ( 'p.pro_transfer_type_id', '=', self::BUYER_PRODUCT )->orderBy ( 'p.id', 'DESC' )->get ();
			
			return $data;
		}
		


		foreach ( $usersId as $userId ) {
			$data = DB::table ( $productTable . ' AS p' )->join ( $userTable . ' AS u', 'u.id', '=', 'p.user_id' )->join ( $accountRoleTable . ' AS ar', 'ar.rol_id', '=', 'u.account_role' )->select ( '*' )->where ( 'p.user_id', '=', ( int ) $userId )->where ( 'p.is_publish', '=', self::IS_PUBLISH )->where ( 'p.pro_transfer_type_id', '=', self::BUYER_PRODUCT )->where ( function ($query) use($keyword) {
				$query->orWhere ( 'p.title', 'LIKE', '%' . $keyword . '%' )->orWhere ( 'p.description', 'LIKE', '%' . $keyword . '%' );
			} )->orderBy ( 'p.id', 'DESC' )->get ();
			
			if (! empty ( $data )) {
				$products = $data;
			}
		}
	}

	public static function productPosttoday(){
		return DB::table ( Config::get ( 'constants.TABLE_NAME.PRODUCT' ))->where('publish_date','=',date('Y-m-d'))->get ();
	}

	public static function countViewOfUserClickProduct($product_id) {
		$oldViewCount = self::findCountViewOfUserClick($product_id);
		$totalView = 1 + $oldViewCount;
		$data = array(
			'view' => $totalView 
		);

		return DB::table ( Config::get ( 'constants.TABLE_NAME.PRODUCT' ))
			->where('id', $product_id)
			->update($data);
	}

	public static function findCountViewOfUserClick($product_id) {
		try{
			$oldViewCount = DB::table ( Config::get ( 'constants.TABLE_NAME.PRODUCT' ))
			->select('view')
			->where('id', $product_id)
			->first ();
		$totalView = $oldViewCount->view;
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		//return $totalView;
	}

	public function findProductByTransfterType($id){
		return DB::table ( Config::get ( 'constants.TABLE_NAME.PRODUCT' ))->where('pro_transfer_type_id','=',$id)->get ();
	}


	public function findProductByAccountRole($id){
    	try {
			$results = DB::table(Config::get('constants.TABLE_NAME.USER'))
			->select('*')
			->where('account_role','=',$id)
			->get();

			$accountrole = array();
			foreach($results as $results){
				array_push($accountrole,$results->id);
			}

			$countpro = DB::table(Config::get('constants.TABLE_NAME.PRODUCT'))
			->select('*')
			->whereIn('user_id',$accountrole)
			->get();
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return $countpro;
	}
}
