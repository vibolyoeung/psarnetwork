<?php
class MPage extends Eloquent {

    protected $table = "m_page";
    public $timestamps = false;

    /**
     * getMainPages : is a function for getting Main Page to display front page
     * @param
     * @return true : if it main page is selected sucessfully
     * @access public
     * @author Socheat
     */

    public function getMainPages($id=null) {
        $response = new stdClass();
        try {
            if(!is_null($id)) {
               $where = array(
                    'status' => 1,
                    'id' => $id
               ); 
            } else {
                $where = array(
                    'status' => 1
               );
            }
            $result = DB::table(Config::get('constants.TABLE_NAME.M_PAGE'))->select('*')
                    ->where($where)->get();
            $response->result = $result;
        }
        catch (\Exception $e) {
            $response->result = 0;
            $response->errorMsg = $e->getMessage();
        }

        return $response;
    }


    /**
     * getUserPages : is a function for getting User Page to display front page
     * @param
     * @return true : if it User page is selected sucessfully
     * @access public
     * @author Socheat
     */

    public function getUserPages($userID,$where=null) {
        $response = new stdClass();
        try {
            if(!empty($where)) {
               $where = $where; 
            } else {
                $where = array(
                    'user_id' => $userID
               );
            }
            $result = DB::table(Config::get('constants.TABLE_NAME.S_PAGE'))->select('*')
                    ->where($where)->get();
            $response->result = $result;
        }
        catch (\Exception $e) {
            $response->result = 0;
            $response->errorMsg = $e->getMessage();
        }

        return $response;
    }
    /**
     * addUserPages : is a function for adding user Page to display front page
     * @param
     * @return true : if it user page is added sucessfully
     * @access public
     * @author Socheat
     */

    public function addUserPages($userID,$id,$position) {
        $response = new stdClass();
        try {
            $where = array(
                'user_id'=> $userID,
                'm_page_id'=> $id
            );
            $checkUserPage = $this->getUserPages($userID,$where);
            if(empty($checkUserPage->result)) {
                $getPageName = $this->getMainPages($id);
                if(!empty($getPageName->result)) {
                    $title = $getPageName->result[0]->title_en;
                    /*add new*/
                    $data = array(
                        'user_id'=> $userID,
                        'm_page_id'=> $id,
                        'title'=> $title,
                        'position'=> $position
                    );
                    DB::table(Config::get('constants.TABLE_NAME.S_PAGE'))->insertGetId($data);
                }
                $response = $this->getUserPages($userID,array('user_id'=> $userID));
            } else {
                $response->result = 0;
            }
            
        }
        catch (\Exception $e) {
            $response->result = 0;
            $response->errorMsg = $e->getMessage();
        }

        return $response;
    }
    
    /**
     * removeUserPages : is a function for remove user Page to display front page
     * @param
     * @return true : if it user page is reoved sucessfully
     * @access public
     * @author Socheat
     */

    public function removeUserPages($userID,$id) {
        $response = new stdClass();
        try {
            $where = array(
                'user_id'=> $userID,
                'id'=> $id
            );
            DB::table(Config::get('constants.TABLE_NAME.S_PAGE'))->where($where)->delete();
        }
        catch (\Exception $e) {
            $response->result = 0;
            $response->errorMsg = $e->getMessage();
        }

        return $response;
    }    
    
}
