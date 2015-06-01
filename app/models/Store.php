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
        self::generateFolderUpload($destinationPath);
        $destinationPathThumb = $destinationPath . 'thumb/';
        $fileName = $file->getClientOriginalName();
        $fileName = self::generateFileName($destinationPath, $fileName);
        $file->move($destinationPath, $fileName);
        Image::make($destinationPath . $fileName)->resize($width,$height)->save($destinationPathThumb . $fileName);
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
                return Config::get('app.url').'page/'.$id;
                //Config::get('app.url').'page/'.$dataStore->id;
           }
    }
}
