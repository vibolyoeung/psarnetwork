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

	public function index()
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

		return View::make('frontend.partials.home')
			->with('slideshows', $listSlideshows->result)
			->with('advVerticalRightSmalls', $advVerticalRightSmall->result)
			->with('advVerticalLeftSmalls', $advVerticalLeftSmall->result)
			->with('advHorizontalLargeCenters', $advHorizontalLargeCenter->result)
			->with('advTops', $advTops->result)
			->with('Provinces', $this->mod_setting->listProvinces());
	}

	public function getFeAds($type, $position, $limit) {
		$advs = $this->mod_advertisment
		->getAdvertisementHomePage(
				$type,
				$position,
				$limit
		);
		return View::make('frontend.partials.advertisement')
			->with('advs', $advs->result);
	}

	public function getSpecialAds(){
		$advHorizontalTopLarges = $this->mod_advertisment
			->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::H_MIDDLE_TOP_LARGE,
				1
			);

		return View::make('frontend.partials.special_adv')
			->with('advHorizontalTopLarges', $advHorizontalTopLarges->result);
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

	public function getProductbyCategory($parent_id, $category_id){
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

 		$productByCategory = $this->mod_product->findPostProductByCategory($category_id);

		return View::make('frontend.modules.detail.index')
				->with('Provinces', $this->mod_setting->listProvinces())
				->with('advHorizontalTopLarges', $advHorizontalTopLarge->result)
				->with('advVerticalRightSmalls', $advVerticalRightSmall->result)
				->with('advVerticalLeftSmalls', $advVerticalLeftSmall->result)
				->with('advVerticalLeftMiduims', $advVerticalLeftMiduim->result)
				->with('advHorizontalLargeCenters', $advHorizontalLargeCenter->result)
				->with('advTops', $advTops->result)
				->with('Provinces', $this->mod_setting->listProvinces())
				->with('productByCategory', $productByCategory);
	}
	
	/*
	 * 
	 */
	public function listSuppermarket($id=0){
		$advTops = $this->mod_advertisment
		->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::HOME_PAGE_TOP,
				1
		);
		
		$marketLists = $this->mod_market->listingMarkets();
		return View::make('frontend.partials.suppermarket')
		->with('listMarket',$marketLists->data)
		->with('advTops', $advTops->result);
	}
	
	public function getProductDetials($product_id){
		$advTops = $this->mod_advertisment
		->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::HOME_PAGE_TOP,
				1
		);
		
		$detailProduct = $this->mod_product->findProductDetailById($product_id);
		return View::make('frontend.partials.products.detials')
					->with('advTops', $advTops->result)
					->with('detailProduct', $detailProduct);
	}
    
    public function getSignOut() {
        Session::flush();
        return Redirect::route('/');
    } 

    public function popupDetailProduct($product_id) {
    	$productDetail =  $this->mod_product->findProductDetailById($product_id);
    	return View::make('frontend.partials.products.js_popup_product')
    		->with('productDetail', $productDetail);
    } 

    public function findRelatedProducts($category_id) {
    	$relatedPost = $this->mod_product->findRelatedPostProduct($category_id);
    	return View::make('frontend.partials.products.related_post')
    		->with('related_post', $relatedPost);
    }

    public function getSearchTypeAndLocations() {
    	$locations = $this->mod_market->findAllProvinces();
    	$advTops = $this->mod_advertisment
		->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::HOME_PAGE_TOP,
				1
		);

    	return View::make('frontend.partials.searchtop')
    		->with('locations', $locations->data)
    		->with('advTops', $advTops->result);
    }
}
