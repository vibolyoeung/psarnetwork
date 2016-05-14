<?php
class FePageController extends BaseController {
	const HOMEPAGE = 1;
	const HOME_PAGE_TOP = 2;
	const V_LEFT_MIDUIM = 4;
	const V_RIGHT_MIDIUM = 5;
	const V_LEFT_SMALL = 6;
	const V_RIGHT_SMALL = 7;
	const MOST_TOP = 2;
	const UP_ON_ENTERPRICE_PRODUCT = 8;
	const PAGE_WEBSITE = 2;

	private $mod_slideshow;
	private $mod_category;
	private $mod_setting;
	private $mod_advertisment;
	private $mod_market;
	private $mod_product;
	public $m_page;

	function __construct(){
		$this->mod_slideshow = new Slideshow();
		$this->mod_category = new MCategory();
		$this->mod_setting = new Setting();
		$this->mod_advertisment = new Advertisement();
		$this->mod_market = new Market();
		$this->mod_product = new Product();
		$this->m_page = new MPage();
	}

	public function index()
	{
		//$limit = $this->mod_setting->getSlidshowNumber();
		$listSlideshows = self::getSlideShowHomePage(5);


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


		$advTops = $this->mod_advertisment
			->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::HOME_PAGE_TOP,
				1
			);

		$productAdvs = $this->mod_advertisment->getProductAdvertisement();
		return View::make('frontend.partials.home')
			->with('slideshows', $listSlideshows->result)
			->with('advVerticalRightSmalls', $advVerticalRightSmall->result)
			->with('advVerticalLeftSmalls', $advVerticalLeftSmall->result)
			->with('productAdvs', $productAdvs->result)
			->with('advTops', $advTops->result)
			->with('client_type',$this->mod_category->getClientType())
			->with('pro_transfer_type',$this->mod_category->getProductTransfterType())
			->with('Provinces', $this->mod_setting->listProvinces())
			->with('seller_type', $this->mod_category->listSellerType());
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

	public function getHorizontalAds($type, $position, $limit) {
		$advHorizontalLargeCenters = $this->mod_advertisment
			->getAdvertisementHomePage(
				$type,
				$position,
				$limit
			);

		return View::make('frontend.partials.horizontal_center_adv')
			->with('advHorizontalLargeCenters', $advHorizontalLargeCenters->result);
	}

	public function getSpecialAds(){
		$advHorizontalTopLarges = $this->mod_advertisment
			->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::MOST_TOP,
				1
			);

