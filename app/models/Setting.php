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
}
