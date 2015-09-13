<?php
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class FeStoreController extends BaseController {
	private $mod_slideshow;
	private $mod_category;
	private $mod_setting;
	protected $mod_store;
	private $mod_product;
	private $user;
	protected $mod_page;
	function __construct() {
		$this->mod_slideshow = new Slideshow ();
		$this->mod_category = new MCategory ();
		$this->mod_setting = new Setting ();
		$this->mod_store = new Store ();
		$this->mod_product = new Product ();
		$this->user = new User ();
		$this->mod_page = new MPage ();
	}
	public function index($storeurl) {
		try {
			//$storeurl = Request::segment ( 1 );
			$getUlr = preg_match ( '/store-/', $storeurl );
			if ($getUlr) {
				$storeArr = explode ( 'store-', $storeurl );
				$storeID = $storeArr [1];
				$where = array (
						'id' => $storeID 
				);
				$dataStore = $this->mod_store->getUserStore ( null, $where );
			} else {
				$storeID = $storeurl;
				
				$where = array (
						'sto_url' => $storeID 
				);
				$dataStore = $this->mod_store->getUserStore ( null, $where );
			}
			if (! empty ( $dataStore )) {
				$dataStore = $dataStore;
			} else {
				$where = array (
						'sto_url' => $storeID 
				);
				$dataStore = $this->mod_store->getUserStore ( null, $where );
			}
			if(empty($dataStore)) {
				return Redirect::to('/');
				exit();
			}
			
			$getUser = $this->user->getUser ( $dataStore->user_id );
			$getUserUrl = $this->mod_store->getStoreUrl ( $dataStore->id );
			if ($getUser->result->account_type == 2) {
				$dataCategory = $this->mod_category->menuUserList ( $dataStore->user_id, $parent = 0, 0, $getUserUrl );
			} else {
				$dataCategory = $this->mod_category->menuUserFree ( $dataStore->user_id, $parent = 0, $level = 0, $getUserUrl );
			}
			
			$whereArr = array (
					'position' => 100,
					'user_id' => $dataStore->user_id 
			);
			$getToolPage = $this->mod_page->getUserPages ( null, $whereArr );
			
			$widgetWhereArr = array (
					'type' => 'widget',
					'user_id' => $dataStore->user_id 
			);
			$getWidget = $this->mod_page->getUserPages ( null, $widgetWhereArr );
			
			/* get user banner */
			$getBanner = $this->mod_store->getStoreBanner ( $dataStore->id );
			$dataUserPage = $this->mod_category->menuUserPage ( $dataStore->user_id, 2, $getUserUrl );
			$whereProduct = array (
					'user_id' => $dataStore->user_id 
			);
			
			/* slideshow */
			$wherePage = array (
					'user_id' => $dataStore->user_id,
					'type' => 'config',
					'title' => 'slideside_status' 
			);
			$dataSlideshowConfig = $this->mod_page->getUserPages ( null, $wherePage );
			if (! empty ( $dataSlideshowConfig->result )) {
				$slideshowConfig = $dataSlideshowConfig->result [0]->status;
			} else {
				$slideshowConfig = 0;
			}
			
			$dataProduct = $this->mod_product->listAllProductsByOwnStore ( $whereProduct );
			
			/*get counter visitor*/
			$this->getTracking($dataStore->id);
			/*end get counter visitor*/
			
			$getTrackingBy = $this->mod_store->getTrackingBy(array('cnt_page' => Request::path ()));
			return View::make ( 'frontend.modules.store.index' )
			->with ( 'dataStore', $dataStore )
			->with ( 'dataCategory', $dataCategory )
			->with ( 'dataUserPage', $dataUserPage )
			->with ( 'toolView', $getToolPage->result )
			->with ( 'widtget', $getWidget->result )
			->with ( 'banner', $getBanner )
			->with ( 'SlideshowConfig', $slideshowConfig )
			->with ( 'getTracking', $getTrackingBy )
			->with ( 'dataProduct', $dataProduct );
		} catch ( Exception $e ) {
			return $e->getMessage ();
		}
		
		// $limit = $this->mod_setting->getSlidshowNumber();
		// $listSlideshows = self::getSlideshowToHomePage($limit->data->setting_value);
		// $listCategories = self::getCategoriesHomePage();
		// return View::make('frontend.modules.store.index')
		// ->with('slideshows', $listSlideshows->result)
		// ->with('maincategories', $listCategories->result)
		// ->with('Provinces', $this->mod_setting->listProvinces());
	}
	public function getSlideshowToHomePage($limit) {
		$slideshow = $this->mod_slideshow->getSlideshowToFrontEnd ( $limit );
		return $slideshow;
	}
	public function getCategoriesHomePage() {
		$Category = $this->mod_category->getMainCategories ();
		return $Category;
	}
	public function getProductbyCategory() {
		return View::make ( 'frontend.modules.detail.index' )->with ( 'Provinces', $this->mod_setting->listProvinces () );
	}
	public function myDetail($store, $product_id) {
		$getUlr = preg_match ( '/store-/', $store );
		if ($getUlr) {
			$storeArr = explode ( 'store-', $store );
			$storeID = $storeArr [1];
			$where = array (
					'id' => $storeID 
			);
			$dataStore = $this->mod_store->getUserStore ( null, $where );
		} else {
			$storeID = $store;
			
			$where = array (
					'sto_url' => $storeID 
			);
			$dataStore = $this->mod_store->getUserStore ( null, $where );
		}
		$getUser = $this->user->getUser ( $dataStore->user_id );
		$getUserUrl = $this->mod_store->getStoreUrl ( $dataStore->id );
		if ($getUser->result->account_type == 2) {
			$dataCategory = $this->mod_category->menuUserList ( $dataStore->user_id, $parent = 0, 0, $getUserUrl );
		} else {
			$dataCategory = $this->mod_category->menuUserFree ( $dataStore->user_id, $parent = 0, $level = 0, $getUserUrl );
		}
		$whereArr = array (
				'position' => 100,
				'user_id' => $dataStore->user_id 
		);
		$getToolPage = $this->mod_page->getUserPages ( null, $whereArr );
		
		$widgetWhereArr = array (
				'type' => 'widget',
				'user_id' => $dataStore->user_id 
		);
		$getWidget = $this->mod_page->getUserPages ( null, $widgetWhereArr );
		
		$dataUserPage = $this->mod_category->menuUserPage ( $dataStore->user_id, 2, $getUserUrl );
		$dataDetailProduct = $this->mod_product->productDetailByOwnStore ( $product_id, $dataStore->user_id );
		/*get counter visitor*/
		$this->getTracking($dataStore->id);
		/*end get counter visitor*/
		return View::make ( 'frontend.modules.store.detail' )->with ( 'dataStore', $dataStore )->with ( 'dataUserPage', $dataUserPage )->with ( 'dataCategory', $dataCategory )->with ( 'toolView', $getToolPage->result )->with ( 'widtget', $getWidget->result )->with ( 'dataProductDetail', $dataDetailProduct );
	}
	
	
	public function searchUserPropuctByCategory($store, $label) {
		$getUlr = preg_match ( '/store-/', $store );
		if ($getUlr) {
			$storeArr = explode ( 'store-', $store );
			$storeID = $storeArr [1];
			$where = array (
					'id' => $storeID 
			);
			$dataStore = $this->mod_store->getUserStore ( null, $where );
		} else {
			$storeID = $store;
			
			$where = array (
					'sto_url' => $storeID 
			);
			$dataStore = $this->mod_store->getUserStore ( null, $where );
		}
		if (! empty ( $dataStore )) {
			/* get user cateory and sub */
			$getCategoryByName = $this->mod_category->getCategoryByName ( $label, $dataStore->user_id );
			$catArr = array ();
			if (! empty ( $getCategoryByName->data )) {
				array_push ( $catArr, $getCategoryByName->data->m_cat_id );
				$subCategory = $this->mod_category->getSubUserCategories ( $dataStore->user_id, $getCategoryByName->data->m_cat_id );
				if (! empty ( $subCategory )) {
					foreach ( $subCategory as $subCat ) {
						array_push ( $catArr, $subCat->m_cat_id );
					}
				}
			}
			$getUser = $this->user->getUser ( $dataStore->user_id );
			$getUserUrl = $this->mod_store->getStoreUrl ( $dataStore->id );
			if ($getUser->result->account_type == 2) {
				$dataCategory = $this->mod_category->menuUserList ( $dataStore->user_id, $parent = 0, 0, $getUserUrl );
			} else {
				$dataCategory = $this->mod_category->menuUserFree ( $dataStore->user_id, $parent = 0 );
			}
			$dataProduct = $this->mod_product->findProductByCategory ( $dataStore->id, $catArr );

			$dataUserPage = $this->mod_category->menuUserPage ( $dataStore->user_id, 2, $getUserUrl );
			/* end get user cateory and sub */
			$whereArr = array (
					'position' => 100,
					'user_id' => $dataStore->user_id 
			);
			/*get counter visitor*/
			$this->getTracking($dataStore->id);
			/*end get counter visitor*/
			$getToolPage = $this->mod_page->getUserPages ( null, $whereArr );
			return View::make ( 'frontend.modules.store.search' )->with ( 'dataStore', $dataStore )->with ( 'dataUserPage', $dataUserPage )->with ( 'dataCategory', $dataCategory )->with ( 'toolView', $getToolPage->result )->with ( 'dataProduct', $dataProduct );
		}
	}
	public function getUserPage($store, $page_id) {
		$getUlr = preg_match ( '/store-/', $store );
		if ($getUlr) {
			$storeArr = explode ( 'store-', $store );
			$storeID = $storeArr [1];
			$where = array (
					'id' => $storeID 
			);
			$dataStore = $this->mod_store->getUserStore ( null, $where );
		} else {
			$storeID = $store;
			
			$where = array (
					'sto_url' => $storeID 
			);
			$dataStore = $this->mod_store->getUserStore ( null, $where );
		}
		$whereUserPage = array (
				'id' => $page_id,
				'user_id' => $dataStore->user_id,
				'type' => 'static' 
		);
		$getUserPage = $this->mod_page->getUserPages ( null, $whereUserPage );
		$getUser = $this->user->getUser ( $dataStore->user_id );
		$getUserUrl = $this->mod_store->getStoreUrl ( $dataStore->id );
		if ($getUser->result->account_type == 2) {
			$dataCategory = $this->mod_category->menuUserList ( $dataStore->user_id, $parent = 0, 0, $getUserUrl );
		} else {
			$dataCategory = $this->mod_category->menuUserFree ( $dataStore->user_id, $parent = 0, $level = 0, $getUserUrl );
		}
		$whereArr = array (
				'position' => 100,
				'user_id' => $dataStore->user_id 
		);
		$getToolPage = $this->mod_page->getUserPages ( null, $whereArr );
		$getTracking = $this->mod_store->getTracking(array('cnt_page' => Request::path ()));

		$dataUserPage = $this->mod_category->menuUserPage ( $dataStore->user_id, 2, $getUserUrl );
		
		/*get counter visitor*/
		$this->getTracking($dataStore->id);
		/*end get counter visitor*/
		
		return View::make ( 'frontend.modules.store.page' )
		->with ( 'dataStore', $dataStore )
		->with ( 'dataCategory', $dataCategory )
		->with ( 'dataUserPage', $dataUserPage )
		->with ( 'dataUserPageView', $getUserPage->result )
		->with ( 'getTracking', $getTracking->result )
		->with ( 'toolView', $getToolPage->result );
	}
	public function getAnalytics() {
		define ( 'ga_profile_id', Config::get ( 'constants.GoogleAnalytics.profileDd' ) );
		$ga = new gapi ( Config::get ( 'constants.GoogleAnalytics.email' ), Config::get ( 'constants.GoogleAnalytics.oauthkeyfile' ) );
		$ga->requestReportData ( ga_profile_id, array (
				'browser',
				'browserVersion' 
		), array (
				'pageviews',
				'visits' 
		) );
		$dataAnalytics = array (
				'getVisits' => $ga->getVisits (),
				'getPageviews' => $ga->getPageviews (),
				'getTotalResults' => $ga->getTotalResults (),
				'getResults' => $ga->getResults () 
		);
		echo json_encode ( $dataAnalytics );
	}
	
	/*
	 * get visitor
	 * @deverloper Socheat
	 */
	public function getCounter() {
	}
	
	/*
	 * get visitor
	 * @deverloper Socheat
	 */
	public function getTracking($getOjbect = '', $type = 'page') {
		$visitor_ip = GetHostByName ( $_SERVER ['REMOTE_ADDR'] );
		$visitor_browser = $this->getBrowser()['name'];
		$visitor_hour = date ( "h" );
		$visitor_minute = date ( "i" );
		$visitor_day = date ( "d" );
		$visitor_month = date ( "m" );
		$visitor_year = date ( "Y" );
		$visitor_refferer = GetHostByName ( isset ( $_SERVER ['HTTP_REFERER'] ) ? $_SERVER ['HTTP_REFERER'] : '' );
		$data = array (
				'cnt_page' => Request::path (),
				'cnt_type' => $type,
				'cnt_ip' => $visitor_ip,
				'cnt_browser' => $visitor_browser,
				'cnt_hour' => $visitor_hour,
				'cnt_minute' => $visitor_minute,
				'cnt_day' => $visitor_day,
				'cnt_month' => $visitor_month,
				'cnt_year' => $visitor_year,
				'cnt_object_id' => @$getOjbect,
				'cnt_refferer' => $visitor_refferer 
		);
		$this->mod_store->visitorTracking ( $data );
	}
	
	/*
	 * get divice function
	 */
	function getBrowser() {
		$u_agent = $_SERVER ['HTTP_USER_AGENT'];
		$bname = 'Unknown';
		$platform = 'Unknown';
		$version = "";
		
		// First get the platform?
		if (preg_match ( '/linux/i', $u_agent )) {
			$platform = 'linux';
		} elseif (preg_match ( '/macintosh|mac os x/i', $u_agent )) {
			$platform = 'mac';
		} elseif (preg_match ( '/windows|win32/i', $u_agent )) {
			$platform = 'windows';
		}
		
		// Next get the name of the useragent yes seperately and for good reason
		if (preg_match ( '/MSIE/i', $u_agent ) && ! preg_match ( '/Opera/i', $u_agent )) {
			$bname = 'Internet Explorer';
			$ub = "MSIE";
		} elseif (preg_match ( '/Firefox/i', $u_agent )) {
			$bname = 'Mozilla Firefox';
			$ub = "Firefox";
		} elseif (preg_match ( '/Chrome/i', $u_agent )) {
			$bname = 'Google Chrome';
			$ub = "Chrome";
		} elseif (preg_match ( '/Safari/i', $u_agent )) {
			$bname = 'Apple Safari';
			$ub = "Safari";
		} elseif (preg_match ( '/Opera/i', $u_agent )) {
			$bname = 'Opera';
			$ub = "Opera";
		} elseif (preg_match ( '/Netscape/i', $u_agent )) {
			$bname = 'Netscape';
			$ub = "Netscape";
		}
		
		// finally get the correct version number
		$known = array (
				'Version',
				$ub,
				'other' 
		);
		$pattern = '#(?<browser>' . join ( '|', $known ) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
		if (! preg_match_all ( $pattern, $u_agent, $matches )) {
			// we have no matching number just continue
		}
		
		// see how many we have
		$i = count ( $matches ['browser'] );
		if ($i != 1) {
			// we will have two since we are not using 'other' argument yet
			// see if version is before or after the name
			if (strripos ( $u_agent, "Version" ) < strripos ( $u_agent, $ub )) {
				$version = $matches ['version'] [0];
			} else {
				$version = $matches ['version'] [1];
			}
		} else {
			$version = $matches ['version'] [0];
		}
		
		// check if we have a number
		if ($version == null || $version == "") {
			$version = "?";
		}
		
		return array (
				'userAgent' => $u_agent,
				'name' => $bname,
				'version' => $version,
				'platform' => $platform,
				'pattern' => $pattern 
		);
	}
}
