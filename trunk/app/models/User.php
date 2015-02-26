<?php

	use Illuminate\Auth\UserInterface;
	use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $table = "user";

	public  $timestamps = false;

	protected $hidden = array('password');
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier() {
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword() {
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail() {
		return $this->email;
	}

	public function getRememberToken() {
		return $this->remember_token;
	}

	public function setRememberToken($value) {
		$this->remember_token = $value;
	}

	public function getRememberTokenName() {
		return 'remember_token';
	}

	public function addUser($data = array()) {
		$response = new stdClass ();

		try {
			$response->userId = DB::table ( Config::get ( 'constants.TABLE_NAME.USER' ) )->insertGetId ( $data );
			$response->result = 1;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;
	}
	public function getDistrict($id) {
		$response = new stdClass ();

		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.DISTRICT'))
					->where('province_id','=',$id)
					->orderBy('id','asc')
					->get();
            $response->data = $result;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;
	}
	public function getClientType() {
		$response = new stdClass ();

		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.CLIENT_TYPE'))
                ->orderBy('name','asc')
                ->get();
            $response->data = $result;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;
	}
	public function getMarketType($id) {
		$response = new stdClass ();

		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.MARKET'))
                ->where('market_type','=',$id)
                ->orderBy('title_en','asc')
                ->get();
            $response->data = $result;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;
	}
	public function accountRole() {
		$response = new stdClass ();

		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.ACCOUNT_ROLE'))
					->orderBy('rol_name','asc')
					->get();
            $response->data = $result;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;
	}
	public function checkEmail($email) {
		$response = new stdClass ();

		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.USER'))
					->where('email','=',$email)
					->get();
            $response->data = $result;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}

		return $response;
	}    
}