		return View::make('frontend.partials.special_adv')
			->with('advHorizontalTopLarges', $advHorizontalTopLarges->result);
	}

	public function mainCategory($isDetails = false){
		$listCategories = self::getCategoriesHomePage();
		return View::make('frontend.partials.left')
			->with('isDetails', $isDetails)
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
 				self::MOST_TOP,
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
			self::UP_ON_ENTERPRICE_PRODUCT,
				3
		);

 		$advTops = $this->mod_advertisment
 		->getAdvertisementHomePage(
 				self::HOMEPAGE,
 				self::HOME_PAGE_TOP,
 				1
 		);

 		$displayNumber = Request::get('displayNumber');

 		$childCategories = $this->mod_category->getAllChildCategories($parent_id);
 		$productByCategory = $this->mod_product->findPostProductByCategory(
			array($category_id),
			$displayNumber
		);
 		$category = $this->mod_category->getMainCategories($parent_id);
 		$mainCategoryDetail = $this->mod_category->getMainCategoriesForDetail($parent_id);


 		if($this->mod_category->countCategory($category_id) > 0 ){
 			$category = $this->mod_category->getMainCategories($category_id);
 			$mainCategoryDetail = $this->mod_category->getMainCategoriesForDetail($parent_id);
 			$productByCategory = $this->mod_product->findPostProductByCategory($childCategories, $displayNumber);
 		}
		return View::make('frontend.modules.detail.index')
				->with('Provinces', $this->mod_setting->listProvinces())
				->with('advHorizontalTopLarges', $advHorizontalTopLarge->result)
				->with('advVerticalRightSmalls', $advVerticalRightSmall->result)
				->with('advVerticalLeftSmalls', $advVerticalLeftSmall->result)
				->with('advVerticalLeftMiduims', $advVerticalLeftMiduim->result)
				->with('advHorizontalLargeCenters', $advHorizontalLargeCenter->result)
				->with('advTops', $advTops->result)
				->with('transferTypes', $this->mod_product->listAllTransferType())
				->with('conditions', $this->mod_product->listAllConditions())
				->with('detailCategory', $category->result)
				->with('MaindetailCategory', $mainCategoryDetail->result)
				->with('client_type',$this->mod_category->getClientType())
				->with('pro_transfer_type',$this->mod_category->getProductTransfterType())
				->with('productByCategory', $productByCategory);
	}

	public static function extractAddress($jsonAddress) {
		$arrayAddress = json_decode($jsonAddress, true);
		$provinceId = (int)$arrayAddress['province'];

		return Product::findProvinceById($provinceId);
	}

	public function listSuppermarket($parent_id,$id){
		$advTops = $this->mod_advertisment
		->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::HOME_PAGE_TOP,
				1
		);
		$displayNumber = Request::get('displayNumber');
		$arrayClientTypeId = $this->mod_market->getAllChildClientType($parent_id);
		if($id>0){
			$listproductInEachMarket = $this->mod_market->listproductofsupermarket($parent_id,array($id),$displayNumber);
		}else{
			$listproductInEachMarket = $this->mod_market->listproductofsupermarket($parent_id,$arrayClientTypeId,$displayNumber);
		}
		$mainSup = $this->mod_market->mainMarket($parent_id);
		return View::make('frontend.partials.suppermarket')
		->with('mainID',$mainSup['0']->id)
		->with('mainmarket',$mainSup['0'])
		->with('transferTypes', $this->mod_product->listAllTransferType())
		->with('pro_transfer_type',$this->mod_category->getProductTransfterType())
		->with('listMarkets',$this->mod_market->listsupermarketfront($parent_id))
		->with('listProductSupermarket',$listproductInEachMarket)
		->with('client_type',$this->mod_category->getClientType())
		->with('pro_transfer_type',$this->mod_category->getProductTransfterType())
		->with('Provinces', $this->mod_setting->listProvinces())
		->with('conditions', $this->mod_product->listAllConditions())
		->with('advTops', $advTops->result);
	}

	public function countProductByclientType($parent_id,$id){

		$arrayClientTypeId = $this->mod_market->getAllChildClientType($parent_id);

		if($id>0){
			$listproductInEachMarket = $this->mod_market->listproductofsupermarket($parent_id,array($id));
		}else{
			$listproductInEachMarket = $this->mod_market->listproductofsupermarket($parent_id,$arrayClientTypeId);
		}

		return $listproductInEachMarket;
	}

	public function getProductDetials($product_id){
		$advTops = $this->mod_advertisment
		->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::HOME_PAGE_TOP,
				1
		);

		Product::countViewOfUserClickProduct($product_id);
		$detailProduct = $this->mod_product->findProductDetailById($product_id);
		return View::make('frontend.partials.products.detials')
					->with('advTops', $advTops->result)
					->with('client_type',$this->mod_category->getClientType())
					->with('pro_transfer_type',$this->mod_category->getProductTransfterType())
					->with('productdetails', $detailProduct);
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

    public function getSearchTypeAndLocations($product = null) {
    	$locations = $this->mod_market->findAllProvinces();
    	$advTops = $this->mod_advertisment
		->getAdvertisementHomePage(
				self::HOMEPAGE,
				self::HOME_PAGE_TOP,
				1
		);
    	return View::make('frontend.partials.header')
    		->with('locations', $locations->data)
    		->with('productdetails', $product)
    		->with('advTops', $advTops->result);
    }

    // list all static pages

    public function pagesList($page_id)
    {
    	$pageForWebsite = $this->m_page
    		->where('id', $page_id)
			->where('page_belong_to', self::PAGE_WEBSITE)
			->first();

    	return View::make('frontend.partials.static_page')
    		->with('page', $pageForWebsite)
    		->with('client_type',$this->mod_category->getClientType())
			->with('pro_transfer_type',$this->mod_category->getProductTransfterType());
    }

    public function listProductTransfterType($transfterTypeId){
    	$displayNumber = Request::get('displayNumber');
    	$productByTransfterType = $this->mod_product->findProductByTransfterType($transfterTypeId,$displayNumber);
    	return View::make('frontend.partials.products.product_transfter')
    	    ->with('client_type',$this->mod_category->getClientType())
			->with('pro_transfer_type',$this->mod_category->getProductTransfterType())
			->with('Provinces', $this->mod_setting->listProvinces())
			->with('seller_type', $this->mod_category->listSellerType())
			->with('transferTypes', $this->mod_product->listAllTransferType())
			->with('conditions', $this->mod_product->listAllConditions())
    		->with('productsByTransfterType', $productByTransfterType);
    }

    public function listProductAccountRole($account_role_id){
    	$displayNumber = Request::get('displayNumber');
    	$productByAccountRole = $this->mod_product->findProductByAccountRole($account_role_id,$displayNumber);
    	return View::make('frontend.partials.products.product_account_role')
    	    ->with('client_type',$this->mod_category->getClientType())
			->with('pro_transfer_type',$this->mod_category->getProductTransfterType())
			->with('Provinces', $this->mod_setting->listProvinces())
			->with('seller_type', $this->mod_category->listSellerType())
			->with('transferTypes', $this->mod_product->listAllTransferType())
			->with('conditions', $this->mod_product->listAllConditions())
    		->with('productByAccountRole', $productByAccountRole);
    }

}
