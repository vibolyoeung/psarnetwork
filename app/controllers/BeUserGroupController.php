<?php

class BeUserGroupController extends BaseController {

	protected  $modUserGroup;

	public function __construct() {
		$this->modUserGroup = new UserGroup();
	}
	public function listUserGroup(){
		$userGroup = $this->modUserGroup->getUserGroup();
		return View::make('backend.modules.usergroup.list')
		->with('userGroup', $userGroup->data);
	}
	public function addUserGroup(){
		$getUserPermission = $this->modUserGroup->getUserPermission();
		return View::make('backend.modules.usergroup.add')->with('permissions', $getUserPermission->data);
	}
	public function editUserGroup($id = null){
		$getUserPermission = $this->modUserGroup->getUserPermission();
		return View::make('backend.modules.usergroup.edit')->with('permissions', $getUserPermission->data);
	}

}
