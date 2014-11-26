<?php

class BeUserGroupController extends BaseController {

	protected  $modUserGroup;

	public function __construct() {
		$this->modUserGroup = new UserGroup();
	}

	public function listUserGroup(){
		if(!$this->modUserGroup->isAccessPermission('admin/user-group')){
			return Redirect::to('admin/deny-permisson-page');
		}
		$userGroup = $this->modUserGroup->getUserGroup();
		return View::make('backend.modules.usergroup.list')
		->with('userGroup', $userGroup->data);
	}

	public function addUserGroup(){
		if(!$this->modUserGroup->isAccessPermission('admin/user-group-add')){
			return Redirect::to('admin/deny-permisson-page');
		}
		if(Input::has('btnSubmit')){
			if(!$this->modUserGroup->isModifyPermission('admin/user-group-add')){
				return Redirect::to('admin/user-group')
				->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}
			$rules = array('group_name'=>'required');
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$group_name = Input::get('group_name');
				$permission = Input::get('permission');
				$data = array(
					'name'=>trim($group_name),
					'permission'=>serialize($permission)
				);
				$this->modUserGroup->addPermissionToUserGroup($data);
				return Redirect::to('admin/user-group')->with('SECCESS_MESSAGE','User Group has been created');
			}else {
				return Redirect::to('admin/user-group-add')->withInput()->withErrors($validator);
			}
		}
		$getUserPermission = $this->modUserGroup->getUserPermission();
		return View::make('backend.modules.usergroup.add')->with('permissions', $getUserPermission->data);
	}

	public function editUserGroup($id = null){
		if(!$this->modUserGroup->isAccessPermission('admin/user-group-edit')){
			return Redirect::to('admin/deny-permisson-page');
		}
		if(Input::has('btnSubmit')){
			if(!$this->modUserGroup->isModifyPermission('admin/user-group-edit')){
				return Redirect::to('admin/user-group')
				->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}
			$hid = Input::get('hid');
			$group_name = Input::get('group_name');
			$permission = Input::get('permission');
				$data = array(
					'name'=>trim($group_name),
					'permission'=>serialize($permission)
				);
			$this->modUserGroup->editPermissionToUserGroup($data, $hid);
			return Redirect::to('admin/user-group')
			->with('SECCESS_MESSAGE','User Group has been updated');
		}
		$getUserPermissionById = $this->modUserGroup->getUserPermissionById($id);
		$getUserPermission = $this->modUserGroup->getUserPermission();
		return View::make('backend.modules.usergroup.edit')
		->with('permissions', $getUserPermission->data)
		->with('getUserPermissionById', $getUserPermissionById);
	}

	public function deleteUserGroup($id = null){
		if(!$this->modUserGroup->isModifyPermission('admin/user-group-delete')){
				return Redirect::to('admin/user-group')
				->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}
		$this->modUserGroup->deleteUserGroup($id);
		return Redirect::to('admin/user-group')
		->with('SECCESS_MESSAGE','User Group has been deleted');
	}

}
