<?php

class BeClientUserTypeController extends BaseController {

	protected  $modUserGroup;
	protected  $modClientType;

	public function __construct() {
		$this->modUserGroup = new UserGroup();
		$this->modClientType = new ClientType();
	}

	public function listClientUserType(){
		if(!$this->modUserGroup->isAccessPermission('admin/client-user-type')){
			return Redirect::to('admin/deny-permisson-page');
		}
		$clentType = $this->modClientType->getClientUserType();
		return View::make('backend.modules.clientusertype.list')
		->with('clentTypes', $clentType->data);
	}

	public function editClientUserType($id = null){
		if(!$this->modUserGroup->isAccessPermission('admin/client-user-type-edit')){
			return Redirect::to('admin/deny-permisson-page');
		}
		if(Input::has('btnSubmit')){
			if(!$this->modUserGroup->isModifyPermission('admin/client-user-type-edit')){
				return Redirect::to('admin/client-user-type')
				->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}
			$data = array('name'=>trim(Input::get('client_user_type')));
			$id = Input::get('hid');
			$this->modClientType->updateClientUserType($data, $id);
			return Redirect::to('admin/client-user-type')
			->with('SECCESS_MESSAGE','Client User Typ has been updated');
		}
		$clentType = $this->modClientType->getClientUserTypeById($id);
		return View::make('backend.modules.clientusertype.edit')
		->with('clentTypes', $clentType->data);
	}
}
