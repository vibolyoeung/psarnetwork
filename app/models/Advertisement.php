<?php
class Advertisement extends Eloquent {
	public $timestamps = false;
	const CLIENT = 4;
	const PRODUCT_ADV = 2;

	/**
	 *
	 * listingAdvertisment: list all advertisments
	 * @return array: get all advertisments
	 * @access public
	 * @throws Exception: can not list advertisment
	 */
	public function listingAdvertisment(){
		$response = new stdClass();

		$adv = Config::get ('constants.TABLE_NAME.ADVERTISEMENT');
		$advPage = Config::get ('constants.TABLE_NAME.ADV_PAGE' );
		$advPostion = Config::get ('constants.TABLE_NAME.ADV_POSITION');
		try {
			$result = DB::table($adv .' AS adv')
			->select(
				'adv.id'
				, 'adv.title_en'
				, 'adv.title_km'
				, 'adv.description_en'
				, 'adv.description_km'
				, 'adv.link_url'
				, 'adv.started_date'
				, 'adv.end_date'
				, 'adv.image'
				, 'adv.status'
				, 'advp.name AS pageName'
				, 'ps.name AS positionName'
			)
			->leftJoin($advPage .' AS advp', 'adv.adv_page_id','=', 'advp.id')
			->leftJoin($advPostion . ' AS ps', 'adv.adv_position_id', '=', 'ps.id')
			->orderBy('adv.id','desc')
			->paginate(Config::get('constants.BACKEND_PAGINATION_AVERTISEMENT'));
			$response->data = $result;
			$response->result = 1;
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return  $response;
	}

	/**
	 *
	 *
	 * saveAddAdvertisement:this function using for create new advertisement
	 *
	 * @param data: the data of advertisement
	 * @return true: if the advertisement has been created
	 * @access public
	 * @throws Exception
	 */
	public function saveAddAdvertisement($data = array()) {
		$response = new stdClass ();

		try {
			DB::table ( Config::get ( 'constants.TABLE_NAME.ADVERTISEMENT' ) )->insertGetId ( $data );
			$response->result = 1;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;
	}

	public function findAllAdvertiseCategoryPages() {
		$response = new stdClass ();
		try {
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.ADV_CAT_PAGE' ) )->get ();
			$advPageArr = array ();
			$advPageArr [0] = 'Category Page';
			foreach ( $result as $advPage ) {
				$advPageArr [$advPage->id] = $advPage->name;
			}
			$response->data = $advPageArr;
			$response->result = 1;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;
	}

	public function findAdvPageByCatPagePositionId($id) {
		$response = new stdClass ();

		$advPage = Config::get ( 'constants.TABLE_NAME.ADV_PAGE' );
		$advCatPagePostion = Config::get ( 'constants.TABLE_NAME.ADV_CAT_PAGE_POSITION_MM' );
		try {
			$result = DB::table ( $advCatPagePostion . ' AS ac' )
						->join ( $advPage . ' AS p', 'p.id', '=', 'ac.adv_page_id' )
						->where ( 'ac.cat_adv_position_id', '=', $id )
						->select ( 'p.id', 'p.name' )
						->get ();
			$advPageArr = array ();
			$advPageArr [0] = 'On Page';
			foreach ( $result as $advPage ) {
				$advPageArr [$advPage->id] = $advPage->name;
			}
			$response->data = $advPageArr;
			$response->result = 1;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}
		return $response;
	}

	public function findAllAdvertisePages() {
		$response = new stdClass ();
		try {
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.ADV_PAGE' ) )->get ();
			$advPageArr = array ();
			$advPageArr [0] = 'Advertise On Page';
			foreach ( $result as $advPage ) {
				$advPageArr [$advPage->id] = $advPage->name;
			}
			$response->data = $advPageArr;
			$response->result = 1;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;
	}

	public function findLicense() {
		$response = new stdClass ();
		try {
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.LICENSE' ) )->get ();
			$licenseType = array ();
			$licenseType [0] = 'License Type';
			foreach ( $result as $license ) {
				$licenseType[$license->id] = $license->name_en ;
			}
			$response->data = $licenseType;
			$response->result = 1;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;

	}

	public function findCategory() {
		$response = new stdClass ();
		try {
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.M_CATEGORY' ) )->get ();
			$categories = array ();
			$categories [0] = 'Choose Category';
			foreach ( $result as $category ) {
				$categories[$category->id] = $category->name_en ;
			}
			$response->data = $categories;
			$response->result = 1;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;

	}

	public function findPaymentMethod() {
		$response = new stdClass ();
		try {
			$result = DB::table (Config::get ('constants.TABLE_NAME.PAYMENT_METHOD'))->get ();
			$paymentMethod = array ();
			foreach ( $result as $payment ) {
				$paymentMethod[$payment->id] = $payment->name;
			}
			$response->data = $paymentMethod;
			$response->result = 1;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;

	}

	public function findUserByName($name) {
		$response = new stdClass ();
		try {
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.USER' ) )
			->where('name', $name)
			->where('user_type', self::CLIENT)
			->get ();
			$response->data = $result;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;
	}

	public function findAdminUsers() {
		$response = new stdClass ();
		try {
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.USER' ) )
			->where('user_type','!=', self::CLIENT)
			->get ();
			$response->data = $result;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;
	}

	public function findClients() {
		$response = new stdClass ();
		try {
			$result = DB::table ( Config::get ('constants.TABLE_NAME.USER'))->where('user_type', self::CLIENT)->get ();
			$response->data = $result;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;
	}

	public function findAdminUsersByName($name) {
		$response = new stdClass ();
		try {
			$result = DB::table ( Config::get ('constants.TABLE_NAME.USER'))
				->where('name', $name)
				->where('user_type','!=', self::CLIENT)
				->get ();
			$response->data = $result;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;
	}

	/**
	 *
	 * saveEditAdvertisement: this function using for editing an existing advertisement
	 * @param id: the id of advertisement
	 * @param param: listing or operation
	 * @param data: the pareparation data befor inserting
	 * @return true: if the an existing Advertisement has been edited successfully
	 * @access public
	 * @throws Exception
	 */
	public function saveEditAdvertisement($id, $data = array(), $param = null){
		$response = new stdClass();
		try {
			if($param == 'operation'){
				$result = DB::table(Config::get('constants.TABLE_NAME.ADVERTISEMENT'))
					->where('id','=', $id)
					->update($data);
				$response->result = 1;
			} else {
				$adv = Config::get('constants.TABLE_NAME.ADVERTISEMENT');
				$user = Config::get('constants.TABLE_NAME.USER');
				$listing = DB::table($adv . ' AS a')
				->select('*', 'a.id AS advId')
				->leftJoin($user . ' AS u', 'a.user_id', '=', 'u.id')
				->where('a.id','=', $id)
				->first();
				$response->data = $listing;
				$response->result = 1;
			}
		} catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return $response;
	}

	public function findPostionByPageAdsId($id) {
		$response = new stdClass ();

		$advPostion = Config::get ( 'constants.TABLE_NAME.ADV_POSITION' );
		$advPagePostion = Config::get ( 'constants.TABLE_NAME.ADV_PAGE_POSITION_MM' );
		try {
			$result = DB::table ( $advPostion . ' AS p' )->join ( $advPagePostion . ' AS pp', 'p.id', '=', 'pp.adv_position_id' )->where ( 'pp.adv_page_id', '=', $id )->select ( 'p.id', 'p.name' )->get ();
			$advPositionArr = array ();
			$advPositionArr [0] = 'On Page Position';
			foreach ( $result as $position ) {
				$advPositionArr [$position->id] = $position->name;
			}
			$response->data = $advPositionArr;
			$response->result = 1;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}
		return $response;
	}

	/**
	 *
	 * isPublicAdvertisement: this function using for enable and disable advertisement
	 * @param id: the id of slideshow
	 * @param status: the status of slideshow
	 * @return 1|0 if the Slideshow has been chnaged status
	 * @access public
	 * @throws Exception
	 */
	public function isPublicAdvertisement($id, $status){
		$response = new stdClass();
		try {
			$status = ($status == 1) ? 0 : 1;
			$result = DB::table(Config::get('constants.TABLE_NAME.ADVERTISEMENT'))->where('id','=', $id)->update(array('status'=>$status));
			$response->result = $result;
			if(0 == $result){
				$response->errorMsg = 'Can not chnage status of avertisement';
			}
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}

		return $response;
	}

	/**
	 *
	 * deleteSlideshow: this function using for deleting an existing slideshow
	 * @param id: the id of slideshow
	 * @return true: if an existing slideshow has been deleted
	 * @access public
	 * @throws Exception
	 */
	public function deleteAdvertisement($id){
		$response = new stdClass();
		try {
			$fileName = DB::table(Config::get('constants.TABLE_NAME.ADVERTISEMENT'))->select('image') ->where('id','=',$id)->first();
			if(!empty($fileName->image)){
				$destinationPath = base_path() . '/public/upload/advertisement/';
				$destinationPathThumb = base_path() . '/public/upload/advertisement/thumb/';
				File::delete($destinationPath . $fileName->image);
				File::delete($destinationPathThumb . $fileName->image);
			}
			$result = DB::table(Config::get('constants.TABLE_NAME.ADVERTISEMENT'))->where('id','=',$id)->delete();
			$response->result =$result;
			if(0==$result){
				$response->errorMsg = 'Can not delete advertisement';
			}
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return $response;
	}

	public function findAdvertisementImageById($id) {
		return DB::table(Config::get('constants.TABLE_NAME.ADVERTISEMENT'))->select('image') ->where('id','=',$id)->first();
	}

	// View front part

	/*
	 * Get advertisement for home page
	 *
	 * @param integer $type
	 * @param integer $postion
	 * @param integer $limit
	 *
	 * @return stdClass
	 */
	public function getAdvertisementHomePage($type, $position, $limit) {
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.ADVERTISEMENT').' AS adv')
			->where('status', 1)
			->where('adv_page_id', $type)
			->where('adv_position_id', $position)
			->orderBy('adv.id','asc')
			->take('limit', $limit)->get();
			$response->result = $result;
		} catch (\Exception $e) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}

		return $response;
	}

	/*
	 * Get product advertisement for home page
	 *
	 * @param integer $page
	 *
	 * @return stdClass
	 */
	public function getProductAdvertisement($page) {
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.ADVERTISEMENT').' AS adv')
			->where('status', 1)
			->where('adv_page_id', $page)
			->where('type', self::PRODUCT_ADV)
			->where('end_date','>=',date("Y-m-d"))
			->orderBy('adv.id','desc')
			->take('limit', 6)->get();
			$response->result = $result;
		} catch (\Exception $e) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}

		return $response;
	}
	public function findAllUserPages() {
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.STORE'))
			->orderBy('id','desc')
			->get();
			$response->result = $result;
		} catch (\Exception $e) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}

		return $response;
	}
}
