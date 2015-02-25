<?php

class FePageController extends BaseController {

	const HOMEPAGE = 1;
	// Position
	const H_MIDDLE_TOP_LARGE = 8;

	private $mod_slideshow;
	private $mod_category;
	private $mod_setting;
	private $mod_advertisment;

	function __construct(){
		$this->mod_slideshow = new Slideshow();
		$this->mod_category = new MCategory();
		$this->mod_setting = new Setting();
		$this->mod_advertisment = new Advertisement();
	}
	public function index()
	{
		$limit = $this->mod_setting->getSlidshowNumber();
		$listSlideshows = self::getSlideShowHomePage($limit->data->setting_value);
		$listCategories = self::getCategoriesHomePage();
		$advHorizontalTopLarge = $this->mod_advertisment
			->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::H_MIDDLE_TOP_LARGE,
				1
			);
		return View::make('frontend.partials.home')
						->with('slideshows', $listSlideshows->result)
						->with('maincategories', $listCategories->result)
						->with('advHorizontalTopLarges', $advHorizontalTopLarge->result)
						->with('Provinces', $this->mod_setting->listProvinces());
	}

	public function getSlideShowHomePage($limit){
		$slideshow = $this->mod_slideshow->getSlideShowHomePageFe($limit);
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
