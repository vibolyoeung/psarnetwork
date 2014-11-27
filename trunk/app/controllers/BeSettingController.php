<?php
class BeSettingController extends BaseController {

	protected  $modUserGroup;
	protected  $modSetting;

	public function __construct() {
		$this->modUserGroup = new UserGroup();
		$this->modSetting = new Setting();
	}

	public function settingAction(){
		if(!$this->modUserGroup->isAccessPermission('admin/setting-list')){
			return Redirect::to('admin/deny-permisson-page');
		}
		return View::make('backend.modules.setting.list');
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

			$rules = array('permission_name' => 'required|unique:permission');
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$this->modSetting->addSavePermissionName(array('permission_name'=>Input::get('permission_name')));
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

}
