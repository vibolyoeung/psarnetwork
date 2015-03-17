<?php
class FePageController extends BaseController {
	const HOMEPAGE = 1;
	const HOME_PAGE_TOP = 2;
	const V_LEFT_MIDUIM = 4;
	const V_RIGHT_MIDIUM = 5;
	const V_LEFT_SMALL = 6;
	const V_RIGHT_SMALL = 7;
	const H_MIDDLE_TOP_LARGE = 8;
	const H_LARGE_CENTER = 9;

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
		$advHorizontalTopLarge = $this->mod_advertisment
			->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::H_MIDDLE_TOP_LARGE,
				1
			);

		
		$advVerticalRightSmall = $this->mod_advertisment
			->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::V_RIGHT_SMALL,
				3
			);

		$advVerticalLeftSmall = $this->mod_advertisment
			->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::V_LEFT_SMALL,
				3
			);

		$advVerticalLeftMiduim = $this->mod_advertisment
			->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::V_LEFT_MIDUIM,
				3
			);

		$advHorizontalLargeCenter = $this->mod_advertisment
			->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::H_LARGE_CENTER,
				3
			);

		$advTops = $this->mod_advertisment
			->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::HOME_PAGE_TOP,
				1
			);

		return View::make('frontend.partials.home')
			->with('slideshows', $listSlideshows->result)
			->with('advHorizontalTopLarges', $advHorizontalTopLarge->result)
			->with('advVerticalRightSmalls', $advVerticalRightSmall->result)
			->with('advVerticalLeftSmalls', $advVerticalLeftSmall->result)
			->with('advVerticalLeftMiduims', $advVerticalLeftMiduim->result)
			->with('advHorizontalLargeCenters', $advHorizontalLargeCenter->result)
			->with('advTops', $advTops->result)
			->with('Provinces', $this->mod_setting->listProvinces());
	}
	
	public function getRightAds(){
		$advVerticalRightMiduim = $this->mod_advertisment
		->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::V_RIGHT_MIDIUM,
				3
		);
		return View::make('frontend.partials.right')
			->with('advVerticalRightMiduims', $advVerticalRightMiduim->result);
		
	}
	
	

	public function mainCategory(){
		$listCategories = self::getCategoriesHomePage();
		return View::make('frontend.partials.menu')
			->with('maincategories', $listCategories->result);
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
 		$advHorizontalTopLarge = $this->mod_advertisment
 		->getAdvertisementHomePage(
 				self::HOMEPAGE,
 				self::H_MIDDLE_TOP_LARGE,
 				1
 		);

 		$advVerticalRightSmall = $this->mod_advertisment
 		->getAdvertisementHomePage(
 				self::HOMEPAGE,
 				self::V_RIGHT_SMALL,
 				3
 		);

 		$advVerticalLeftSmall = $this->mod_advertisment
 		->getAdvertisementHomePage(
 				self::HOMEPAGE,
 				self::V_LEFT_SMALL,
 				3
 		);

 		$advVerticalLeftMiduim = $this->mod_advertisment
 		->getAdvertisementHomePage(
 				self::HOMEPAGE,
 				self::V_LEFT_MIDUIM,
 				3
 		);

 		$advHorizontalLargeCenter = $this->mod_advertisment
 		->getAdvertisementHomePage(
 				self::HOMEPAGE,
			self::H_LARGE_CENTER,
				3
		);
 		
 		$advTops = $this->mod_advertisment
 		->getAdvertisementHomePage(
 				self::HOMEPAGE,
 				self::HOME_PAGE_TOP,
 				1
 		);
 		
 		
		return View::make('frontend.modules.detail.index')
				->with('Provinces', $this->mod_setting->listProvinces())
				->with('advHorizontalTopLarges', $advHorizontalTopLarge->result)
				->with('advVerticalRightSmalls', $advVerticalRightSmall->result)
				->with('advVerticalLeftSmalls', $advVerticalLeftSmall->result)
				->with('advVerticalLeftMiduims', $advVerticalLeftMiduim->result)
				->with('advHorizontalLargeCenters', $advHorizontalLargeCenter->result)
				->with('advTops', $advTops->result)
				->with('Provinces', $this->mod_setting->listProvinces()
			);
	}
}
