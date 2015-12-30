<?php

class Members extends Eloquent{

	const STATUS = 1;

	/**
	 * Login for member operaiton
	 *
	 * @method memberLogin
	 * @param string $loginName
	 * @param string $password
	 * @return object User
	 */
	public function memberLogin($loginName, $password){
		$query = DB::table(Config::get('constants.TABLE_NAME.USER'));
		if (filter_var($loginName, FILTER_VALIDATE_EMAIL)) {
			$query->where('email','=', $loginName);
		} else {
			$query->where('telephone','=', $loginName);
		}
		
		$query->where('password', '=', md5(sha1($password)));
		$query->where('user_type', '=', Config::get('constants.CLIENT_USER'));
		$query->where('status', '=', self::STATUS);
		$result = $query->first();
		return $result;
	}
}
