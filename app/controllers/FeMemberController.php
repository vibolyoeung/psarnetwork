<?php
class FeMemberController extends BaseController {

    private $mod_category;
    private $mod_setting;
    private $mod_member;
    protected $mod_market;
    protected $mod_store;
    protected $mod_page;
    protected $user;
    const CURRENT_DATE = 'Y-m-d';

    function __construct() {
        $this->mod_category = new MCategory();
        $this->mod_setting = new Setting();
        $this->mod_member = new Members();
        $this->mod_market = new Market();
        $this->mod_store = new Store();
        $this->mod_page = new MPage();
        $this->user = new User();
    }
    /**
     * Login operation
     *
     * @method index
     * @return void
     */
    public function index() {
        if (Input::has('BtnLogin')) {
            $loginName = Input::get('loginName');
            $password = Input::get('password');
            $result = $this->mod_member->memberLogin($loginName, $password);
            if (!empty($result)) {
                Session::put('currentUserId', $result->id);
                Session::put('currentUserName', $result->name);
                Session::put('currentUserEmail', $result->email);
                Session::put('currentUserPhone', $result->telephone);
                Session::put('currentUserType', $result->user_type);
                if (Input::has('page') && Input::has('page') == 'register') {
                    return Redirect::to('member/userinfo/' . $result->account_type . '/menu');
                } else {
                    //return Redirect::to('page/' . strtolower($result->name));
                    return Redirect::to('/');
                }
            } else {
                return Redirect::to('member/login')->with('INVALID_LOGIN',
                    'Username and Password is invalid!')->withInput();
            }
        }
        $listCategories = self::getCategoriesHomePage();
        return View::make('frontend.modules.member.index')->with('maincategories', $listCategories->
            result);
    }

    /**
     * Create a client user(e.g: Freee user or Enterprise user)
     *
     * @method createUser
     * @return void
     */
    public function createUser() {
        $addressArr = array(
            'province' => Input::get('province'),
            'disctict' => Input::get('district'),
            'g_latitude_longitude' => Input::get('gLatitudeLongitude'),
            );

        $data = array(
            'email' => trim(Input::get('email')),
            'name' => trim(Input::get('name')),
            'telephone' => Input::get('telephone'),
            'address' => json_encode(@$addressArr),
            'user_type' => Config::get('constants.CLIENT_USER'),
            'client_type' => Input::get('client_type'),
            'account_type' => Input::get('accounttype'),
            'account_role' => Input::get('accountRole'),
            'password' => md5(sha1(Input::get('password'))),
            'create_at' => date(self::CURRENT_DATE));

        /*add data for store*/
        $uid = $this->user->insertGetId($data);

        $storeData = array(
            'user_id' => $uid,
            'sup_id' => trim(Input::get('marketType')),
            );

        $sid = $this->mod_store->insertGetId($storeData);
        $accounttype = Input::get('accounttype');
        //        if ($accounttype == '1') {
        //            Mail::send(array('member.mails.index', 'text.view'), array('firstname' => Input::get('name')),
        //                function ($message)
        //            {
        //                $message->to(Input::get('email'), Input::get('name'))->
        //                    subject('Welcome to the Laravel 4 Auth App!'); }
        //            );
        //        } elseif ($accounttype == 2) {
        //
        //        }
        return $data = array(
            'user_id' => $uid,
            'store_id' => $sid,
            );
    }

    /**
     * Registeration operation
     *
     * @method register
     * @return void
     */
    public function register($usertype = '', $step = '') {
        if (Input::has('btnSubmit')) {

            $rules = array(
                'email' => 'required|email|unique:user',
                'password' => 'required|min:8',
                'password_confirm' => 'required|same:password',
                'captcha' => array('required', 'captcha'));
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->passes()) {
                $checkEmail = $this->user->checkEmail(trim(Input::get('email')));
                $data_user = $this->createUser();
                $accounttype = Input::get('accounttype');
                $messageRegister = 'Registration operation had been successful, please Login!';
                return Redirect::to('/member/agreement/' . $accounttype . '?uid=' . $data_user['user_id'] .
                    '&sid=' . $data_user['store_id'])->with('SECCESS_MESSAGE_REGISTER', $messageRegister);
            } else {
                return Redirect::to('member/register')->withInput()->withErrors($validator);
            }
        }

