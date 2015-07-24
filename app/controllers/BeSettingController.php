<?php
class BeSettingController extends BaseController {

	protected  $modUserGroup;
	protected  $modSetting;

	const LATEST_PRODUCT_MODE = 'setting_view_mode_latest_product';
	const ENTERPRISE_STORE_MODE = 'setting_view_mode_enterprise_store';
	const BUYER_REQUEST_MODE = 'setting_view_mode_buyer_request';

	public function __construct() {
		$this->modUserGroup = new UserGroup();
		$this->modSetting = new Setting();
	}

	public function backEndSettingAction(){
		if(!$this->modUserGroup->isAccessPermission('admin/back-end-setting')){
			return Redirect::to('admin/deny-permisson-page');
		}
		return View::make('backend.modules.setting.back_end_setting');
	}

	public function frontEndSettingAction(){
		return View::make('backend.modules.setting.front_end_setting');
	}

	public function addPermissionAction(){
		if(!$this->modUserGroup->isAccessPermission('admin/setting-add-permission-name')){
			return Redirect::to('admin/deny-permisson-page');
		}
		if(Input::has('btnSubmit')){
			if(!$this->modUserGroup->isModifyPermission('admin/setting-add-permission-name')){
				return Redirect::to('admin/setting-add-permission-name')
				->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}

			$rules = array(
						'permission_name' => 'required|unique:permission',
						'permission_name_title'=>'required'
					);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$data = array(
							'permission_name'=>trim(Input::get('permission_name')),
							'permission_name_alias'=>trim(Input::get('permission_name_title'))
						);
				$this->modSetting->addSavePermissionName($data);
				return Redirect::to('admin/setting-add-permission-name')
				->with('SECCESS_MESSAGE','Category has been created');
			}else{
				return Redirect::to('admin/setting-add-permission-name')
				->withInput()
				->withErrors($validator);
			}
		}
		$listPermissionMethodName = $this->modSetting->listPermissionMethodName();
		return View::make('backend.modules.setting.add_permission_actions')
		->with('listPermissionMethodName', $listPermissionMethodName->data);
	}

	public function deletePermissionAction($id = null){
		if(!$this->modUserGroup->isModifyPermission('setting-delete-permission-name')){
			return Redirect::to('admin/setting-add-permission-name')
			->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
		}
		$this->modSetting->deletePermissionName($id);
		return Redirect::to('admin/setting-add-permission-name')
		->with('SECCESS_MESSAGE','Item has been deleted!');
	}

	public function addSettingSlideShow(){
		if(!$this->modUserGroup->isAccessPermission('admin/setting-add-slideshow')){
			return Redirect::to('admin/deny-permisson-page');
		}
		if(Input::has('btnSubmit')){
			if(!$this->modUserGroup->isModifyPermission('admin/setting-add-slideshow')){
				return Redirect::to('admin/setting-add-slideshow')
				->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}

			$data = array('setting_value'=>Input::get('setting_slideshow'));
			$this->modSetting->addSettingNumberSlideshow($data);
			return Redirect::to('admin/setting-add-slideshow')
			->with('SECCESS_MESSAGE','Slideshow setting has been updated!');
		}
		$slideshowSetting = $this->modSetting->getSlideshowSetting();
		return View::make('backend.modules.setting.add_setting_slideshow')
		->with('slideshowSetting', $slideshowSetting->data);
	}

	public function listLocation() {
		$provinces = $this->modSetting->listProvinces();
		return View::make('backend.modules.setting.location.list_location')
		->with('provinces', $provinces);
	}

	public function listDistrict($province_id){
		$districts = $this->modSetting->listDistricts($province_id);
		$provinceByName = $this->modSetting->findProvinceById($province_id);
		return View::make('backend.modules.setting.location.list_district')
		->with('districts', $districts)
		->with('provinceByName',$provinceByName)
		->with('province_id', $province_id);
	}

	public function addProvince(){

		if(Input::has('btnSubmit')){
			$rules = array('province_name' => 'required');
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$data = array(
					'province_name'=>trim(Input::get('province_name'))
				);
				DB::table(Config::get('constants.TABLE_NAME.PROVINCE'))
				->insertGetId($data);
				return Redirect::to('admin/location-setting');
			} else {
				return Redirect::to('admin/province/add')
				->withInput()
				->withErrors($validator);
			}
		}
		return View::make('backend.modules.setting.location.add_location');
	}

	public function editProvince($province_id) {
		if(Input::has('btnSubmit')){
			$data = array(
					'province_name'=>trim(Input::get('province_name'))
				);
			DB::table(Config::get('constants.TABLE_NAME.PROVINCE'))
				->where('province_id', $province_id)
				->update($data);
			return Redirect::to('admin/location-setting');
		}
		$province = DB::table(Config::get('constants.TABLE_NAME.PROVINCE'))
		->where('province_id', $province_id)
		->first();
		return View::make('backend.modules.setting.location.edit_location')
		->with('province', $province);
	}

	public function addDistrict($province_id) {
		if(Input::has('btnSubmit')){
			$rules = array('dis_name' => 'required');
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$data = array(
					'dis_name'=>trim(Input::get('dis_name')),
					'province_id' => $province_id
				);
				DB::table(Config::get('constants.TABLE_NAME.DISTRICT'))
				->insertGetId($data);
				return Redirect::to('admin/district-setting/'.$province_id)
				->with('province_id', $province_id);
			} else {
				return Redirect::to('admin/district/add/'.$province_id)
				->with('province_id', $province_id)
				->withInput()
				->withErrors($validator);
			}
		}
		return View::make('backend.modules.setting.location.add_district')
		->with('province_id', $province_id);
	}

	public function editDistrict($district_id, $province_id) {
		if(Input::has('btnSubmit')){
			$data = array(
					'dis_name'=>trim(Input::get('dis_name'))
				);
			DB::table(Config::get('constants.TABLE_NAME.DISTRICT'))
				->where('id', $district_id)
				->update($data);
			return Redirect::to('admin/district-setting/'.$province_id);
		}
		$district = DB::table(Config::get('constants.TABLE_NAME.DISTRICT'))
		->where('id', $district_id)
		->first();
		return View::make('backend.modules.setting.location.edit_district')
		->with('district', $district);
	}

	public function loadProductConditionList() {
		$productCondition = $this->modSetting->findProductConditions();
		return View::make('backend.modules.setting.productcondition.list_product_condition')
		->with('product_condition', $productCondition);
	}

	public function loadProductConditionEdit($id=null) {
		if(Input::has('btnSubmit')){
			$data = array(
					'name'=>trim(Input::get('product_condition'))
				);
			DB::table(Config::get('constants.TABLE_NAME.PRODUCT_CONDITION'))
				->where('id', $id)
				->update($data);
			return Redirect::to('admin/product-condition');
		}
		$productConditionById = $this->modSetting->findProductConditionById($id);
		return View::make('backend.modules.setting.productcondition.edit_product_condition')
		->with('productConditionById', $productConditionById);
	}

	public function loadProductTransferType() {
		$productTransferType = $this->modSetting->findProductTransferTypes();
		return View::make('backend.modules.setting.producttransfertype.list_product_transfer_type')
		->with('productTransferType', $productTransferType);
	}

	public function loadProductTransferTypeEdit($id = null) {
		if(Input::has('btnSubmit')){
			$data = array(
					'name'=>trim(Input::get('product_transfer_type'))
				);
			DB::table(Config::get('constants.TABLE_NAME.PRODUCT_TRANSFER_TYPE'))
				->where('ptt_id', $id)
				->update($data);
			return Redirect::to('admin/product-transfer-type');
		}
		$productTransferTypeById = $this->modSetting->findProductTransferTypeById($id);
		return View::make('backend.modules.setting.producttransfertype.edit_product_transfer_type')
		->with('productTransferTypeById', $productTransferTypeById);
	}


	public function frontEndViewModeAction()
	{
		if(Input::has('btnSubmit')){
			if(Input::has('enterprise_store')){
				$this->updateViewMode(
					array('setting_value'=>Input::get('enterprise_store')),
					self::ENTERPRISE_STORE_MODE
				);
			}

			if(Input::has('buyer_request')){
				$this->updateViewMode(
					array('setting_value'=>Input::get('buyer_request')),
					self::BUYER_REQUEST_MODE
				);
			}

			if(Input::has('latest_product')){
				$this->updateViewMode(
					array('setting_value'=>Input::get('latest_product')),
					self::LATEST_PRODUCT_MODE
				);
			}

			return Redirect::to('admin/front-end-setting/view-mode')
				->with('SECCESS_MESSAGE','Data has been saved!');
		}

		$latestProductViewMode = $this->getViewMode(self::LATEST_PRODUCT_MODE);
		$enterPriseViewMode = $this->getViewMode(self::ENTERPRISE_STORE_MODE);
		$buyerRequestViewMode = $this->getViewMode(self::BUYER_REQUEST_MODE);
		return View::make('backend.modules.setting.homepage_view_mode')
			->with('latestProductViewMode', $latestProductViewMode)
			->with('enterPriseViewMode', $enterPriseViewMode)
			->with('buyerRequestViewMode', $buyerRequestViewMode);
	}

	private function getViewMode($viewMode) 
	{
		return DB::table(Config::get('constants.TABLE_NAME.SETTING'))
			->where('setting_type', $viewMode)
			->first();
	}

	private function updateViewMode($data, $viewMode)
	{
		DB::table(Config::get('constants.TABLE_NAME.SETTING'))
			->where('setting_type', $viewMode)
			->update($data);
	}
}
