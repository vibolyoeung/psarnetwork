<?php

class BeStoreController extends BaseController {
    const STORE_FREE_PAGE = 'backend.modules.store.free_page';
    const STORE_PREMIUM_PAGE = 'backend.modules.store.premium_page';
    
    public function listAllStoresFree()
    {
        return View::make(self::STORE_FREE_PAGE);
    }

    public function listAllStoresPremium()
    {
        return View::make(self::STORE_PREMIUM_PAGE);
    }
}