        $limit = $this->mod_setting->getSlidshowNumber();
        $listCategories = self::getCategoriesHomePage();
        $limit = $this->mod_setting->getSlidshowNumber();
        $listCategories = self::getCategoriesHomePage();
        $result = $this->mod_market->listingMarkets();
        $marketType = $this->mod_market->dataListingMarketsType();
        $provinces = $this->mod_setting->listProvinces();
        $accountRole = $this->user->accountRole();
        $clientType = $this->user->getClientType();

        return View::make('frontend.modules.member.register')->with('maincategories', $listCategories->
            result)->with('marketType', $marketType->data)->with('provinces', $provinces)->
            with('accountRole', $accountRole->data)->with('clientType', $clientType->data)->
            with('markets', $result->data);
    }

    public function test() {
        $limit = $this->mod_setting->getSlidshowNumber();
        $listCategories = self::getCategoriesHomePage();
        $limit = $this->mod_setting->getSlidshowNumber();
        $listCategories = self::getCategoriesHomePage();
        $result = $this->mod_market->listingMarkets();
        $marketType = $this->mod_market->dataListingMarketsType();
        $provinces = $this->mod_setting->listProvinces();
        $accountRole = $this->user->accountRole();
        $clientType = $this->user->getClientType();
        if (Request::getMethod() == 'POST') {
            $rules = array('captcha' => array('required', 'captcha'));
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->passes()) {
                echo '<p style="color: #00ff30;">Matched :)</p>';
            } else {
                return Redirect::to('/doeun/k')->withErrors($validator);

            }
        }
        return View::make('frontend.modules.member.k')->with('maincategories', $listCategories->
            result)->with('marketType', $marketType->data)->with('provinces', $provinces)->
            with('accountRole', $accountRole->data)->with('clientType', $clientType->data)->
            with('markets', $result->data);
    }

    public function agreement($usertype) {
        if (Input::has('btnSubmit')) {
            if (!Input::has('skipDetail')) {
                if (Input::has('btnSubmit')) {
                    $rules = array('sto_url' => 'required|unique:store');
                    if (Input::hasfile('file')) {
                        //$rules['file'] = Config::get ( 'constants.DIR_IMAGE.ALLOW_FILE' );
                        $rules['file'] = 'mimes:jpeg,png,bmp,gif|image';
                    }
                    $validator = Validator::make(Input::all(), $rules);
                    if ($validator->passes()) {
                        $fileName = '';
                        if (Input::hasfile('file')) {
                            /*upload image*/
                            $destinationPath = base_path() . Config::get('constants.DIR_IMAGE.DIR_STORE');
                            self::generateFolderUpload($destinationPath);
                            $destinationPathThumb = $destinationPath . 'thumb/';
                            $file = Input::file('file');
                            $fileName = $file->getClientOriginalName();
                            $fileName = self::generateFileName($destinationPath, $fileName);
                            $file->move($destinationPath, $fileName);
                            Image::make($destinationPath . $fileName)->resize(Config::get('constants.DIR_IMAGE.THUMB_WIDTH'),
                                Config::get('constants.DIR_IMAGE.THUMB_HEIGTH'))->save($destinationPathThumb . $fileName);
                            /*end upload image*/
                        }
                        $whereData = array(
                            'user_id' => (int)Input::get('uid'),
                            'id' => (int)Input::get('sid'),
                            );
                        $storeData = array(
                            'title_en' => trim(Input::get('titleen')),
                            'sto_url' => trim(Input::get('sto_url')),
                            'sto_banner' => trim(Input::get('PageBanner')),
                            'image' => trim($fileName),
                            );
                        $sid = $this->mod_store->where($whereData)->update($storeData);
                        $messageRegister = 'Registration operation had been successful, please check your email to confirm!';
                        return Redirect::to('/member/login/')->with('SECCESS_MESSAGE_REGISTER', $messageRegister);
                    } else {
                        return Redirect::to('/member/agreement/' . $usertype . '?uid=' . Input::get('uid') .
                            '&sid=' . Input::get('sid'))->withErrors($validator);
                    }
                }
            }
            die;
        } elseif (!empty($usertype)) {
            if ($usertype == 1) {
                return View::make('frontend.modules.member.free-agree');
            } elseif ($usertype == 2) {
                return View::make('frontend.modules.member.enterprise-agree');
            }
        } else {
            return View::make('frontend.modules.member.login');
        }
    }

    /**
     * Adding user information by step
     *
     * @method userinfo
     * @return void
     */
    public function userinfo($usertype = '', $step = '') {
        $limit = $this->mod_setting->getSlidshowNumber();
        $listCategories = self::getCategoriesHomePage();
        $userID = 1;
        if (!empty($usertype) && $usertype == 2) {
            $usertypes = 'enterprise';
        } else {
            $usertypes = 'free';
        }
        switch ($step) {
            case 'menu':
                $userCategory = $this->mod_category->menuShowNested($userID, $parent = 0);
                $getMainPage = $this->mod_page->getMainPages();
                $getUserPages = $this->mod_page->getUserPages($userID);
                if (Input::has('btnStepNext')) {

                    //$jsonCategory = Input::get('jsonCategory');
                    //                    $decodeCategory = json_decode($jsonCategory, true, 64);
                    //                    $readbleArray = $this->mod_category->userCategory($decodeCategory);
                    //
                    //                    /*Add or Update category*/
                    //                    $addOrUpdateCategory = $this->mod_category->addUserCategory($readbleArray);
                    $getUserCategory = $this->mod_category->getUserCategory($userID);
                    if (!empty($getUserPages->result) && !empty($getUserCategory->result)) {
                        return Redirect::to('/member/userinfo/' . $usertype . '/content');
                    } else {
                        $message = 'MESSAGE_NOT_ENOUGH_DATA';
                        return Redirect::to('/member/userinfo/' . $usertype . '/' . $step)->with('MESSAGE_NOT_ENOUGH_DATA',
                            $message);
                    }
                    die;
                }
                return View::make('frontend.modules.member.' . $usertypes . '-' . $step)->with('maincategories',
                    $listCategories->result)->with('userCategory', $userCategory)->with('getMainPage',
                    $getMainPage->result)->with('getUserPages', $getUserPages->result);
                break;

                /* user page content */
            case 'content':
                $storeID = 29;
                $whereData = array(
                    'user_id' => $userID,
                    'id' => $storeID,
                    );
                $dataStore = $this->mod_store->getUserStore(null, $whereData);
                $getUserPages = DB::table(Config::get('constants.TABLE_NAME.S_PAGE'))->select('*')->
                    where(array('user_id' => $userID, 'type' => 'widget'))->get();
                    $dataPageWidget = $this->mod_page->addUserWidgetPages($userID);
                
                return View::make('frontend.modules.member.' . $usertypes . '-' . $step)->with('maincategories',
                    $listCategories->result)->with('dataStore', $dataStore)->with('dataPageWidget',
                    $dataPageWidget->result);
                break;

        }
    }

    /**
     * Adding user information by step
     *
     * @method userinfo
     * @return void
     */
    public function content($usertype = '', $step = '') {
        $limit = $this->mod_setting->getSlidshowNumber();
        $listCategories = self::getCategoriesHomePage();
        $userID = 1;
        switch ($step) {
            case 'menu':
                $userCategory = $this->mod_category->menuShowNested($userID, $parent = 0);
                $getMainPage = $this->mod_page->getMainPages();
                $getUserPages = $this->mod_page->getUserPages($userID);
                if (Input::has('btnStepNext')) {

                    $jsonCategory = Input::get('jsonCategory');
                    $decodeCategory = json_decode($jsonCategory, true, 64);
                    $readbleArray = $this->mod_category->userCategory($decodeCategory);

                    /*Add or Update category*/
                    $addOrUpdateCategory = $this->mod_category->addUserCategory($readbleArray, $userID);
                }
                if (!empty($usertype) && $usertype == 2) {
                    return View::make('frontend.modules.member.enterprise-' . $step)->with('maincategories',
                        $listCategories->result)->with('userCategory', $userCategory)->with('getMainPage',
                        $getMainPage->result)->with('getUserPages', $getUserPages->result);
                } else {
                    return View::make('frontend.modules.member.free-' . $step)->with('maincategories',
                        $listCategories->result)->with('userCategory', $userCategory);
                }
                break;
        }
    }

    /**
     * Adding menu by ajax
     *
     * @method addmenuajax
     * @return void
     */
    public function addmenuajax() {
        $this->layout = null;
        $Category = Input::get('Category');
        $SubCategory = Input::get('SubCategory');
        $MainMenu = Input::get('MainMenu');

        if (!empty($MainMenu) || !empty($SubCategory) || !empty($Category)) {
            echo json_encode(array(
                'MainMenu' => $Category,
                'Category' => $Category,
                'SubCategory' => $SubCategory));
        }
    }

    /**
     * Upload image by ajax
     *
     * @method ajaxupload
     * @return json
     */
    public function ajaxupload() {
        $userID = 1;
        $storeID = 29;
        $this->layout = null;
        $page = Input::get('page');
        switch ($page) {
            case 'logoupload':
                if (Input::hasfile('file')) {
                    /*upload logo image*/
                    $destinationPath = base_path() . Config::get('constants.DIR_IMAGE.DIR_STORE');
                    $file = Input::file('file');

                    /* clean old image*/
                    $whereData = array(
                        'user_id' => $userID,
                        'id' => $storeID,
                        );
                    $checkStoreImage = $this->mod_store->getUserStore(null, $whereData);
                    if (!empty($checkStoreImage)) {
                        foreach ($checkStoreImage as $oldImage) {
                            $oldName = $destinationPath . '/' . $oldImage->image;
                            $thumb = $destinationPath . '/thumb/' . $oldImage->image;
                            if (File::exists($oldName)) {
                                File::delete($oldName, $thumb);
                            }
                        }
                    }
                    /* add or update new image*/
                    $images = $this->mod_store->doUpoad($file, $destinationPath, Config::get('constants.DIR_IMAGE.THUMB_WIDTH'),
                        Config::get('constants.DIR_IMAGE.THUMB_HEIGTH'));

                    /*update to store table DB*/
                    $storeData = array('image' => $images['image'], );
                    $this->mod_store->where($whereData)->update($storeData);
                    /*end update to store table DB*/
                } else {
                    $images = array("error" => "Sorry, Upload get an error");
                }
                echo json_encode($images);
                break;

            case 'bannerupload':
                if (Input::hasfile('file')) {
                    /*upload banner image*/
                    $destinationPath = base_path() . Config::get('constants.DIR_IMAGE.DIR_STORE');
                    $file = Input::file('file');

                    /* clean old image*/
                    $whereData = array(
                        'user_id' => $userID,
                        'id' => $storeID,
                        );
                    $checkStoreImage = $this->mod_store->getUserStore(null, $whereData);
                    if (!empty($checkStoreImage)) {
                        foreach ($checkStoreImage as $oldImage) {
                            $oldName = $destinationPath . '/' . $oldImage->sto_banner;
                            $thumb = $destinationPath . '/thumb/' . $oldImage->sto_banner;
                            if (File::exists($oldName)) {
                                File::delete($oldName, $thumb);
                            }
                        }
                    }

                    $images = $this->mod_store->doUpoad($file, $destinationPath, Config::get('constants.DIR_IMAGE.THUMB_WIDTH'),
                        Config::get('constants.DIR_IMAGE.THUMB_HEIGTH'));
                    /*update to store table DB*/
                    $storeData = array('sto_banner' => $images['image'], );
                    $this->mod_store->where($whereData)->update($storeData);
                    /*end update to store table DB*/
                } else {
                    $images = array("error" => "Sorry, Upload get an error");
                }
                echo json_encode($images);
                break;
        }
        die;
    }

    /**
     * get sub menu by ajax
     *
     * @method getsubmenu
     * @return void
     */
    public function getsubmenu() {
        $this->layout = null;
        $userID = 1;
        $MainMenu = Input::get('id');
        $getType = Input::get('type');
        $subMmenu = '';
        $subMmenu .= '<option value="">Select one</option>';
        if (!empty($MainMenu) && empty($getType)) {
            $Category = $this->mod_category->getSubCategories($MainMenu);
            $i = 0;
            if ($Category) {
                foreach ($Category as $subMenus) {
                    $i++;
                    $subMmenu .= '<option value="' . $subMenus->id . '">' . $subMenus->name_en .
                        '</option>';
                }
            }
            echo $subMmenu;
        } else
            if (!empty($MainMenu) && !empty($getType)) {

                switch ($getType) {
                    case 'name':
                        $Category = $this->mod_category->getCategoryById($MainMenu);
                        $subMmenu = array();
                        if ($Category) {
                            foreach ($Category as $subMenus) {
                                $subMmenu[] = $subMenus;
                            }
                        }
                        echo json_encode($subMmenu);
                        break;

                    case 'updateMenu':
                        $jsonstring = Input::get('jsonstring');
                        $deleteAll = Input::get('del');

                        // Decode it into an array
                        $jsonDecoded = json_decode($jsonstring, true, 64);
                        $readbleArray = $this->mod_category->userCategory($jsonDecoded);

                        /*Add or Update category*/
                        if (!empty($deleteAll)) {
                            $addOrUpdateCategory = $this->mod_category->DelUserCategory($userID);
                        }
                        $addOrUpdateCategory = $this->mod_category->addUserCategory($readbleArray, $userID);
                        break;

                    case 'addUserPage':
                        $position = Input::get('pos');
                        $getMainPage = $this->mod_page->addUserPages($userID, $MainMenu, $position);
                        echo json_encode($getMainPage->result);
                        break;

                    case 'removeUserPage':
                        $getMainPage = $this->mod_page->removeUserPages($userID, $MainMenu);
                        break;

                    case 'userPage':
                        $order = Input::get('order');
                        $getMainPage = $this->mod_page->addUserWidgetPage($userID, $MainMenu, $order);
                        break;
                        
                    case 'userPageStatus':
                        $status = Input::get('st');
                        $response = DB::table(Config::get('constants.TABLE_NAME.S_PAGE'))->where(array('id'=>$MainMenu))->update(array('status'=>$status));
                        break; 
                        
                    case 'userLayout':
                        $getUserStore = $this->mod_store->getUserStore($userID);
                        if(!empty($getUserStore)) {
                            $userStoreID = $getUserStore[0]->id;
                            $where = array('user_id'=>$userID,'id'=>$userStoreID);
                            $dataSet = array(
                                'layout' =>$MainMenu
                            );
                            $response = DB::table(Config::get('constants.TABLE_NAME.STORE'))->where($where)->update(array('sto_value'=>json_encode($dataSet)));
                        }
                        break;       
                }
            }

        die;
    }
    /**
     * List all slideshows
     *
     * @method getSlideshowToHomePage
     * @param int $limit
     * @return array that contains slideshows
     */
    public function getSlideshowToHomePage($limit) {
        $slideshow = $this->mod_slideshow->getSlideshowToFrontEnd($limit);
        return $slideshow;
    }

    /**
     * List all categories for home page
     *
     * @method getCategoriesHomePage
     * @return array that contains categories
     */
    public function getCategoriesHomePage() {
        $Category = $this->mod_category->getMainCategories();
        return $Category;
    }

    /**
     * List all districts
     *
     * @method getDistric
     * @return array that contains districts
     */
    public function getDistric() {
        $this->layout = null;
        $pro_id = Input::get('pro_id');
        $disct_val = '';
        if (!empty($pro_id)) {
            $disctrict = $this->user->getDistrict($pro_id);
            foreach ($disctrict->data as $disct) {
                $disct_val .= '<option value="' . $disct->id . '" data-gps="' . $disct->
                    dis_lat_long . '">' . $disct->dis_name . '</option>';
            }
            echo $disct_val;
        }
        die;
    }

    /**
     * List all ClientTypes
     *
     * @method getClientType
     * @param int $id
     * @return array that contains client types
     */
    public function getClientType($id) {
        $this->layout = null;
        $Client_val = '';
        $getClientType = $this->user->getClientType($id);
        foreach ($getClientType->data as $ClientType) {
            $Client_val .= '<option value="' . $ClientType->id . '">' . $ClientType->name .
                '</option>';
        }
        echo $Client_val;
    }

    /**
     * List all MarketTypes
     *
     * @method getMarketType
     * @param int $id
     * @return array that contains MarketTypes
     */
    public function getMarketType($id) {
        $this->layout = null;
        $Market_val = '';
        $getMarketType = $this->user->getMarketType($id);
        foreach ($getMarketType->data as $marketType) {
            $Market_val .= '<option value="' . $marketType->id . '">' . $marketType->
                title_en . '</option>';
        }
        echo $Market_val;
    }

    /**
     * Generation fileName when uploading file
     * @return filename by generation
     * @access public
     * @method generateFileName
     * @throws Exception
     */
    public static function generateFileName($pathName, $fileName = null) {

        $temp = explode(".", $fileName);
        $fileName = end($temp);
        $fileName = time() . '.' . $fileName;
        if (file_exists($pathName . $fileName)) {
            return generateFileName($pathName);
        }

        return $fileName;
    }

    /**
     * Generation folder when uploading file doesnot exist
     *
     * @return boolean
     * @access private
     * @method generateFolderUpload
     * @throws ErrorException
     */
    private static function generateFolderUpload($destinationPath) {
        $destinationPathThumb = $destinationPath . '/thumb/';
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
            if (!file_exists($destinationPathThumb)) {
                mkdir($destinationPathThumb, 0777, true);
            }
        }
    }
}
