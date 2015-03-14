<?php
class MPage extends Eloquent {

    protected $table = "m_page";
    public $timestamps = false;

    /**
     *
     * getMainCategories : is a function for getting Main categories to display front page
     * @param
     * @return true : if it main categories is selected sucessfully
     * @access public
     * @author kimhim
     */

    public function getMainPages() {
        $response = new stdClass();
        try {
            $result = DB::table(Config::get('constants.TABLE_NAME.M_PAGE'))
            ->select('*')
            ->where('status', '=', 1)
            ->get();
            $response->result = $result;
        }
        catch (\Exception $e) {
            $response->result = 0;
            $response->errorMsg = $e->getMessage();
        }

        return $response;
    }
}
