<?php

class FeStoreController extends BaseController {
	private $mod_slideshow;
	private $mod_category;
	private $mod_setting;
    protected $mod_store;
	
	function __construct(){
		$this->mod_slideshow = new Slideshow();
		$this->mod_category = new MCategory();
		$this->mod_setting = new Setting();
        $this->mod_store = new Store();
	}
	public function index()
	{
	   try {
            $storeID = Request::segment(2);
           $where = array('id'=>$storeID);
           $dataStore = $this->mod_store->getUserStore(null,$where);
           return View::make('frontend.modules.store.index')
						->with('dataStore', $dataStore);
        }
        catch (Exception $e) {
            return $e->getMessages();
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
}
