<?php

class FeStoreController extends BaseController {
	private $mod_slideshow;
	private $mod_category;
	private $mod_setting;
    protected $mod_store;
    private $mod_product;
    private $user;
	
	function __construct(){
		$this->mod_slideshow = new Slideshow();
		$this->mod_category = new MCategory();
		$this->mod_setting = new Setting();
        $this->mod_store = new Store();
        $this->mod_product = new Product();
        $this->user = new User();
	}
	public function index()
	{
	   try {
           $storeID = Request::segment(2);
           $where = array('id'=>$storeID);
           $dataStore = $this->mod_store->getUserStore(null,$where);
           if(!empty($dataStore)) {
                $dataStore = $dataStore;
           } else {
                $where = array('sto_url'=>$storeID);
                $dataStore = $this->mod_store->getUserStore(null,$where);
           }
           $getUser = $this->user->getUser($dataStore->user_id);
           $getUserUrl = $this->mod_store->getStoreUrl($dataStore->id);
           if($getUser->result->account_type==2) {
                $dataCategory = $this->mod_category->menuUserList($dataStore->user_id, $parent = 0,0,$getUserUrl);
           } else {
                $dataCategory = $this->mod_category->menuUserFree($dataStore->user_id, $parent = 0);
           }
           
           $dataUserPage = $this->mod_category->menuUserPage($dataStore->user_id, 2);
           $dataProduct = $this->mod_product->listAllProductsByOwnStore();
           return View::make('frontend.modules.store.index')
						->with('dataStore', $dataStore)
                        ->with('dataCategory', $dataCategory)
                        ->with('dataUserPage', $dataUserPage)
                        ->with('dataProduct', $dataProduct);
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
        
//		$limit = $this->mod_setting->getSlidshowNumber();
//		$listSlideshows = self::getSlideshowToHomePage($limit->data->setting_value);
//		$listCategories = self::getCategoriesHomePage();
//		return View::make('frontend.modules.store.index')
//						->with('slideshows', $listSlideshows->result)
//						->with('maincategories', $listCategories->result)
//						->with('Provinces', $this->mod_setting->listProvinces());
	}
	
	public function getSlideshowToHomePage($limit){
		$slideshow = $this->mod_slideshow->getSlideshowToFrontEnd($limit);
		return $slideshow;
	}
	
	public function getCategoriesHomePage(){
		$Category = $this->mod_category->getMainCategories();
		return $Category;
	}
	
	public function getProductbyCategory(){
		return View::make('frontend.modules.detail.index')
				->with('Provinces', $this->mod_setting->listProvinces());
	}

	public function myDetail($store, $product_id) {
    	$where = array('id'=>$store);
 		$dataStore = $this->mod_store->getUserStore(null, $where);
 		$dataCategory = $this->mod_category->menuUserList($dataStore->user_id, $parent = 0);
 		$dataUserPage = $this->mod_category->menuUserPage($dataStore->user_id, 2);
 		$dataDetailProduct = $this->mod_product->productDetailByOwnStore($product_id);
		return View::make('frontend.modules.store.detail')
			->with('dataStore', $dataStore)
			->with('dataUserPage', $dataUserPage)
			->with('dataCategory', $dataCategory)
			->with('dataProductDetail', $dataDetailProduct);
	}
}
