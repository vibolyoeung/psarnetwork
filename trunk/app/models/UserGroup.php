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

	/**
	 *
	 * addPermissionToUserGroup: this function using for adding all user permission
	 * @access public
	 */
	public function addPermissionToUserGroup($data) {
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.USER_TYPE'))->insertGetId($data);
			$response->result = $result;
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

	/**
	 *
	 * getUserPermissionById: this function using for listing a permission by id
	 * @return array
	 * @param $id
	 * @access public
	 */
	public function getUserPermissionById($id){
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.USER_TYPE'))
			->select('*')
			->where('id','=',$id)
			->where('id','!=',4)
			->orderBy('id','desc')
			->first();
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $result;
	}

	/**
	 *
	 * editPermissionToUserGroup: this function using for updating a permission by id
	 * @return array
	 * @param $hid
	 * @param $data
	 * @access public
	 */
	public function editPermissionToUserGroup($data, $hid){
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.USER_TYPE'))->where('id','=',$hid)->update($data);
			$response->result = 1;
		}catch (\Exception $e){
			$response->result = 0;
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

	/**
	 *
	 * deleteUserGroup: this function using for deleting a user group by id
	 * @return array
	 * @param $id
	 * @access public
	 */
	public function deleteUserGroup($id){
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.USER_TYPE'))->where('id','=',$id)->delete();
			$response->result = 1;
		}catch (\Exception $e){
			$response->result = 0;
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

	/**
	 *
	 * isAccessPermission: this function using for giving access permission
	 * @return boolean
	 * @param $permissionName
	 * @access public
	 */
	public function isAccessPermission($permissionName){
		$result = DB::table(Config::get('constants.TABLE_NAME.USER_TYPE'))
			->select('*')
			->where('id','=',Session::get('SESSION_USER_ROLE'))
			->where('id','!=',4)
			->first();
			$arrayAccessPermissionUnserialize = unserialize(stripslashes($result->permission));
		if(in_array($permissionName, isset($arrayAccessPermissionUnserialize['access'])? $arrayAccessPermissionUnserialize['access'] : array())){
			$returnAccessPermission = true;
		}else{
			$returnAccessPermission = false;
		}
		return $returnAccessPermission;
	}

	/**
	 *
	 * isModifyPermission: this function using for giving modify permission
	 * @return boolean
	 * @param $permissionName
	 * @access public
	 */
	public function isModifyPermission($permissionName){
		$result = DB::table(Config::get('constants.TABLE_NAME.USER_TYPE'))
			->select('*')
			->where('id','=',Session::get('SESSION_USER_ROLE'))
			->where('id','!=',4)
			->first();
			$arrayModifyPermissionUnserialize = unserialize($result->permission);
		if(in_array($permissionName, isset($arrayModifyPermissionUnserialize['modify'])? $arrayModifyPermissionUnserialize['modify'] : array())){
			$returnModifyPermission = true;
		}else{
			$returnModifyPermission = false;
		}
		return $returnModifyPermission;
	}

	/**
	 *
	 * findUserGroupById: this function using for finding user group by id
	 * @return array obj
	 * @param $group_id
	 * @access public
	 */
	public function findUserGroupById($group_id){
		$result = DB::table(Config::get('constants.TABLE_NAME.USER_TYPE'))
			->select('*')
			->where('id','=',$group_id)
			->where('id','!=',4)
			->orderBy('id','desc')
			->first();
		return $result;
	}
}
