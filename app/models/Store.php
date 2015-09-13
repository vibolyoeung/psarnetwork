<?php
class Store extends Eloquent {
	protected $table = "store";
	public $timestamps = false;
	
	/**
	 * getUserStore : is a function for get user store to display front page
	 * 
	 * @param        	
	 *
	 * @return true : if it user store is get sucessfully
	 * @access public
	 * @author Socheat
	 */
	public function getUserStore($userID, $where = array()) {
		$response = new stdClass ();
		try {
			if (! empty ( $where )) {
				$where = $where;
			} else {
				$where = array (
						'user_id' => $userID 
				);
			}
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.STORE' ) )->select ( '*' )->where ( $where )->first ();
			return $result;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}
	}
	
	/**
	 * getUserStore : is a function for get user store to display front page
	 * 
	 * @param        	
	 *
	 * @return true : if it user store is get sucessfully
	 * @access public
	 * @author Socheat
	 */
	public function doUpoad($file, $destinationPath, $width = 100, $height = 100) {
		/* upload logo image */
		$destinationPathThumb = $destinationPath . 'thumb/';
		self::generateFolderUpload ( $destinationPath );
		if (is_array ( $file )) {
			$fileName = $this->normalize_str ( $file ['name'] );
			if (move_uploaded_file ( $file ['tmp_name'], $destinationPath . basename ( $fileName ) )) {
				$fileName = $fileName;
			} else {
				$error = true;
				$fileName = array (
						'message' => 'uploadError' 
				);
			}
		} else {
			$fileName = $file->getClientOriginalName ();
			$fileName = self::generateFileName ( $destinationPath, $fileName );
			$file->move ( $destinationPath, $fileName );
			//Image::make ( $destinationPath . $fileName )->save ( $destinationPathThumb . $fileName );
		}
		/* end upload logo image */
		
		$images = array (
				'image' => $fileName 
		);
		return $images;
	}
	
	/**
	 * Generation fileName when uploading file
	 * 
	 * @return filename by generation
	 * @access public
	 * @method generateFileName
	 * @throws Exception
	 */
	public function generateFileName($pathName, $fileName = null) {
		if (file_exists ( $pathName . $fileName )) {
			$temp = explode ( ".", $fileName );
			$fileName = end ( $temp );
			$fileName = $this->random(30) . '.' . $fileName;
		}
		
		return $fileName;
	}
	
	public function random($length = 50) {
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$size = strlen($chars);
		$str = '';
		for ($i = 0; $i < $length; $i++) {
			$str .= $chars[rand(0, $size - 1)];
		}
		return $str;
	}
	
	/**
	 * Generation folder when uploading file doesnot exist
	 *
	 * @return boolean
	 * @access private
	 * @method generateFolderUpload
	 * @throws ErrorException
	 */
	private static function generateFolderUpload($destinationPath) {
		$destinationPathThumb = $destinationPath . '/thumb/';
		if (! file_exists ( $destinationPath )) {
			mkdir ( $destinationPath, 0777, true );
			if (! file_exists ( $destinationPathThumb )) {
				mkdir ( $destinationPathThumb, 0777, true );
			}
		}
	}
	public static function findStoreByUser($userId) {
		$result = DB::table ( Config::get ( 'constants.TABLE_NAME.STORE' ) )->select ( '*' )->where ( 'user_id', '=', $userId )->first ();
		return ($result->id) ? $result->id : null;
	}
	public function getStoreUrl($id) {
		$result = DB::table ( Config::get ( 'constants.TABLE_NAME.STORE' ) )->select ( '*' )->where ( 'id', '=', $id )->first ();
		if (! empty ( $result->sto_url )) {
			return Config::get ( 'app.url' ) . '' . $result->sto_url;
		} else {
			return Config::get ( 'app.url' ) . 'store-' . $id;
			// Config::get('app.url').'page/'.$dataStore->id;
		}
	}
	
