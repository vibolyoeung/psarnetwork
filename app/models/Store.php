<?php
class Store extends Eloquent {

    protected $table = "store";
    public $timestamps = false;

    /**
     * getUserStore : is a function for get user store to display front page
     * @param
     * @return true : if it user store is get sucessfully
     * @access public
     * @author Socheat
     */
    public function getUserStore($userID, $where=array()) {
        $response = new stdClass();
        try {
            if (!empty($where)) {
                $where = $where;
            } else {
                $where = array('user_id' => $userID);
            }
            $result = DB::table(Config::get('constants.TABLE_NAME.STORE'))->select('*')->
                where($where)->first();
            return $result;
        }
        catch (\Exception $e) {
            $response->result = 0;
            $response->errorMsg = $e->getMessage();
        }
    }

    /**
     * getUserStore : is a function for get user store to display front page
     * @param
     * @return true : if it user store is get sucessfully
     * @access public
     * @author Socheat
     */
    public function doUpoad($file, $destinationPath,$width=100, $height=100) {
        /*upload logo image*/
        $destinationPathThumb = $destinationPath . 'thumb/';
        self::generateFolderUpload($destinationPath);
        if(is_array($file)) {
            $fileName = $this->normalize_str($file['name']);
            if(move_uploaded_file($file['tmp_name'], $destinationPath . basename($fileName))) {
                $fileName = $fileName;
            } else {
                $error = true;
                $fileName = array(
                    'message' => 'uploadError',
                );
            }
        } else {
            $fileName = $file->getClientOriginalName();
            $fileName = self::generateFileName($destinationPath, $fileName);
            $file->move($destinationPath, $fileName);    
            Image::make($destinationPath . $fileName)->resize($width,$height)->save($destinationPathThumb . $fileName);
        }
        /*end upload logo image*/

        $images = array('image' => $fileName);
        return $images;
    }

    /**
     * Generation fileName when uploading file
     * @return filename by generation
     * @access public
     * @method generateFileName
     * @throws Exception
     */
    public static function generateFileName($pathName, $fileName = null) {

        $temp = explode(".", $fileName);
        $fileName = end($temp);
        $fileName = time() . '.' . $fileName;
        if (file_exists($pathName . $fileName)) {
            return generateFileName($pathName);
        }

        return $fileName;
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
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
            if (!file_exists($destinationPathThumb)) {
                mkdir($destinationPathThumb, 0777, true);
            }
        }
    }

    public static function findStoreByUser($userId) {
        $result = DB::table(Config::get('constants.TABLE_NAME.STORE'))
            ->select('*')
            ->where('user_id', '=', $userId)
            ->first();
        return ($result->id) ? $result->id : null;
    }
    
    public function getStoreUrl($id){
        $result = DB::table(Config::get('constants.TABLE_NAME.STORE'))
            ->select('*')
            ->where('id', '=', $id)
            ->first();
            if(!empty($result->sto_url)) {
                return Config::get('app.url').'page/'.$result->sto_url;
           } else {
                return Config::get('app.url').'page/store-'.$id;
                //Config::get('app.url').'page/'.$dataStore->id;
           }
    }

    /**
     * Get latest store
     * 
     * @author vibol
     * @return Store
     */
    public static function getLatestStores()
    {
        $response = new stdClass();
        try {
            $result = DB::table(Config::get('constants.TABLE_NAME.STORE') . ' AS st')->select('*')
            ->orderBy('st.id', 'DESC')
            ->take(12)
            ->get();

            return $result;
        }
        catch (\Exception $e) {
            $response->result = 0;
            $response->errorMsg = $e->getMessage();
        }
    }
    
    /**
     * Get store banner
     * 
     * @author Socheat
     * @return banner
     */
    public function getStoreBanner($id)
    {
        $response = new stdClass();
        try {
            $where = array('ban_store_id'=>$id,'ban_status'=>1);
            $result = DB::table(Config::get('constants.TABLE_NAME.USER_BANNER'))->select('*')
            ->where($where)
            ->orderBy('ban_id', 'DESC')
            ->get();

            return $result;
        }
        catch (\Exception $e) {
            $response->result = 0;
            $response->errorMsg = $e->getMessage();
        }
    }

    
    /**
     * Get store by condition
     *
     * @author Socheat
     * @return array()
     */    
    public function getStore($where){
    	$result = DB::table(Config::get('constants.TABLE_NAME.STORE'))
    	->select('*')
    	->where($where)
    	->first();
    	if(!empty($result)) {
    		return $result;
    	} else {
    		return false;
    	}
    }
    
    function normalize_str($str) {
        $invalid = array(
            'Š' => '&Scaron;',
            'š' => '&scaron;',
            'Ğ' => '&ETH;',
            '' => '&#381;',
            '' => '&#382;',
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
            'İ' => '&Yacute;',
            'Ş' => '&THORN;',
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
            'ğ' => '&eth;',
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
            'ı' => '&yacute;',
            'ı' => '&yacute;',
            'ş' => '&thorn;',
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
        	" " => "",
        );
    
        $str = str_replace(array_keys($invalid), array_values($invalid), $str);
    
        return $str;
    }   
}
