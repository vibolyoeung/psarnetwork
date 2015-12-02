<?php

class FeSearchController extends BaseController {

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
	private $mod_market;
	private $mod_product;

	function __construct(){
		$this->mod_slideshow = new Slideshow();
		$this->mod_category = new MCategory();
		$this->mod_setting = new Setting();
		$this->mod_advertisment = new Advertisement();
		$this->mod_market = new Market();
		$this->mod_product = new Product();
	}

	public function search()
	{

		$limit = $this->mod_setting->getSlidshowNumber();
		$listSlideshows = self::getSlideShowHomePage($limit->data->setting_value);


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

		$province = Request::input('location');
		$keyword = Request::input('q');
		$displayNumber = Request::input('displayNumber');

		$products = $this->mod_product->searchProducts(
			$keyword,
			$province,
			$displayNumber
		);

		$categorId = Request::input('categoryId');
		$category = $this->mod_category->getMainCategories($categorId);
 		$mainCategoryDetail = $this->mod_category->getMainCategoriesForDetail($categorId);

		return View::make('frontend.modules.search.index')
			->with('slideshows', $listSlideshows->result)
			->with('advVerticalRightSmalls', $advVerticalRightSmall->result)
			->with('advVerticalLeftSmalls', $advVerticalLeftSmall->result)
			->with('advHorizontalLargeCenters', $advHorizontalLargeCenter->result)
			->with('advTops', $advTops->result)
			->with('products', $products)
			->with('transferTypes', $this->mod_product->listAllTransferType())
			->with('conditions', $this->mod_product->listAllConditions())
			->with('detailCategory', $category->result)
			->with('MaindetailCategory', $mainCategoryDetail->result)
			->with('topSearch', true)
			->with('client_type',$this->mod_category->getClientType())
			->with('pro_transfer_type',$this->mod_category->getProductTransfterType())
			->with('Provinces', $this->mod_setting->listProvinces());

	}

	public function getSlideShowHomePage($limit){
		$slideshow = $this->mod_slideshow->getSlideShowHomePageFe($limit);
		return $slideshow;
	}

	/**
	 * Search product
	 *
	 * return array product
	 */
	public function searchProduct(){
		$limit = $this->mod_setting->getSlidshowNumber();
		$listSlideshows = self::getSlideShowHomePage($limit->data->setting_value);


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

		$province = Request::input('location');
		$transferType = Request::input('transferType');
		$condition = Request::input('condition');
		$price = Request::input('price');
		$date = Request::input('date');
		$displayNumber = Request::input('displayNumber');
		$categorId = Request::input('categoryId');

		$products = $this->mod_product->searchProductFromCategory(
			$province,
			$transferType,
			$condition,
			$price,
			$date,
			$displayNumber
		);
		$category = $this->mod_category->getMainCategories($categorId);
 		$mainCategoryDetail = $this->mod_category->getMainCategoriesForDetail($categorId);
		return View::make('frontend.modules.search.index')
			->with('slideshows', $listSlideshows->result)
			->with('advVerticalRightSmalls', $advVerticalRightSmall->result)
			->with('advVerticalLeftSmalls', $advVerticalLeftSmall->result)
			->with('advHorizontalLargeCenters', $advHorizontalLargeCenter->result)
			->with('advTops', $advTops->result)
			->with('products', $products)
			->with('transferTypes', $this->mod_product->listAllTransferType())
			->with('conditions', $this->mod_product->listAllConditions())
			->with('detailCategory', $category->result)
			->with('MaindetailCategory', $mainCategoryDetail->result)
			->with('client_type',$this->mod_category->getClientType())
			->with('pro_transfer_type',$this->mod_category->getProductTransfterType())
			->with('Provinces', $this->mod_setting->listProvinces());
	}
}
