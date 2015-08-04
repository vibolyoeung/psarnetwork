<?php

class BeStoreController extends BaseController {
    const STORE_FREE_PAGE = 'backend.modules.store.free_page';
    const STORE_PREMIUM_PAGE = 'backend.modules.store.premium_page';
    const FREE_USER_ACCOUNT = 1;
    const PREMIUM_USER_ACCOUNT = 2;
    const DISABLE_STATUS = 0;
    const ENABLE_STATUS = 1;
    
    public function listAllStoresFree()
    {
        $tblStore = Config::get ('constants.TABLE_NAME.STORE');
        $tblUser = Config::get ('constants.TABLE_NAME.USER');
        $stores = DB::table($tblStore .' AS s')
            ->join($tblUser .' AS u', 'u.id','=', 's.user_id')
            ->select(DB::raw('s.id as store_id, s.*, u.*'))
            ->where('u.account_type', self::FREE_USER_ACCOUNT)
            ->orderBy('s.id','desc')
            ->paginate(10);

        return View::make(self::STORE_FREE_PAGE)
            ->with('stores', $stores);
    }

    public function listAllStoresPremium()
    {
        $tblStore = Config::get ('constants.TABLE_NAME.STORE');
        $tblUser = Config::get ('constants.TABLE_NAME.USER');
        $stores = DB::table($tblStore .' AS s')
            ->join($tblUser .' AS u', 'u.id','=', 's.user_id')
            ->select(DB::raw('s.id as store_id, s.*, u.id as user_id, u.*'))
            ->where('u.account_type', self::PREMIUM_USER_ACCOUNT)
            ->orderBy('s.id','desc')
            ->paginate(10);
        return View::make(self::STORE_PREMIUM_PAGE)
            ->with('stores', $stores);
    }

    public function disableAndEnableStore($page, $userid, $status)
    {
        if ($status == 2) {
            $this->statusOperation($userid, self::DISABLE_STATUS);
        }

        if ($status == 1) {
            $this->statusOperation($userid, self::ENABLE_STATUS);
        }
        $redirectPage = ($page === 'free') ? 'admin/stores/free' : 'admin/stores/premium';
        
        return Redirect::to($redirectPage)
            ->with('SMG_SUCCESS','Data has been saved successfully!'); 
    }

    public function deleteStore($page, $userid, $storeid)
    {
        $this->deleteOperation($storeid);
        $redirectPage = ($page === 'free') ? 'admin/stores/free' : 'admin/stores/premium';
        
        return Redirect::to($redirectPage)
            ->with('SMG_SUCCESS','Record has been deleted successfully!'); 
    }

    private function statusOperation($userid, $status)
    {
        $tblUser = Config::get ('constants.TABLE_NAME.USER');
        DB::table($tblUser)
            ->where('id', '=', $userid)
            ->update(array('status' => $status));
    }

    private function deleteOperation($storeid)
    {
        $tblStore = Config::get ('constants.TABLE_NAME.STORE');
        DB::table($tblStore)
            ->where('id', '=', $storeid)
            ->delete();
    }
}