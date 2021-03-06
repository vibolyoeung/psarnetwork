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
	const LATEST_PRODUCT_SETTING = 2;
	const BUYER_REQUEST_SETTING = 4;
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
	 * @param array $treeArray:de
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
		return DB::table ( $product . ' AS p' )->select ( '*' )
		->where ( 'p.user_id', '=', Session::get ( 'currentUserId' ) )
		->where ( 'p.store_id', '=', Store::findStoreByUser ( Session::get ( 'currentUserId' ) ) )
		->orderBy ( 'p.publish_date', 'DESC' )
		->paginate ( 10 );
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
			'publish_date' => date( 'Y-m-d H:i:s' )
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
		return DB::table ( $product . ' AS p' )->select ( '*' )
		->where ( 'p.pro_transfer_type_id', '=', self::HOT_PROMOTION_PRODUCT )
		->where('p.publish_date','<=',date('Y-m-d H:i:s'))
		->orderBy ( 'p.publish_date', 'DESC' )->get ();
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
		->where('p.publish_date','<=',date('Y-m-d H:i:s'))
		->where ( 'p.is_publish', '=', self::IS_PUBLISH )
		->orderBy( 'p.publish_date', 'DESC' )->take(50)->get ();
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
		return DB::table ( $product . ' AS p' )->select ( '*' )
		->where ( 'p.pro_transfer_type_id', '=', self::MONTHLY_PRODUCT )
		->where('p.publish_date','<=',date('Y-m-d H:i:s'))
		->where ( 'p.is_publish', '=', self::IS_PUBLISH )
		->orderBy( 'p.publish_date', 'DESC' )->get ();
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
		$setting = Store::getSetting(self::BUYER_REQUEST_SETTING);
		return DB::table ( $product . ' AS p' )
			->select ( '*' )
			->where ( 'p.pro_transfer_type_id', '=', self::BUYER_PRODUCT )
			->where ( 'p.publish_date', '<=', date ( "Y-m-d H:i:s" ) )
			->where ( 'p.is_publish', '=', self::IS_PUBLISH )
			->orderBy ( 'p.publish_date', 'DESC' )
			->take($setting)
			->get ();
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
		return DB::table ( $product . ' AS p' )->select ( '*' )
		->where ( 'p.pro_condition_id', '=', self::SECOND_HAND_PRODUCT )
		->where('p.publish_date','<=',date('Y-m-d H:i:s'))
		->where ( 'p.is_publish', '=', self::IS_PUBLISH )
		->orderBy( 'p.publish_date', 'DESC' )->take(50)->get ();
	}

	/**
	 * findProductDetail by id
	 *
	 * @param int $product_id
	 * @return product detail
	 * @access public
	 */
	public function findProductDetailById($product_id, $store_id=null) {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		$productCondition = Config::get ( 'constants.TABLE_NAME.PRODUCT_CONDITION' );
		$productTransferType = Config::get('constants.TABLE_NAME.PRODUCT_TRANSFER_TYPE');
		$accountRole = Config::get ( 'constants.TABLE_NAME.ACCOUNT_ROLE' );
		$clientType = Config::get ( 'constants.TABLE_NAME.CLIENT_TYPE' );
		$store = Config::get ( 'constants.TABLE_NAME.STORE' );
		$user = Config::get ( 'constants.TABLE_NAME.USER' );
		$productInCategory = Config::get('constants.TABLE_NAME.PRODUCT_IN_CATEGORY');
		$query = DB::table ( $product . ' AS p ' )->select (
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
			'p.publish_date',
			'u.name as name',
			'u.address as address',
			'p.store_id as store_id',
			'p.contact_address',
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
			'cType.name_km as client_type_name_km',
			'proIn.category_id as category_id'

		);
		$query->join (
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
		)->join(
			$productInCategory .' AS proIn',
			'proIn.product_id','=','p.id'
		);
                $query->where ( 'p.id', '=', $product_id );
                if(!empty($store_id)) {
                    $query->where ( 'st.id', '=', $store_id );
                }
                $result = $query->first ();
                return $result;
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
	public static function findRelatedPostProduct($category_id){
		if(!array($category_id)){
			$category_id = array($category_id);
		}
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		$product_in_category = Config::get ( 'constants.TABLE_NAME.PRODUCT_IN_CATEGORY' );
		$store = Config::get ( 'constants.TABLE_NAME.STORE' );
		$productTransferType = Config::get('constants.TABLE_NAME.PRODUCT_TRANSFER_TYPE');
		$productCondition = Config::get ( 'constants.TABLE_NAME.PRODUCT_CONDITION' );
		$user = Config::get ( 'constants.TABLE_NAME.USER' );
		$accountRole = Config::get ( 'constants.TABLE_NAME.ACCOUNT_ROLE' );
		$clientType = Config::get ( 'constants.TABLE_NAME.CLIENT_TYPE' );

		return DB::table ( $product . ' AS p' )->select (
			'p.view',
			'p.id',
			'p.title',
			'p.description',
			'p.pictures',
			'p.contact_info',
			'p.created_date',
			'p.price',
			'p.thumbnail',
			'st.title_en',
			'st.title_km',
			'st.image',
			'pt.name_en as transfer_type_name_en',
			'pt.name_km as transfer_type_name_km',
			'proc.name_en as condition_name_en',
			'proc.name_km as condition_name_km',
			'u.name as username',
			'accr.rol_name_en as account_role_name_en',
			'accr.rol_name_km as account_role_name_km',
			'ctype.name_en as client_type_name_en',
			'ctype.name_km as client_type_name_km'
			)
		->join ( $store.' AS st','st.id','=','p.store_id')
		->join ($product_in_category.' AS pro', 'pro.product_id','=','p.id')
		->join ($productTransferType.' AS pt','pt.ptt_id','=','p.pro_transfer_type_id')
		->join ($productCondition.' AS proc','proc.id','=','p.pro_condition_id')
		->join ($user.' AS u','u.id','=','p.user_id')
		->join ($accountRole.' AS accr','accr.rol_id','=','u.account_role')
		->join($clientType.' AS ctype','ctype.id','=','u.client_type')
		->whereIn( 'pro.category_id',$category_id)
		->where( 'p.publish_date','<=',date('Y-m-d H:i:s'))
		->where ( 'p.is_publish', '=', self::IS_PUBLISH )
		->groupby('pro.product_id')
		->orderBy ( 'p.publish_date', 'DESC' )->take(8)->get ();
	}

	/**
	 * Find preminum latest product
	 *
	 * @return Product
	 */
	public static function findPreminumLatest() {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		$setting = Store::getSetting(self::LATEST_PRODUCT_SETTING);
		$user = Config::get ( 'constants.TABLE_NAME.USER' );

		return DB::table ( $product . ' AS p' )->select ( 'p.*')
		->join ( 'user AS u', 'p.user_id', '=', 'u.id' )
		->where ( 'u.account_type', '=', self::PREMINUM )
		->where( 'p.publish_date','<=',date('Y-m-d H:i:s'))
		->where ( 'p.is_publish', '=', self::IS_PUBLISH )
		->orderBy ( 'p.publish_date', 'DESC' )->take ( $setting )->get ();
	}

	/**
	 * findPostProductByCategory
	 *
	 * @param int $category
	 * @param int $displayNumber
	 *
	 * @return products by category
	 * @access public
	 */
	public function findPostProductByCategory($category_id, $displayNumber = null) {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		$product_in_category = Config::get ( 'constants.TABLE_NAME.PRODUCT_IN_CATEGORY' );
		$store = Config::get ( 'constants.TABLE_NAME.STORE' );
		$productTransferType = Config::get('constants.TABLE_NAME.PRODUCT_TRANSFER_TYPE');
		$productCondition = Config::get ( 'constants.TABLE_NAME.PRODUCT_CONDITION' );
		$user = Config::get ( 'constants.TABLE_NAME.USER' );
		$accountRole = Config::get ( 'constants.TABLE_NAME.ACCOUNT_ROLE' );
		$clientType = Config::get ( 'constants.TABLE_NAME.CLIENT_TYPE' );

		if ($displayNumber === null) {
			$displayNumber = self::LIST_NUMBER;
		}

		return DB::table ( $product . ' AS p' )
		->select (
			'p.view',
			'p.id',
			'p.title',
			'p.description',
			'p.pictures',
			'p.contact_info',
			'p.created_date',
			'p.price',
			'p.thumbnail',
			'st.title_en',
			'st.title_km',
			'st.image',
			'st.id as store_id',
			'pt.name_en as transfer_type_name_en',
			'pt.name_km as transfer_type_name_km',
			'proc.name_en as condition_name_en',
			'proc.name_km as condition_name_km',
			'u.name as username',
			'accr.rol_name_en as account_role_name_en',
			'accr.rol_name_km as account_role_name_km',
			'ctype.name_en as client_type_name_en',
			'ctype.name_km as client_type_name_km'
			)
		->join ( $store.' AS st','st.id','=','p.store_id')
		->join ($product_in_category.' AS pro', 'pro.product_id','=','p.id')
		->join ($productTransferType.' AS pt','pt.ptt_id','=','p.pro_transfer_type_id')
		->join ($productCondition.' AS proc','proc.id','=','p.pro_condition_id')
		->join ($user.' AS u','u.id','=','p.user_id')
		->join ($accountRole.' AS accr','accr.rol_id','=','u.account_role')
		->join($clientType.' AS ctype','ctype.id','=','u.client_type')
		->whereIn( 'pro.category_id',$category_id)
		->where( 'p.publish_date','<=',date('Y-m-d H:i:s'))
		->where ( 'p.is_publish', '=', self::IS_PUBLISH )
		->groupby('pro.product_id')
		->orderBy ( 'p.publish_date', 'DESC' )
		->paginate($displayNumber);
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
	public function findProductByCategory($store, $idArr, $product_id = null) {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		$productRelated = Config::get ( 'constants.TABLE_NAME.PRODUCT_IN_CATEGORY' );
		$query = DB::table ( $product );
		$query->leftJoin($productRelated, $product.'.id', '=', $productRelated.'.product_id');
		$query->whereIn ( $productRelated.'.category_id', $idArr );
		if(!empty($product_id)) {
			$query->where ( $product.'.id', '!=', $product_id);
		}
		$query->where ( 'store_id', '=', $store );
		$query->where($product.'.is_publish','=',self::IS_PUBLISH);
		$query->groupBy($product.'.id');
		$query->orderBy ( 'publish_date', 'DESC' );
		if(!empty($product_id)) {
			$query->take (24);
			$product = $query->get ();
		} else {
			$product = $query->paginate (24);
		}
		return $product;
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
					'user_id' => Session::get ( 'currentUserId' ),
					'pro_status' => 1
			);
		}
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product )->select ( '*' )
		->where ( $where )
		->orderBy ( 'publish_date', 'DESC' )
		->paginate ( 10 );
	}

	/**
	 * listAllProductsByOwnStore counter
	 *
	 * @return products by Own store
	 * @access public
	 */
	public function listAllProductsByOwnStoreCounter($where = array()) {
		if (! empty ( $where )) {
			$where = $where;
		} else {
			$where = array (
					'user_id' => Session::get ( 'currentUserId' ),
					'is_publish' => 1
			);
		}
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		return DB::table ( $product )->select ( '*' )->where ( $where )->count();
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
	public function searchProducts(
		$keyword = '',
		$province,
		$displayNumber = null
	) {

		return $this->searchByProduct ($keyword, $province, $displayNumber);
	}

	/**
	 * Find product by location, type and keyword
	 *
	 * @param int|array $chilidCategories
	 * @param int $province
	 * @param int $transferType
	 * @param int $condition
	 * @param int $price
	 * @param string $date
	 * @param int $displayNumber
	 *
	 * @return array $products
	 */
	public function searchProductFromCategory(
		$chilidCategories,
		$location,
		$transferType,
		$condition,
		$price,
		$date,
		$displayNumber = null
	) {
		$limitNumber = self::LIST_NUMBER;
		if ($displayNumber !== null) {
			$limitNumber = $displayNumber;
		}

		$query = $this->searchProductInEachCategory(
				$chilidCategories,
				$location,
				$transferType,
				$condition,
				$price,
				$date
			);
		if (( int ) $location > 0) {
			$query->where ( 'u.province_id', '=', ( int ) $location );
		}


		return $query->paginate ( $limitNumber );
	}

	/**
	 * Find product by location, type and keyword
	 *
	 * @param int|array $chilidCategories
	 * @param int $province
	 * @param int $transferType
	 * @param int $condition
	 * @param int $price
	 * @param string $date
	 *
	 * @return Query
	 */
	private function searchProductInEachCategory(
		$chilidCategories,
		$location,
		$transferType,
		$condition,
		$price,
		$date
	) {
		$query = $this->commomSearch();

		if (( int ) $transferType !== 0) {
			$query->where ( 'p.pro_transfer_type_id', '=', ( int ) $transferType );
		}
		if (( int ) $condition !== 0) {
			$query->where ( 'p.pro_condition_id', '=', ( int ) $condition );
		}
		if (! empty ( $date )) {
			$query->where ( 'p.publish_date', '=', $date );
		}
		if ((int) $price !== 0) {
			$query->where ( 'p.price', '=', $price );
		}
		if ((int) $chilidCategories !== 0) {
			$query->whereIn( 'pro.category_id', $chilidCategories);
		}

		$query->groupBy('pro.product_id');
		$query->orderBy ( 'p.publish_date', 'DESC' );

		return $query;
	}

	/**
	 * Top search product
	 *
	 * @param string $keyword
	 * @param int    $displayNumber
	 * @param int 	 $province
	 *
	 * @return Query
	 */
	public function searchByProduct($keyword, $province, $displayNumber) {
		if ($province == 0) {
			return $this->findProduct($keyword, $displayNumber);
		}

		return $this->findProduct($keyword, $displayNumber, $province);
	}

	/**
	 * Top search product with condtion
	 *
	 * @param string $keyword
	 * @param int 	 $displayNumber
	 * @param int 	 $province
	 *
	 * @return Query
	 */
	public function findProduct(
		$keyword,
		$displayNumber,
		$province = null
	) {

		$query = $this->commomSearch();

		if (!is_null($province)) {
			$query->where ( 'u.province_id', '=', ( int ) $province );
		}
		$query->where (function ($query) use($keyword) {
				$query->orWhere ( 'p.title', 'LIKE', '%' . $keyword . '%' )
					->orWhere ( 'p.description', 'LIKE', '%' . $keyword . '%' );
			}
		);
		$query->groupBy('pro.product_id');
		$query->orderBy ( 'p.publish_date', 'DESC' );

		$limitNumber = self::LIST_NUMBER;
		if ($displayNumber !== null) {
			$limitNumber = $displayNumber;
		}

		return $query->paginate($limitNumber);

	}

	/**
	 * This function for search that use both top search and sort
	 *
	 * @return Query
	 */
	private function commomSearch() {
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		$product_in_category = Config::get ( 'constants.TABLE_NAME.PRODUCT_IN_CATEGORY' );
		$store = Config::get ( 'constants.TABLE_NAME.STORE' );
		$productTransferType = Config::get('constants.TABLE_NAME.PRODUCT_TRANSFER_TYPE');
		$productCondition = Config::get ( 'constants.TABLE_NAME.PRODUCT_CONDITION' );
		$user = Config::get ( 'constants.TABLE_NAME.USER' );
		$accountRole = Config::get ( 'constants.TABLE_NAME.ACCOUNT_ROLE' );
		$clientType = Config::get ( 'constants.TABLE_NAME.CLIENT_TYPE' );

		$query = DB::table ( $product . ' AS p' );
		$query->select (
			'p.view',
			'p.id',
			'p.title',
			'p.description',
			'p.pictures',
			'p.contact_info',
			'p.created_date',
			'p.price',
			'p.thumbnail',
			'st.title_en',
			'st.id as store_id',
			'st.title_km',
			'st.image',
			'pt.name_en as transfer_type_name_en',
			'pt.name_km as transfer_type_name_km',
			'proc.name_en as condition_name_en',
			'proc.name_km as condition_name_km',
			'u.name as username',
			'accr.rol_name_en as account_role_name_en',
			'accr.rol_name_km as account_role_name_km',
			'ctype.name_en as client_type_name_en',
			'ctype.name_km as client_type_name_km'
		);
		$query->join ( $store.' AS st','st.id','=','p.store_id');
		$query->join ($product_in_category.' AS pro', 'pro.product_id','=','p.id');
		$query->join ($productTransferType.' AS pt','pt.ptt_id','=','p.pro_transfer_type_id');
		$query->join ($productCondition.' AS proc','proc.id','=','p.pro_condition_id');
		$query->join ($user.' AS u','u.id','=','p.user_id');
		$query->join ($accountRole.' AS accr','accr.rol_id','=','u.account_role');
		$query->join($clientType.' AS ctype','ctype.id','=','u.client_type');
		$query->where ( 'p.is_publish', '=', self::IS_PUBLISH );

		return $query;
	}

	public static function productPosttoday(){
		return DB::table ( Config::get ( 'constants.TABLE_NAME.PRODUCT' ))
		->where('created_date','=',date('Y-m-d'))
		->where ( 'is_publish', '=', self::IS_PUBLISH )
		->orderBy('publish_date','DESC')
		->get();
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
		$oldViewCount = DB::table ( Config::get ( 'constants.TABLE_NAME.PRODUCT' ))
			->select('view')
			->where('id', $product_id)
			->first ();

		$totalView = !empty($oldViewCount->view) ? $oldViewCount->view : 0;

		return $totalView;
	}

	public function findProductByTransfterType($id,$displayNumber){
		$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
		$product_in_category = Config::get ( 'constants.TABLE_NAME.PRODUCT_IN_CATEGORY' );
		$store = Config::get ( 'constants.TABLE_NAME.STORE' );
		$productTransferType = Config::get('constants.TABLE_NAME.PRODUCT_TRANSFER_TYPE');
		$productCondition = Config::get ( 'constants.TABLE_NAME.PRODUCT_CONDITION' );
		$user = Config::get ( 'constants.TABLE_NAME.USER' );
		$accountRole = Config::get ( 'constants.TABLE_NAME.ACCOUNT_ROLE' );
		$clientType = Config::get ( 'constants.TABLE_NAME.CLIENT_TYPE' );

		if ($displayNumber === null) {
			$displayNumber = self::LIST_NUMBER;
		}

		return DB::table ( $product . ' AS p' )
		->select (
			'p.view',
			'p.id',
			'p.title',
			'p.description',
			'p.pictures',
			'p.contact_info',
			'p.created_date',
			'p.price',
			'p.thumbnail',
			'st.title_en',
			'st.title_km',
			'st.image',
			'st.id as store_id',
			'pt.name_en as transfer_type_name_en',
			'pt.name_km as transfer_type_name_km',
			'proc.name_en as condition_name_en',
			'proc.name_km as condition_name_km',
			'u.name as username',
			'accr.rol_name_en as account_role_name_en',
			'accr.rol_name_km as account_role_name_km',
			'ctype.name_en as client_type_name_en',
			'ctype.name_km as client_type_name_km'
			)
		->join ( $store.' AS st','st.id','=','p.store_id')
		->join ($product_in_category.' AS pro', 'pro.product_id','=','p.id')
		->join ($productTransferType.' AS pt','pt.ptt_id','=','p.pro_transfer_type_id')
		->join ($productCondition.' AS proc','proc.id','=','p.pro_condition_id')
		->join ($user.' AS u','u.id','=','p.user_id')
		->join ($accountRole.' AS accr','accr.rol_id','=','u.account_role')
		->join($clientType.' AS ctype','ctype.id','=','u.client_type')
		->where( 'p.pro_transfer_type_id',$id)
		->where( 'p.publish_date','<=',date('Y-m-d H:i:s'))
		->where ( 'p.is_publish', '=', self::IS_PUBLISH )
		->groupby('pro.product_id')
		->orderBy('p.publish_date','DESC')
		->paginate($displayNumber);
	}


	public function findProductByAccountRole($id,$displayNumber){
		if ($displayNumber === null) {
			$displayNumber = self::LIST_NUMBER;
		}

    	try {
			$results = DB::table(Config::get('constants.TABLE_NAME.USER'))
			->select('*')
			->where('account_role','=',$id)
			->get();

			$userID = array();
			foreach($results as $results){
				array_push($userID,$results->id);
			}
			$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
			$product_in_category = Config::get ( 'constants.TABLE_NAME.PRODUCT_IN_CATEGORY' );
			$store = Config::get ( 'constants.TABLE_NAME.STORE' );
			$productTransferType = Config::get('constants.TABLE_NAME.PRODUCT_TRANSFER_TYPE');
			$productCondition = Config::get ( 'constants.TABLE_NAME.PRODUCT_CONDITION' );
			$user = Config::get ( 'constants.TABLE_NAME.USER' );
			$accountRole = Config::get ( 'constants.TABLE_NAME.ACCOUNT_ROLE' );
			$clientType = Config::get ( 'constants.TABLE_NAME.CLIENT_TYPE' );

			$query = DB::table ( $product . ' AS p' );
			$query->select (
				'p.view',
				'p.id',
				'p.title',
				'p.description',
				'p.pictures',
				'p.contact_info',
				'p.created_date',
				'p.price',
				'p.user_id as user_id',
				'p.thumbnail',
				'st.title_en',
				'st.id as store_id',
				'st.title_km',
				'st.image',
				'pt.name_en as transfer_type_name_en',
				'pt.name_km as transfer_type_name_km',
				'proc.name_en as condition_name_en',
				'proc.name_km as condition_name_km',
				'u.name as username',
				'accr.rol_name_en as account_role_name_en',
				'accr.rol_name_km as account_role_name_km',
				'ctype.name_en as client_type_name_en',
				'ctype.name_km as client_type_name_km'
			);
			$query->join ( $store.' AS st','st.id','=','p.store_id');
			$query->join ($product_in_category.' AS pro', 'pro.product_id','=','p.id');
			$query->join ($productTransferType.' AS pt','pt.ptt_id','=','p.pro_transfer_type_id');
			$query->join ($productCondition.' AS proc','proc.id','=','p.pro_condition_id');
			$query->join ($user.' AS u','u.id','=','p.user_id');
			$query->join ($accountRole.' AS accr','accr.rol_id','=','u.account_role');
			$query->join($clientType.' AS ctype','ctype.id','=','u.client_type');
			$query->where ( 'p.publish_date', '<=',date("Y-m-d H:i:s"));
			$query->where ( 'p.is_publish', '=', self::IS_PUBLISH );
			$query->whereIn('p.user_id',$userID);
			$query->groupby('pro.product_id');
			$query->orderBy('p.publish_date','DESC');

		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return $query->paginate($displayNumber);
	}
	
	public function searchProductTitle(){
		try {
			$product = Config::get ( 'constants.TABLE_NAME.PRODUCT' );
			$query = DB::table ( $product . ' AS p' );
			$query->select (
					'created_date',
					'title'
			);
			$query->where ( 'p.publish_date', '<=',date("Y-m-d H:i:s"));
			$query->where ( 'p.is_publish', '=', self::IS_PUBLISH );
			$query->orderby('p.publish_date','DESC');
			$result = $query->get();
			$data = array();
			$i = 0;
			foreach ($result as $value) {
				$data[date("Y-m-d",strtotime($value->created_date))] = $value->title;
				//$data[$value->id] = $value->title;
				$i++;
			}
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return $data;
	}
}
