<?php

class BeUserController extends BaseController {

 	protected  $user;

	public function __construct() {
		$this->user = new User();
	}
	
	/**
	 * listUser: listing all users
	 * @return users object
	 */
	public function listUser(){
		$users = $this->user->where('id','!=',Session::get('SESSION_USER_ID'))->get();
		return View::make('backend.modules.user.list')->with('users',$users);
	}
	
	/**
	 * createUser: this function is using for creating for new user
	 * @return true
	 */
	public function createUser(){
		if(Input::has('btnSubmit')){
			$rules = array(
				'email' => 'required|email|unique:system_user',
				'password' => 'required|min:8',
				'password_confirm'=>'required|same:password',
				'name'=>'required',
				'role'=>'required'
			);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$data = $this->prepareDataBind('add');
				$this->user->insert($data);
				return Redirect::to('admin/users')->with('SECCESS_MESSAGE','A user has been added successfully');
			}else{
				return Redirect::to('admin/create')->withInput()->withErrors($validator);
			}
		}
		return View::make('backend.modules.user.add');
	}
	
	/**
	 * 
	 * editUser: this is function using for updatation of existing user
	 * @param $id: this id of user
	 */
	public function editUser($id=null){
		if(Input::has('btnSubmit')){
			$id = Input::get('id');
			$data = $this->prepareDataBind('edit');
			$this->user->where('id','=',$id)->update($data);
			return Redirect::to('admin/users')->with('SECCESS_MESSAGE','A user has been updated successfully');
		}else{
			$id = (integer)$id;
			$users = $this->user->where('id','=',$id)->where('id','!=',Session::get('SESSION_USER_ID'))->first();
			return View::make('backend.modules.user.edit')->with('users',$users);
		}
	}
	
	/**
	 * deleteUser: this function using for delete a existing user
	 * @return true
	 * @param id: id of user
	 */
	public function deleteUser($id=null){
		$id = (integer)$id;
		$this->user->where('id','=',$id)->where('id','!=',Session::get('SESSION_USER_ID'))->delete();
		return Redirect::to('admin/users')->with('SECCESS_MESSAGE','User has been deleted successfully');
	}
	
	/**
	 * 
	 * changeStatusUser: this is function for changing status of user
	 * @param  status: the status of user
	 */
	public function changeStatusUser($status = null,$id = null){
		if($status == 1){
			$status = 0;
		}else{
			$status = 1;
		}
		$this->user->where('id','=',$id)->update(array('status'=>$status));
		return Redirect::to('admin/users')->with('SECCESS_MESSAGE','User status has been changed successfully');
	}
	
	/**
	 * 
	 * prepareDataBind: this function handling with preparing data bine
	 * @param param: add or edit
	 * @param id: the id of user
	 */
	public function prepareDataBind($param){
		$data = array(
					'email'=>trim(Input::get('email')),
					'name'=>trim(Input::get('name')),
					'user_role_id'=>Input::get('role')
				);
		if($param == 'add'){
				$password = trim(Input::get('password'));
				$data['password'] = Hash::make($password);
				$data['create_at']= date('Y-m-d');
		}else if($param == 'edit'){
				$data['update_at']= date('Y-m-d');	
		}
		return $data;
	}
}
