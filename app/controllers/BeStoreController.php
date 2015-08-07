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
        $stores = $this->searchOperation(self::FREE_USER_ACCOUNT);

        return View::make(self::STORE_FREE_PAGE)
            ->with('stores', $stores);
    }

    public function listAllStoresPremium()
    {
        $stores = $this->searchOperation(self::PREMIUM_USER_ACCOUNT);

        return View::make(self::STORE_PREMIUM_PAGE)
            ->with('stores', $stores);
    }

    private function searchOperation($accountType)
    {
        $tblStore = Config::get ('constants.TABLE_NAME.STORE');
        $tblUser = Config::get ('constants.TABLE_NAME.USER');
        $qb = DB::table($tblStore .' AS s');
        $qb->join($tblUser .' AS u', 'u.id','=', 's.user_id');
        $qb->select(DB::raw('s.id as store_id, s.*, u.id as user_id, u.*'));
        $qb->where('u.account_type', $accountType);

        if (Input::has('user_owner_page')) {
            $qb->where('u.name', Input::get('user_owner_page'));
        }

        if (Input::has('page_title')) {
            $qb->where('s.title_en', Input::get('page_title'));
        }

        if (Input::has('date_create')) {
            $qb->where('u.create_at', Input::get('date_create'));
        }

        if (Input::has('status')) {
            $status = (Input::get('status') == 1) ? 1 : 0;
            $qb->where('u.status', $status);
        }

        $qb->orderBy('s.id','desc');
        $stores = $qb->paginate(10);

        return $stores;
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