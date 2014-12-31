<?php

class Market extends Eloquent{

	/**
	 *
	 * listingMarkets: this function using for listing all markets
	 * @return array
	 * @access public
	 */
	public function listingMarkets(){
		$filterNameEn = Input::get('filter_name_en');
		$filterNameZh = Input::get('filter_name_zh');
		$filterStair = Input::get('filter_stair');
		$filterMarketType = Input::get('filter_market_type');
		$response = new stdClass();
		$arr = array();
		try {
			$query = DB::table(Config::get('constants.TABLE_NAME.MARKET'));
			$query->select('*');
			if(!empty($filterNameEn)){
				$query->where('title_en','LIKE','%'.trim($filterNameEn).'%');
			}
			if(!empty($filterNameZh)){
				$query->where('title_zh','LIKE','%'.trim($filterNameZh).'%');
			}
			if(!empty($filterStair)){
				$query->where('amount_stair','=', $filterStair);
			}
			if(!empty($filterMarketType)){
				$query->where('market_type','=', $filterMarketType);
			}
			$query->orderBy('id','desc');
			$result = $query->paginate(Config::get('constants.BACKEND_PAGINATION_MARKET'));

			$response->data = $result;
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

	/**
	 *
	 * listingEditData: this function using for listing market by id
	 * @param integer $id: the id of market
	 * @return array object of Market
	 * @access public
	 */
	public function listingEditData($id = null){
		$response = new stdClass();
		$arr = array();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.MARKET'))
			->select('*')
			->where('id', '=', $id)
			->first();

			$response->data = $result;
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

	/**
	 *
	 * listingProvinces: this function using for listing all provinces
	 * @return stdClass
	 * @access public
	 */
	public function listingProvinces(){
		$response = new stdClass();
		$arr = array();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.PROVINCE'))
			->select('province_id','province_name')
			->get();
			foreach ($result as $provinces) {
				$arr[$provinces->province_id] = $provinces->province_name;
			}
			$response->data = $arr;
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

	/**
	 *
	 * listingDistricts: this function using for listing all districts
	 * @return array: the object provinces
	 * @access public
	 */
	public function listingDistricts($id){
		$response = new stdClass();
		$arr = array();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.DISTRICT'))
			->select('id','dis_name')
			->where('province_id','=', $id)
			->get();
			foreach ($result as $districts) {
				$arr[$districts->id] = $districts->dis_name;
			}
			$response->data = $arr;
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

	/**
	 *
	 * listingAllDistricts: this function using for listing all districts
	 * @return array: the object provinces
	 * @access public
	 */
	public static function listingAllDistricts(){
		$response = new stdClass();
		$arr = array();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.DISTRICT'))
			->select('id','dis_name')
			->get();
			$response->data = $result;
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

/**
	 *
	 * listingMarketsType: this function using for listing all market types
	 * @return array: the object market types
	 * @access public
	 */
	public function listingMarketsType(){
		$response = new stdClass();
		$arr = array(''=>'Market Type');
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.CLIENT_TYPE'))
			->select('id','name','account_type_id')
			->where('account_type_id','!=',1)
			->get();
			foreach ($result as $marketType) {
				$arr[$marketType->id] = $marketType->name;
			}
			$response->data = $arr;
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

	/**
	 *
	 * saveAddMarket: this function using for saving data into market
	 * @param array $data: handle all data for preparing data
	 * @return boolean: true if the data has been saved successfully
	 * @access public
	 */
	public function saveAddMarket($data){

		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.MARKET'))->insertGetId($data);
			$response->result = $result;
		}catch (\Exception $e){
			$response->result = 0;
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

	/**
	 *
	 * saveEditMarket: this function using for save existing data
	 * @param integer $id: the id of market
	 * @param array $data: handle all data for preparing saving into market
	 * @param string $file: the file name
	 * @return boolean: true if the existing data has been saved successfully
	 * @access public
	 */
	public function saveEditMarket($id,$data,$file=null){
		$response = new stdClass();
		try {

			if(!empty($file)){
				$fileName = DB::table(Config::get('constants.TABLE_NAME.MARKET'))->select('image') ->where('id','=',$id)->first();
				if(!empty($fileName->image)){
					$destinationPath = base_path() . '/public/upload/market/';
					$destinationPathThumb = base_path() . '/public/upload/market/thumb/';
					File::delete($destinationPath . $fileName->image);
					File::delete($destinationPathThumb . $fileName->image);
				}
			}
			$result = DB::table(Config::get('constants.TABLE_NAME.MARKET'))->where('id','=',$id)->update($data);
			$response->result = 1;
		}catch (\Exception $e){
			$response->result = 0;
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}


	/**
	 *
	 * deleteMarket: this function using for deleting an existing Market
	 * @param id: the id of slideshow
	 * @return true: if an existing Market has been deleted
	 * @access public
	 * @throws Exception
	 */
	public function deleteMarket($id){
		$response = new stdClass();
		try {
			$fileName = DB::table(Config::get('constants.TABLE_NAME.MARKET'))->select('image') ->where('id','=',$id)->first();
			if(!empty($fileName->image)){
				$destinationPath = base_path() . '/public/upload/market/';
				$destinationPathThumb = base_path() . '/public/upload/market/thumb/';
				File::delete($destinationPath . $fileName->image);
				File::delete($destinationPathThumb . $fileName->image);
			}
			$result = DB::table(Config::get('constants.TABLE_NAME.MARKET'))->where('id','=',$id)->delete();
			$response->result =$result;
			if(0==$result){
				$response->errorMsg = 'Can not delete market';
			}
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return $response;
	}

}
