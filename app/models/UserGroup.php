<?php

class UserGroup extends Eloquent{

	/**
	 *
	 * getUserGroup: this function using for listing all user group
	 * @return array
	 * @access public
	 */
	public function getUserGroup() {
		$response = new stdClass();
		$arr = array();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.USER_TYPE'))
			->select('*')
			->where('id','!=', 4)
			->orderBy('id','desc')
			->paginate(Config::get('constants.USER_GROUP_PAGINATION'));
			$response->data = $result;
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

/**
	 *
	 * getUserPermission: this function using for listing all user permission
	 * @return array
	 * @access public
	 */
	public function getUserPermission() {
		$response = new stdClass();
		$arr = array();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.PERMISSION'))
			->select('*')
			->orderBy('id','desc')
			->get();
			$response->data = $result;
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}
}
