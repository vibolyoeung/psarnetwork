<?php

class FeDetailController extends BaseController {
	private $mod_slideshow;
	private $mod_category;
	private $mod_setting;
	private $mod_advertisment;
	
	const V_RIGHT_MIDIUM = 5;
	const PAGE_DETAIL = 3;
	const CAT_BANNER = 1;
	
	function __construct(){
		$this->mod_slideshow = new Slideshow();
		$this->mod_advertisment = new Advertisement();
		$this->mod_category = new MCategory();
		$this->mod_setting = new Setting();
	}
	
	public function index($product_name=null,$product_id=null)
	{
		$limit = $this->mod_setting->getSlidshowNumber();
		$listSlideshows = self::getSlideshowToHomePage($limit->data->setting_value);
		$listCategories = self::getCategoriesHomePage();
		return View::make('frontend.modules.detail.index')
														->with('slideshows', $listSlideshows->result)
														->with('maincategories', $listCategories->result);
	}
	
	public function getSlideshowToHomePage($limit){
		$slideshow = $this->mod_slideshow->getSlideshowToFrontEnd($limit);
		return $slideshow;
	}
	
	public function getCategoriesHomePage(){
		$Category = $this->mod_category->getMainCategories();
		return $Category;
	}

	public function getVerticalRightAds(){
		$advVerticalRightMiduim = $this->mod_advertisment
			->getAdvertisementHomePage(
				self::PAGE_DETAIL,
				self::V_RIGHT_MIDIUM,
				self::CAT_BANNER
			);

		return View::make('frontend.partials.detail_vertical_right_meduim_adv')
			->with('advVerticalRightMiduim', $advVerticalRightMiduim->result);
	}
}
