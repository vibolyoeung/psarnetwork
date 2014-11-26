<?php
class Advertisement extends Eloquent {
	public $timestamps = false;

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
			->select('adv.id', 'adv.title', 'adv.description', 'adv.link_url', 'adv.started_date', 'adv.expire_date', 'adv.image', 'adv.status', 'advp.name AS pageName', 'ps.name AS positionName')
			->join($advPage .' AS advp', 'adv.adv_page_id','=', 'advp.id')
			->join($advPostion . ' AS ps', 'adv.adv_position_id', '=', 'ps.id')
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
	public function findAllAdvertisePages() {
		$response = new stdClass ();
		try {
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.ADV_PAGE' ) )->get ();
			$advPageArr = array ();
			$advPageArr [0] = 'Choose Advertisement Page';
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
				$result = DB::table(Config::get('constants.TABLE_NAME.ADVERTISEMENT'))->where('id','=',$id)->update($data);
				$response->result = 1;
			} else {
				$listing = DB::table(Config::get('constants.TABLE_NAME.ADVERTISEMENT'))->where('id','=', $id)->first();
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
			$advPositionArr [0] = 'Please choose position';
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
}
