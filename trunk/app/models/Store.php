<?php

class Store extends Eloquent{

	/**
	 *
	 * listingStores: this function using for listing all store
	 * @return array
	 * @access public
	 */
	public function listingStores($id){
		$response = new stdClass();
		$arr = array();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.STORE'))
			->select('*')
			->where('sup_id','=', $id)
			->orderBy('id','desc')
			->paginate(Config::get('constants.BACKEND_PAGINATION_STORE'));

			$response->data = $result;
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

/**
	 *
	 * listingEditData: this function using for listing store by id
	 * @param integer $store_id
	 * @param integer $sup_id
	 * @return array
	 * @access public
	 */
	public function listingEditData($store_id, $sup_id){
		$response = new stdClass();
		$arr = array();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.STORE'))
			->select('*')
			->where('sup_id','=', $sup_id)
			->where('id','=',$store_id)
			->first();

			$response->data = $result;
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

	/**
	 *
	 * saveAddStore: this function using for saving data into store
	 * @param array $data: handle all data for preparing data
	 * @return boolean: true if the data has been saved successfully
	 * @access public
	 */
	public function saveAddStore($data){

		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.STORE'))->insertGetId($data);
			$response->result = $result;
		}catch (\Exception $e){
			$response->result = 0;
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

	/**
	 *
	 * saveEditStore: this function using for save existing data
	 * @param integer $id: the id of store
	 * @param array $data: handle all data for preparing saving into store
	 * @param string $file: the file name
	 * @return boolean: true if the existing data has been saved successfully
	 * @access public
	 */
	public function saveEditStore($stor_id,$data,$file=null){
		$response = new stdClass();
		try {

			if(!empty($file)){
				$fileName = DB::table(Config::get('constants.TABLE_NAME.STORE'))->select('image') ->where('id','=',$stor_id)->first();
				if(!empty($fileName->image)){
					$destinationPath = base_path() . '/public/upload/store/';
					$destinationPathThumb = base_path() . '/public/upload/store/thumb/';
					File::delete($destinationPath . $fileName->image);
					File::delete($destinationPathThumb . $fileName->image);
				}
			}
			$result = DB::table(Config::get('constants.TABLE_NAME.STORE'))->where('id','=',$stor_id)->update($data);
			$response->result = 1;
		}catch (\Exception $e){
			$response->result = 0;
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}


	/**
	 *
	 * deleteStore: this function using for deleting an existing store
	 * @param id: the id of store
	 * @return true: if an existing store has been deleted
	 * @access public
	 * @throws Exception
	 */
	public function deleteStore($id){
		$response = new stdClass();
		try {
			$fileName = DB::table(Config::get('constants.TABLE_NAME.STORE'))->select('image') ->where('id','=',$id)->first();
			if(!empty($fileName->image)){
				$destinationPath = base_path() . '/public/upload/store/';
				$destinationPathThumb = base_path() . '/public/upload/store/thumb/';
				File::delete($destinationPath . $fileName->image);
				File::delete($destinationPathThumb . $fileName->image);
			}
			$result = DB::table(Config::get('constants.TABLE_NAME.STORE'))->where('id','=',$id)->delete();
			$response->result =$result;
			if(0==$result){
				$response->errorMsg = 'Can not delete store';
			}
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return $response;
	}

}
