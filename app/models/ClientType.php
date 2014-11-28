<?php

class ClientType extends Eloquent{

	/**
	 *
	 * getClientUserType: this function using for listing all client user type
	 * @return array
	 * @access public
	 */
	public function getClientUserType() {
		$response = new stdClass();
		$arr = array();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.CLIENT_TYPE'))
			->select('*')
			->orderBy('id','desc')
			->get();
			$response->data = $result;
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

	/**
	 *
	 * getClientUserTypeById: this function using for listing client user type by Id
	 * @return array
	 * @access public
	 */
	public function getClientUserTypeById($id) {
		$response = new stdClass();
		$arr = array();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.CLIENT_TYPE'))
			->select('*')
			->where('id','=', $id)
			->first();
			$response->data = $result;
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

/**
	 *
	 * updateClientUserType: this function using for update client user type by Id
	 * @param $data
	 * @param $id
	 * @return boolean
	 * @access public
	 */
	public function updateClientUserType($data, $id) {
		$response = new stdClass();
		$arr = array();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.CLIENT_TYPE'))
			->where('id','=', $id)
			->update($data);
			$response->data = $result;
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}
}