	/**
	 * Get latest store
	 *
	 * @author vibol
	 * @return Store
	 */
	public static function getLatestStores() {
		$response = new stdClass ();
		try {
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.STORE' ) . ' AS st' )->select ( '*' )->orderBy ( 'st.id', 'DESC' )->take ( 12 )->get ();
			
			return $result;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}
	}
	
	/**
	 * Get store banner
	 *
	 * @author Socheat
	 * @return banner
	 */
	public function getStoreBanner($id, $wheres = array()) {
		$response = new stdClass ();
		try {
			if(!empty($wheres)) {
				$where = $wheres;
			} else {
				$where = array (
						'ban_store_id' => $id,
						'ban_status' => 1 
				);
			}
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.USER_BANNER' ) )->select ( '*' )->where ( $where )->orderBy ( 'ban_id', 'DESC' )->get ();
			
			return $result;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}
	}
	
	/**
	 * Get store by condition
	 *
	 * @author Socheat
	 * @return array()
	 */
	public function getStore($where) {
		$result = DB::table ( Config::get ( 'constants.TABLE_NAME.STORE' ) )->select ( '*' )->where ( $where )->first ();
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	/**
	 * Get counter by condition
	 */
	function visitorTracking($data) {
		$response = new stdClass ();
		try {
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.COUNTER' ) )->insertGetId ( $data );
			$response->result = $result;
		} catch ( \Exception $e ) {
			Log::error ( 'Message: ' . $e->getMessage () . ' File:' . $e->getFile () . ' Line' . $e->getLine () );
		}
		return $response;
	}

	/**
	 * Get counter by condition
	 */
	function getTracking($where = array()) {
		$response = new stdClass ();
		try {
			if(!empty($where)) {
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.COUNTER' ) )->where ( $where )->get ();
			} else {
				$result = array();
			}
			$response->result = $result;
		} catch ( \Exception $e ) {
			Log::error ( 'Message: ' . $e->getMessage () . ' File:' . $e->getFile () . ' Line' . $e->getLine () );
		}
		return $response;
	}

	/**
	 * Get counter by condition
	 */
	function getTrackingBy($where = array()) {
		$response = new stdClass ();
		$previous_week = strtotime("-1 week +1 day");
		$lastWeek = date('d',$previous_week);
		$lastWeekM = date('m',$previous_week);
		$lastWeekY = date('Y',$previous_week);
		
		$yesterday = strtotime("-1 day");
		$yesterdayD = date('d',$yesterday);
		$yesterdayM = date('m',$yesterday);
		$lastMountY = date('Y',$yesterday);
		
		$previous_mounth = strtotime("-1 month");
		$lastMounth = date('d',$previous_mounth);
		$lastMounthM = date('m',$previous_mounth);
		$lastMounthY = date('Y',$previous_mounth);
		try {
			if(!empty($where)) {
				$getDay = DB::table ( Config::get ( 'constants.TABLE_NAME.COUNTER' ) )
				->select(DB::raw('count(*) as user_count'))
				->where ( 'cnt_day', '=', date("d") )
				->where ( 'cnt_month', '=', date("m") )
				->where ( 'cnt_year', '=', date("Y") )
				->where ($where)
				->first ();
				$response->today = $getDay->user_count;
				
				$getYesterday = DB::table ( Config::get ( 'constants.TABLE_NAME.COUNTER' ) )
				->select(DB::raw('count(*) as user_count'))
				->where ( 'cnt_day', '=', $yesterdayD )
				->where ( 'cnt_month', '=', $yesterdayM )
				->where ( 'cnt_year', '=', $lastMountY )
				->where ($where)
				->first ();
				$response->yesterday = $getYesterday->user_count;
				
				$getWeek = DB::table ( Config::get ( 'constants.TABLE_NAME.COUNTER' ) )
				->select(DB::raw('count(*) as user_count'))
				->where ( 'cnt_day', '=', $lastWeek )
				->where ( 'cnt_month', '=', $lastWeekM )
				->where ( 'cnt_year', '=', $lastWeekY )
				->where ($where)
				->first ();
				
				$response->lastweek = $getWeek->user_count;
				
				$getMounth = DB::table ( Config::get ( 'constants.TABLE_NAME.COUNTER' ) )
				->select(DB::raw('count(*) as user_count'))
				->where ( 'cnt_day', '=', $lastMounth )
				->where ( 'cnt_month', '=', $lastMounthM )
				->where ( 'cnt_year', '=', $lastMounthY )
				->where ($where)
				->first ();
				
				$response->lastMounth = $getMounth->user_count;
			} else {
				$response->today = 0;
				$response->yesterday = 0;
				$response->lastweek = 0;
				$response->lastMounth = 0;
				
			}
		} catch ( \Exception $e ) {
			$response->today = 0;
			$response->yesterday = 0;
			$response->lastweek = 0;
			$response->lastMounth = 0;
			Log::error ( 'Message: ' . $e->getMessage () . ' File:' . $e->getFile () . ' Line' . $e->getLine () );
		}
		return $response;
	}
	
	function normalize_str($str) {
		$invalid = array (
				'Š' => '&Scaron;',
				'š' => '&scaron;',
				'Ð' => '&ETH;',
				'Ž' => '&#381;',
				'ž' => '&#382;',
				'À' => '&Agrave;',
				'Á' => '&Aacute;',
				'Â' => '&Acirc;',
				'Ã' => '&Atilde;',
				'Ä' => '&Auml;',
				'Å' => '&Aring;',
				'Æ' => '&AElig;',
				'Ç' => '&Ccedil;',
				'È' => '&Egrave;',
				'É' => '&Eacute;',
				'Ê' => '&Ecirc;',
				'Ë' => '&Euml;',
				'Ì' => '&Igrave;',
				'Í' => '&Iacute;',
				'Î' => '&Icirc;',
				'Ï' => '&Iuml;',
				'Ñ' => '&Ntilde;',
				'Ò' => '&Ograve;',
				'Ó' => '&Oacute;',
				'Ô' => '&Ocirc;',
				'Õ' => '&Otilde;',
				'Ö' => '&Ouml;',
				'Ø' => '&Oslash;',
				'Ù' => '&Ugrave;',
				'Ú' => '&Uacute;',
				'Û' => '&Ucirc;',
				'Ü' => '&Uuml;',
				'Ý' => '&Yacute;',
				'Þ' => '&THORN;',
				'ß' => '&szlig;',
				'à' => '&agrave;',
				'á' => '&aacute;',
				'â' => '&acirc;',
				'ã' => '&atilde;',
				'ä' => '&auml;',
				'å' => '&aring;',
				'æ' => '&aelig;',
				'ç' => '&ccedil;',
				'è' => '&egrave;',
				'é' => '&eacute;',
				'ê' => '&ecirc;',
				'ë' => '&euml;',
				'ì' => '&igrave;',
				'í' => '&iacute;',
				'î' => '&icirc;',
				'ï' => '&iuml;',
				'ð' => '&eth;',
				'ñ' => '&ntilde;',
				'ò' => '&ograve;',
				'ó' => '&oacute;',
				'ô' => '&ocirc;',
				'õ' => '&otilde;',
				'ö' => '&ouml;',
				'ø' => '&oslash;',
				'ù' => '&ugrave;',
				'ú' => '&uacute;',
				'û' => '&ucirc;',
				'ý' => '&yacute;',
				'ý' => '&yacute;',
				'þ' => '&thorn;',
				'ÿ' => '&yuml;',
				'ƒ' => '&fnof;',
				"`" => "-",
				"´" => "-",
				"„" => "-",
				"`" => "-",
				"´" => "-",
				"“" => "-",
				"”" => "-",
				"´" => "-",
				"&acirc;€™" => "-",
				"{" => "-",
				"~" => "-",
				"–" => "-",
				"’" => "-",
				"°" => "-",
				"º" => "-",
				" " => "" 
		);
		
		$str = str_replace ( array_keys ( $invalid ), array_values ( $invalid ), $str );
		
		return $str;
	}
}
