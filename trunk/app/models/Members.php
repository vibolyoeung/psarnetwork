<?php

class Members extends Eloquent{

	const STATUS = 1;

	public function memberLogin($loginName, $password){
		$query = DB::table(Config::get('constants.TABLE_NAME.USER'));
		switch ($loginName){
			case filter_var($loginName, FILTER_VALIDATE_EMAIL):
				$query->where('email','=', $loginName);
				break;
			case is_numeric($loginName):
				$query->where('telephone','=', $loginName);
				break;
			default:
				$query->where('username','=', $loginName);
				break;
		}
		$query->where('password', '=', sha1(md5($password)));
		$query->where('user_type', '=', Config::get('constants.CLIENT_USER'));
		$query->where('status', '=', self::STATUS);
		$result = $query->first();
		return $result;
	}
}
