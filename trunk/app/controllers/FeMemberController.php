<?php

class FeMemberController extends BaseController {

    private $mod_category;
    private $mod_setting;
    protected $mod_market;
    protected $mod_store;
    protected  $user;
    const CURRENT_DATE = 'Y-m-d';

    function __construct() {
        $this->mod_slideshow = new Slideshow();
    	$this->mod_category = new MCategory();
    	$this->mod_setting = new Setting();
        $this->mod_market = new Market();
        $this->mod_store = new Store();
        $this->user = new User();
       
    }


    public function index()
    {
    	$listCategories = self::getCategoriesHomePage();
    	return View::make('frontend.modules.member.index')
    	   ->with('maincategories', $listCategories->result);     
    }
    
 	public function createUser(){
		if(Input::has('btnSubmit')){
			$rules = array(
				'email' => 'required|email|unique:user',
				'password' => 'required|min:8',
				'password_confirm'=>'required|same:password',
			);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
    			 $addressArr = array(
                    'province'=>Input::get('province'),
                    'disctict'=>Input::get('district'),
                    'g_latitude_longitude'=>Input::get('gLatitudeLongitude'),
                 );
                $data = array(
    				'email'=>trim(Input::get('email')),
    				'name'=>trim(Input::get('name')),
    				'telephone'=>Input::get('telephone'),
    				'address'=>json_encode(@$addressArr),
                    'user_type'=>Config::get('constants.CLIENT_USER'),
                    'client_type'=>Input::get('client_type'),
                    'account_type'=>Input::get('accounttype'),
                    'account_role'=>Input::get('accountRole'),
                    'password'=>md5(sha1(Input::get('password'))),
                    'create_at'=>date(self::CURRENT_DATE)
				);
				$uid = $this->user->insertGetId($data);
                
                /*add data for store*/
                $storeData = array(
    				'user_id'=>$uid,
    				'sup_id'=>trim(Input::get('marketType')),
				);
                $uid = $this->mod_store->insertGetId($storeData);
                /*end add data for store*/
				return Redirect::to('member/register')->with('SECCESS_MESSAGE','A user has been added successfully');
			}else{
				return Redirect::to('member/register')->withInput()->withErrors($validator);
			}
		}
	}
       
    public function register($usertype = '',$step='') {
        $limit = $this->mod_setting->getSlidshowNumber();
    	$listCategories = self::getCategoriesHomePage();
        $this->createUser();
        $result = $this->mod_market->listingMarkets();	
        $marketType = $this->mod_market->dataListingMarketsType();
        $provinces = $this->mod_setting->listProvinces();
        $accountRole = $this->user->accountRole();
        $clientType = $this->user->getClientType();
        return View::make('frontend.modules.member.register')
    	       ->with('maincategories', $listCategories->result)
               ->with('marketType', $marketType->data)
               ->with('provinces', $provinces)
               ->with('accountRole', $accountRole->data)
               ->with('clientType', $clientType->data)
               ->with('markets', $result->data);
//        if (!empty($usertype)) {
////            switch($step){
////                case 'agree':
////                $paramate = $usertype.'-'.$agree
////               break;
////            }
//             return View::make('frontend.modules.member.'.$usertype.'-'.$step)
//    	       ->with('maincategories', $listCategories->result);   
////            if ($usertype == 'enterprise') {
////                return View::make('frontend.modules.member.enterprise')
////    	       ->with('maincategories', $listCategories->result);
////            } else {
////                return View::make('frontend.modules.member.freesell')
////	           ->with('maincategories', $listCategories->result);
////            }
//        } else {
//            return View::make('frontend.modules.member.register')
//    	       ->with('maincategories', $listCategories->result)
//               ->with('marketType', $marketType->data)
//               ->with('provinces', $provinces)
//               ->with('markets', $result->data);
//        }
    }
    
    public function addmenuajax (){
        $this->layout = null;
        $Category = Input::get('Category');
        $SubCategory = Input::get('SubCategory');
        $MainMenu = Input::get('MainMenu');
        if(!empty($MainMenu)|| !empty($SubCategory)||!empty($Category)) {
            echo json_encode(array('MainMenu' => $Category, 'Category'=>$Category, 'SubCategory'=>$SubCategory));
        }
    }
    
    public function getSlideshowToHomePage($limit){
    	$slideshow = $this->mod_slideshow->getSlideshowToFrontEnd($limit);
    	return $slideshow;
    }
    
    public function getCategoriesHomePage(){
    	$Category = $this->mod_category->getMainCategories();
    	return $Category;
    }
    public function getDistric(){
        $this->layout = null;
    	$pro_id = Input::get('pro_id');
        $disct_val = '';
        if(!empty($pro_id)) {
            $disctrict = $this->user->getDistrict($pro_id);
            foreach($disctrict->data as $disct) {
                $disct_val .='<option value="'.$disct->id.'" data-gps="'.$disct->dis_lat_long.'">'.$disct->dis_name.'</option>';
            }
            echo $disct_val;
        }
        die;
    }
    public function getClientType($id){
        $this->layout = null;
        $Client_val = '';
        $getClientType = $this->user->getClientType($id);
        foreach($getClientType->data as $ClientType) {
            $Client_val .='<option value="'.$ClientType->id.'">'.$ClientType->name.'</option>';
        }
        echo $Client_val;
    }
     public function getMarketType($id){
        $this->layout = null;
        $Market_val = '';
        $getMarketType = $this->user->getMarketType($id);
        foreach($getMarketType->data as $marketType) {
            $Market_val .='<option value="'.$marketType->id.'">'.$marketType->title_en.'</option>';
        }
        echo $Market_val;
    }   
}
