<?php
class Setting extends Eloquent{

	/**
	 *
	 * listPermissionMethodName: list all permission method name
	 * @access public
	 * @throws Exception: can not list slideshow
	 */
	public function listPermissionMethodName(){
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.PERMISSION'))
			->select('*')
			->orderBy('id','desc')
			->paginate(10);
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
	 * deletePermissionName: delete a permission method name
	 * @param $id
	 * @access public
	 * @throws Exception: can not list slideshow
	 */
	public function deletePermissionName($id){
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.PERMISSION'))->where('id','=',$id)->delete();
			$result->result = $result;
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return $response;
	}

	/**
	 *
	 * addSavePermissionName: adding a permission method name
	 * @param $data
	 * @access public
	 * @throws Exception: can not list slideshow
	 */
	public function addSavePermissionName($data){
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.PERMISSION'))->insertGetId($data);
			$response->result = $result;
		}catch (\Eexception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
			$response->result = 0;
		}

		return $response;
	}

	/**
	 *
	 * getSlideshowSetting: listing slideshow setting
	 * @access public
	 * @throws Exception: can not list slideshow
	 */
	public function getSlideshowSetting(){
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.SETTING'))
			->select('*')
			->where('setting_type','=','setting_display_number_slideshow')
			->first();
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
	 */

	public function getSlidshowNumber(){
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.SETTING'))
			->select('setting_value')
			->where('setting_type','=','setting_display_number_slideshow')
			->first();
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
	 * addSettingNumberSlideshow: modify setting slideshow
	 * @param $data
	 * @access public
	 * @throws Exception: can not list slideshow
	 */
	public function addSettingNumberSlideshow($data){
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.SETTING'))
			->where('setting_type','=','setting_display_number_slideshow')
			->update($data);
			$response->result = $result;
		}catch (\Eexception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
			$response->result = 0;
		}

		return $response;
	}

	public function listProvinces(){
		$result = DB::table(Config::get('constants.TABLE_NAME.PROVINCE'))
			->select('*')
			->orderBy('province_name_en','ASC')
			->get();
		return $result;
	}

	public function listDistricts($province_id){
		$result = DB::table(Config::get('constants.TABLE_NAME.DISTRICT'))
			->select('*')
			->where('province_id','=',$province_id)
			->get();
		return $result;
	}

	public function findProvinceById($province_id){
		$result = DB::table(Config::get('constants.TABLE_NAME.PROVINCE'))
			->select('*')
			->where('province_id','=',$province_id)
			->orderBy('province_id','desc')
			->first();
		return $result;
	}

	public function findProductConditions() {
		$result = DB::table(Config::get('constants.TABLE_NAME.PRODUCT_CONDITION'))
			->select('*')
			->get();
		return $result;
	}
	public function findProductConditionById($id) {
		$result = DB::table(Config::get('constants.TABLE_NAME.PRODUCT_CONDITION'))
			->select('*')
			->where('id', $id)
			->first();
		return $result;
	}
	public function findProductTransferTypes() {
		$result = DB::table(Config::get('constants.TABLE_NAME.PRODUCT_TRANSFER_TYPE'))
			->select('*')
			->get();
		return $result;
	}
	public function findProductTransferTypeById($id) {
		$result = DB::table(Config::get('constants.TABLE_NAME.PRODUCT_TRANSFER_TYPE'))
			->select('*')
			->where('ptt_id', $id)
			->first();
		return $result;
	}
}
