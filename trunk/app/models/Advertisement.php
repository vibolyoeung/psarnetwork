<?php

class Advertisement extends Eloquent{

	public  $timestamps = false;

	/**
	 *
	 * saveAddAdvertisement:this function using for create new advertisement
	 * @param getLastId: this last id of advertisement
	 * @param data: the data of advertisement
	 * @return true: if the advertisement has been created
	 * @access public
	 * @throws Exception
	 */
	public function saveAddAdvertisement($data = array(),$getLastId){

		$response = new stdClass();
		try {
			if(!empty($getLastId->isEmpty)){
				$data['advertiser_id'] = $getLastId->lastId;
			}
			DB::table(Config::get('constants.TABLE_NAME.ADVERTISEMENT'))->insertGetId($data);
			$response->result =1;
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return $response;
	}

	public function findAllAdvertisePages() {
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.ADV_PAGE'))->get();
			$advPageArr = array();
			$advPageArr[0] = 'Choose Advertisement Page';
			foreach($result as $advPage) {
				$advPageArr[$advPage->id] = $advPage->name;
			}
			$response->data = $advPageArr;
			$response->result = 1;
		} catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}

		return $response;
	}

	public function findPostionByPageAdsId($id) {
		$response = new stdClass();

		$advPostion = Config::get('constants.TABLE_NAME.ADV_POSITION');
		$advPagePostion = Config::get('constants.TABLE_NAME.ADV_PAGE_POSITION_MM');
		try {
			$result = DB::table($advPostion . ' AS p')
					->join($advPagePostion . ' AS pp', 'p.id', '=', 'pp.adv_position_id')
					->where('pp.adv_page_id', '=', $id)
					->select('p.id', 'p.name')
					->get();
			$advPositionArr = array();
			$advPositionArr[0] = 'Please choose position';
			foreach($result as $position) {
				$advPositionArr[$position->id] = $position->name;
			}
			$response->data = $advPositionArr;
			$response->result = 1;
		} catch (\Exception $e) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return $response;
	}

}
