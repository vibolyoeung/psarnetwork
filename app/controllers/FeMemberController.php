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
                Session::put('currentUserAddress', $result->address);
                Session::put('currentUserType', $result->user_type);
                Session::put('currentUserAccountType', $result->account_type);
                if (Input::has('page') && Input::has('page') == 'register') {
                    return Redirect::to('member/userinfo/' . $result->account_type . '/menu');
                } else {
                    $checkStore = $this->mod_store->getUserStore($result->id);
                    return Redirect::to('page/' . $checkStore->id);
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
     * store a client session
     * @method tempUser
     * @return void
     * @author Socheat Ngann
     */
    public function tempUser() {
        $addressArr = array(
            'province' => Input::get('province'),
            'disctict' => Input::get('district'),
            'g_latitude_longitude' => Input::get('gLatitudeLongitude'),
            );
        Session::forget('user');
        Session::push('user.email', trim(Input::get('email')));
        Session::push('user.name', trim(Input::get('name')));
        Session::push('user.telephone', trim(Input::get('telephone')));
        Session::push('user.address', json_encode(@$addressArr));
        Session::push('user.user_type', Config::get('constants.CLIENT_USER'));
        Session::push('user.client_type', Input::get('client_type'));
        Session::push('user.account_type', Input::get('accounttype'));
        Session::push('user.account_role', Input::get('accountRole'));
        Session::push('user.status', 1);
        Session::push('user.password', md5(sha1(Input::get('password'))));
        Session::push('user.create_at', date(self::CURRENT_DATE));
        return Session::get('user');

    }

    /**
     * Create a client user(e.g: Freee user or Enterprise user)
     * @method createUser
     * @return void
     * @author Socheat Ngann
     */
    public function createUser() {
        if (Session::has('user')) {
            $addressArr = array(
                'province' => Input::get('province'),
                'disctict' => Input::get('district'),
                'g_latitude_longitude' => Input::get('gLatitudeLongitude'),
                );
            $dataUserSession = Session::get('user');
            $userArr = array();
            foreach($dataUserSession as $key => $value) {
                $userArr[$key] = $value[0];
            }
            $uid = $this->user->insertGetId($userArr);
            /*add data for store*/
            if (!Input::has('skipDetail')) {
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
                        'user_id' => $uid,
                        'sup_id' => trim(Input::get('marketType')),
                        'sto_value' => json_encode(array('layout' => Config::get('constants.LAYOUT.layout1')))
                    );
                
                //$sid = $this->mod_store->where($whereData)->update($storeData);
            } else {
                    $storeData = array(
                        'user_id' => $uid,
                        'sup_id' => trim(Input::get('marketType')),
                        'sto_value' => json_encode(array('layout' => Config::get('constants.LAYOUT.layout1')))
                    );
                
                
            }
            $sid = $this->mod_store->insertGetId($storeData);
            
            /*add Defualt Page for user*/
            $getMainPage = $this->mod_page->getMainPages();
            if(!empty($getMainPage)) {
                foreach($getMainPage->result as $dPage) {
                    $addDefualtPage = $this->mod_page->addUserPages($uid, $dPage->id, 1);
                }
            }
            /*end add Defualt Page for user*/
            
            /*add tool view for user*/
            $toolType= 'tool';
            $whereArr = array(
                'status' => 1,
                'title_km' => $toolType,
            );
            $getToolPage = $this->mod_page->getMainPages(null, $whereArr);

            if(!empty($getToolPage)) {
                foreach($getToolPage->result as $tooPage) {
                    $addToolPage = $this->mod_page->addUserPages($uid, $tooPage->id, 100, $tooPage->type);
                }
            }
            /*end add tool view for user*/
            
            /*add widget for user*/
            $widgetType= 'widget';
            $whereArrWdidget = array(
                'status' => 1,
                'type' => $widgetType,
            );
            $getWidgetPage = $this->mod_page->getMainPages(null, $whereArrWdidget);
            if(!empty($getWidgetPage)) {
                foreach($getWidgetPage->result as $getPage) {
                    $addToolPage = $this->mod_page->addUserPages($uid, $getPage->id, 1, $widgetType);
                }
            }
            /*end add widget for user*/
            
            /*clear session user*/
            Session::flush();
        }
        return $data = array(
            'user_id' => $uid,
            'store_id' => $sid,
            );
    }

    /**
     * Registeration operation
     * @method register
     * @return void
     * @author Socheat Ngann
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
                $data_user = $this->tempUser();
                $accounttype = Input::get('accounttype');
                $messageRegister = 'Registration operation had been successful, please Login!';
                return Redirect::to('/member/agreement/' . $accounttype)->with('SECCESS_MESSAGE_REGISTER',
                    $messageRegister);
            } else {
                return Redirect::to('/member/register')->withInput()->withErrors($validator);
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
            if (Input::has('skipDetail')) {
                $rules = array('sto_url' => 'required|unique:store');
                if (Input::hasfile('file')) {
                    //$rules['file'] = Config::get ( 'constants.DIR_IMAGE.ALLOW_FILE' );
                    $rules['file'] = 'mimes:jpeg,png,bmp,gif|image';
                }
            } else {
                $rules = array();
            }
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->passes()) {
                DB::beginTransaction();
                try {
                    $data_user = $this->createUser();
                }
                catch (ValidationException $e) {
                    DB::rollback();
                }
                DB::commit();
                $messageRegister = 'Registration operation had been successful, please check your email to confirm!';
                return Redirect::to('/member/login/')->with('SECCESS_MESSAGE_REGISTER', $messageRegister);
            } else {
                return Redirect::to('/member/agreement/' . $usertype)->withErrors($validator);
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
     * Get step user information by step
     * @method userinfo
     * @return void
     * @author Socheat Ngann
     */
    public function userinfo($step = '') {
        $limit = $this->mod_setting->getSlidshowNumber();
        $listCategories = self::getCategoriesHomePage();
        $userID = Session::get('currentUserId');
        $userInfo = $this->user->getUser($userID);
        $usertype = @$userInfo->result->account_type;
        $getUserStore = $this->mod_store->getUserStore($userID);
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
                    $getUserCategory = $this->mod_category->getUserCategory($userID);
                    if (!empty($getUserPages->result) && !empty($getUserCategory->result)) {
                        return Redirect::to('/member/userinfo/content');
                    } else {
                        $message = 'MESSAGE_NOT_ENOUGH_DATA';
                        return Redirect::to('/member/userinfo/' . $step)->with('MESSAGE_NOT_ENOUGH_DATA',
                            $message);
                    }
                    die;
                }
                return View::make('frontend.modules.member.' . $usertypes . '-' . $step)->with('maincategories',
                    $listCategories->result)->with('userCategory', $userCategory)->with('getMainPage',
                    $getMainPage->result)->with('getUserPages', $getUserPages->result)->with('dataStore', $getUserStore);
                break;

                /* user page content */
            case 'content':
                if (!empty($getUserStore)) {
                    $storeID = $getUserStore->id;
                } else {
                    $storeID = null;
                }
                $whereData = array(
                    'user_id' => $userID,
                    'id' => $storeID,
                    );
                $dataStore = $this->mod_store->getUserStore(null, $whereData);
                $getUserPages = DB::table(Config::get('constants.TABLE_NAME.S_PAGE'))->select('*')->
                    where(array('user_id' => $userID, 'type' => 'widget'))->get();
                $dataPageWidget = $this->mod_page->addUserWidgetPages($userID);
                return View::make('frontend.modules.member.' . $step)->with('maincategories',
                    $listCategories->result)->with('dataStore', $dataStore)->with('dataPageWidget',
                    $dataPageWidget->result);
                break;

            case 'infomation':
                $userData = $this->user->getUser($userID);
                if (Input::has('btnInfo')) {

                    $userValueArr = json_decode($userData->result->address, true);
                    $ValueArr = array('g_latitude_longitude' => Input::get('gLatitudeLongitude'));
                    $dataArr = array_merge($userValueArr, $ValueArr);
                    $messages = '';
                    if (Input::has('cPass')) {
                        $queryPass = $this->checkPassword(Input::get('cPass'));
                        $cPass = Input::get('cPass');
                        $nPass = Input::get('nPass');
                        $rPass = Input::get('rPass');
                        if(!empty($queryPass) && $nPass === $rPass) {
                            $data = array(
                                'email' => trim(Input::get('email')),
                                'name' => trim(Input::get('name')),
                                'telephone' => Input::get('telephone'),
                                'address' => json_encode($dataArr),
                                'password' => md5(sha1($nPass)),
                                'update_at' => date(self::CURRENT_DATE)
                            );
                            $messages = 'message_save_with_pass';
                        } else {
                            $data = array(
                                'email' => trim(Input::get('email')),
                                'name' => trim(Input::get('name')),
                                'telephone' => Input::get('telephone'),
                                'address' => json_encode($dataArr),
                                'update_at' => date(self::CURRENT_DATE)
                            );
                            $messages = 'message_save_no_pass_but_data';
                        }
                    } else {
                        $data = array(
                            'email' => trim(Input::get('email')),
                            'name' => trim(Input::get('name')),
                            'telephone' => Input::get('telephone'),
                            'address' => json_encode($dataArr),
                            'update_at' => date(self::CURRENT_DATE)
                        );
                        $messages = 'message_save_no_pass_but_data';
                    }
                    
                    /*add data for store*/
                    $whereUser = array('id' => $userID);
                    $uid = $this->user->updateUser($whereUser, $data);
                    return Redirect::to('/member/userinfo/infomation')
                    ->with('messsage', $messages);
                }
                return View::make('frontend.modules.member.' . $step)
                    ->with('maincategories',$listCategories->result)
                    ->with('userData', $userData->result)
                    ->with('dataStore', $getUserStore);
                break;

            case 'pageinfo':
                return View::make('frontend.modules.member.' . $usertypes . '-' . $step)->with('maincategories',
                    $listCategories->result)->with('dataStore', $getUserStore);
                break;
                
            case 'toolview':
                if (Input::has('btnInfo')) {
                    $ToolViewId = Input::get('tooview');
                    if(!empty($ToolViewId)) {
                        DB::table(Config::get('constants.TABLE_NAME.S_PAGE'))->where(array('user_id' =>$userID,'position' => 100))->update(array('status'=>0));
                        foreach($ToolViewId as $toolId) {
                            DB::table(Config::get('constants.TABLE_NAME.S_PAGE'))->where(array('user_id' =>$userID,'position' => 100,'id'=>$toolId))->update(array('status'=>1));
                        }
                    }
                    return Redirect::to('/member/userinfo/toolview')->with(Session::flash('messsage', 'message_save_success'));
                }
                $whereArr = array(
                    'position' => 100,
                    'user_id' => $userID
                );
                $getToolPage = $this->mod_page->getUserPages(null, $whereArr);
                return View::make('frontend.modules.member.s-toolview')
                ->with('maincategories',$listCategories->result)
                ->with('toolView',$getToolPage->result)
                ->with('dataStore', $getUserStore);
                break;
                
            case 'summary':
                $accountRole = $this->user->accountRole();
                $userData = $this->user->getUser($userID);
                $clientType = $this->user->getClientType();
                $userCategory = $this->user->getUserCategory($userID);
                $userProductsCount = count($this->user->getUserProducts($userID));
                $provinces = $this->mod_setting->listProvinces();
                return View::make('frontend.modules.member.summary')
                ->with('maincategories',$listCategories->result)
                ->with('userData', $userData->result)
                ->with('accountRole', $accountRole->data)
                ->with('clientType', $clientType->data)
                ->with('userCategory', $userCategory->data)
                ->with('ProductsCount', $userProductsCount)
                ->with('provinces', $provinces)
                ->with('dataStore', $getUserStore);
                break;
                
            case 'slideshow':
                return View::make('frontend.modules.member.s-slideshow')
                ->with('maincategories',$listCategories->result)
                ->with('dataStore', $getUserStore);
                break;
                
            case 'banner':
                if (Input::has('btnInfo')) {
                    if (Input::hasfile('file')) {
                        $destinationPath = base_path() . Config::get('constants.DIR_IMAGE.USER_BANNER');
                        $file = Input::file('file');
                        $images = $this->mod_store->doUpoad($file, $destinationPath, 
                            Config::get('constants.DIR_IMAGE.THUMB_WIDTH'),
                            Config::get('constants.DIR_IMAGE.THUMB_HEIGTH')
                        );
                        if(!empty($images['image'])) {
                            $image_file = $images['image'];
                        } else {
                            $image_file = ' ';
                        }
                    } else {
                        $image_file = ' ';
                    }
                    if (Input::has('edit')) {
                        if(Input::get('oldimage') && Input::hasfile('file')) {
                            $oldName = $destinationPath . '/' . Input::get('oldimage');
                            $thumb = $destinationPath . '/thumb/' . Input::get('oldimage');
                            if (File::exists($oldName)) {
                                File::delete($oldName, $thumb);
                            }
                        } else if(Input::get('oldimage') && !Input::hasfile('file')) {
                            $image_file = Input::get('oldimage');
                        }
                        $data = array(
                            'ban_title' => trim(Input::get('title')),
                            'ban_enddate' => trim(Input::get('enddate')),
                            'ban_link' => trim(Input::get('link')),
                            'ban_image' => $image_file,
                            'ban_store_id' => $getUserStore->id,
                            'ban_status' => Input::get('status'),
                            'ban_position' => Input::get('positions')
                        );
                        $response = DB::table(Config::get('constants.TABLE_NAME.USER_BANNER'))
                                        ->where(array('ban_id' =>Input::get('edit'),'ban_store_id' =>$getUserStore->id))
                                        ->update($data);
                    } else {
                        $data = array(
                            'ban_title' => trim(Input::get('title')),
                            'ban_cdate' => date(self::CURRENT_DATE),
                            'ban_enddate' => trim(Input::get('enddate')),
                            'ban_link' => trim(Input::get('link')),
                            'ban_image' => $image_file,
                            'ban_store_id' => $getUserStore->id,
                            'ban_status' => Input::get('status'),
                            'ban_position' => Input::get('positions')
                        );
                        $response = DB::table(Config::get('constants.TABLE_NAME.USER_BANNER'))
                                        ->insertGetId($data);
                    }
                }
                $result = array();
                if (Input::has('action')) {
                    if(Input::get('action') != 'add' && Input::get('action') != 'del') {
                        $where = array('ban_store_id'=>$getUserStore->id,'ban_id'=>Input::get('action'));
                        $result = DB::table(Config::get('constants.TABLE_NAME.USER_BANNER'))->select('*')->where($where)->orderBy('ban_id', 'desc')->first();
                    } else if(Input::get('action') == 'del') {
                        $where = array('ban_store_id' => $getUserStore->id, 'ban_id' =>Input::get('id'));
                        DB::table(Config::get('constants.TABLE_NAME.USER_BANNER'))->where($where)->delete();
                        return Redirect::to('/member/userinfo/banner')->with(Session::flash('messsage', 'message_del_success'));
                        die;
                    } else {
                        $where = array('ban_store_id'=>$getUserStore->id);
                        $result = DB::table(Config::get('constants.TABLE_NAME.USER_BANNER'))->select('*')->where($where)->orderBy('ban_id', 'desc')->get();
                    }
                } else {
                    $where = array('ban_store_id'=>$getUserStore->id);
                    $result = DB::table(Config::get('constants.TABLE_NAME.USER_BANNER'))->select('*')->where($where)->orderBy('ban_id', 'desc')->get();
                }
                return View::make('frontend.modules.member.s-banner')
                ->with('maincategories',$listCategories->result)
                ->with('dataStore', $getUserStore)
                ->with('dataBanner', $result);
                break;  
                              
            case 'accountinfo':
                $accountRole = $this->user->accountRole();
                $clientType = $this->user->getClientType();
                $getUser = $this->user->getUser($userID);
                $result = $this->mod_market->listingMarkets();
                
                /*update*/
                if (Input::has('btnInfo')) {
                    $dataEdits = array(
                        'account_role' =>Input::get('accountRole'),
                        'client_type' =>Input::get('client_type'),
                    );
                    $response = DB::table(Config::get('constants.TABLE_NAME.USER'))
                                        ->where(array('id' =>$userID))
                                        ->update($dataEdits);
                    if (Input::has('marketType')) {
                        $response = DB::table(Config::get('constants.TABLE_NAME.STORE'))
                                        ->where(array('user_id' =>$userID))
                                        ->update(array('sup_id'=>Input::get('marketType')));
                    } else {
                        $response = DB::table(Config::get('constants.TABLE_NAME.STORE'))
                                        ->where(array('user_id' =>$userID))
                                        ->update(array('sup_id'=>0));
                    }
                    return Redirect::to('/member/userinfo/accountinfo')->with(Session::flash('messageSuccess', 'message_save_success'));
                }
                
                /*end update*/
                
                return View::make('frontend.modules.member.acountinfo')
                ->with('maincategories',$listCategories->result)
                ->with('accountRole', $accountRole->data)
                ->with('clientType', $clientType->data)
                ->with('markets', $result->data)
                ->with('userData', $getUser->result)
                ->with('dataStore', $getUserStore);
                break;
                
            case 'addpage':
                if (Input::has('id')) {
                    $whereEdit = array('user_id' => $userID, 'type'=>'static','id'=>Input::get('id'));
                    $dataEditArr = $this->mod_page->getUserPages(null, $whereEdit);
                    $dataEdit = $dataEditArr->result;
                } else {
                    $dataEdit = array();
                }
                if (Input::has('btnInfo')) {
                    if (Input::has('editPage')) {
                        $dataEdits = array(
                            'title' => trim(Input::get('name')),
                            'description' => trim(Input::get('body')),
                            'position' => Input::get('menuPosition')
                        );
                        $response = DB::table(Config::get('constants.TABLE_NAME.S_PAGE'))
                                        ->where(array('id' =>Input::get('editPage')))
                                        ->update($dataEdits);
                    } else {
                        /*add data for user page*/
                        $data = array(
                            'title' => trim(Input::get('name')),
                            'description' => trim(Input::get('body')),
                            'type' => 'static',
                            'user_id' => $userID,
                            'position' => Input::get('menuPosition')
                        );
                        $where = array('user_id' => $userID, 'type'=>'static','title'=>trim(Input::get('name')));
                        $checkUserPage = $this->mod_page->getUserPages(null, $where);
                        if (empty($checkUserPage->result)) {
                            $this->mod_page->addUserMenuPages($data);
                        }
                    }
                    return Redirect::to('member/userinfo/addpage');
                }
                
                /*Delete user static page*/
                if (Input::has('del')) {
                    $response = DB::table(Config::get('constants.TABLE_NAME.S_PAGE'))
                                    ->where(array('id' =>Input::get('del'),'user_id' => $userID))
                                    ->delete();
                }
                /*end Delete user static page*/
                $getUserPage = $this->mod_page->getUserPages($userID);
                return View::make('frontend.modules.member.s-addpage')
                ->with('maincategories',$listCategories->result)
                ->with('datapage',$getUserPage->result)
                ->with('dataEdit',$dataEdit)
                ->with('dataStore', $getUserStore);
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
        $userID = Session::get('currentUserId');
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
        $userID = Session::get('currentUserId');
        $this->layout = null;
        $getUserStore = $this->mod_store->getUserStore($userID);
        if (!empty($getUserStore)) {
            $storeID = $getUserStore->id;
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
                            $oldName = $destinationPath . '/' . $checkStoreImage->image;
                            $thumb = $destinationPath . '/thumb/' . $checkStoreImage->image;
                            if (File::exists($oldName)) {
                                File::delete($oldName, $thumb);
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
                            $oldName = $destinationPath . '/' . $checkStoreImage->sto_banner;
                            $thumb = $destinationPath . '/thumb/' . $checkStoreImage->sto_banner;
                            if (File::exists($oldName)) {
                                File::delete($oldName, $thumb);
                            }
                        }
    
                        $images = $this->mod_store->doUpoad($file, $destinationPath, Config::get('constants.DIR_IMAGE.THUMB_WIDTH'),
                            Config::get('constants.DIR_IMAGE.THUMB_HEIGTH'));
                        /*update to store table DB*/
                        $storeData = array('sto_banner' => $images['image']);
                        $this->mod_store->where($whereData)->update($storeData);
                        /*end update to store table DB*/
                    } else {
                        $images = array("error" => "Sorry, Upload get an error");
                    }
                    echo json_encode($images);
                    break;
            }
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
        $userID = Session::get('currentUserId');
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
                        $response = DB::table(Config::get('constants.TABLE_NAME.S_PAGE'))->where(array('id' =>
                                $MainMenu))->update(array('status' => $status));
                        break;

                    case 'userLayout':
                        $getUserStore = $this->mod_store->getUserStore($userID);
                        if (!empty($getUserStore)) {
                            $userStoreID = $getUserStore->id;
                            $where = array('user_id' => $userID, 'id' => $userStoreID);
                            $dataSet = array('layout' => $MainMenu);
                            $response = DB::table(Config::get('constants.TABLE_NAME.STORE'))->where($where)->
                                update(array('sto_value' => json_encode($dataSet)));
                        }
                        break;

                    case 'userLayoutFooter':
                        $getUserStore = $this->mod_store->getUserStore($userID);
                        if (!empty($getUserStore)) {
                            $userStoreID = $getUserStore->id;
                            $userStoresValue = $getUserStore->sto_value;
                            if (is_null($userStoresValue)) {
                                $dataArr = array('footer_text' => $MainMenu);
                            } else {
                                $userStoresValueArr = json_decode($userStoresValue, true);
                                if (array_key_exists('footer_text', $userStoresValueArr)) {
                                    $ValueArr = array('footer_text' => $MainMenu);
                                    $dataArr = array_merge($userStoresValueArr, $ValueArr);
                                } else {
                                    $dataArr = array('footer_text' => $MainMenu, 'layout' => $userStoresValueArr['layout']);
                                }
                            }
                            $where = array('user_id' => $userID, 'id' => $userStoreID);
                            $response = DB::table(Config::get('constants.TABLE_NAME.STORE'))->where($where)->
                                update(array('sto_value' => json_encode($dataArr)));
                        }
                        break;
                        
                    case 'userHeaderTitle':
                        if($userID && !empty($MainMenu)) {
                            $response = DB::table(Config::get('constants.TABLE_NAME.STORE'))
                            ->where(
                                array('user_id' =>$userID)
                                )
                            ->update(array('title_en' => $MainMenu));
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
    
    public function checkPassword ($password) {
        $query = DB::table(Config::get('constants.TABLE_NAME.USER'));
        $query->where(
            array(
                'password'=>md5(sha1($password)),
                'id'=> Session::get('currentUserId')
            )
        );
        return $query->first();
    }
    public function getSignOut() {
        Session::flush();
        return Redirect::to(Config::get('app.url'));
    }     
}
