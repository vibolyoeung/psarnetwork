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
		$users = $this->user->where('id','!=',Session::get('SESSION_USER_ID'))->orderBy('id','DESC')->paginate(Config::get('constants.BACKEND_PAGINATION_USER'));
		return View::make('backend.modules.user.list')->with('users',$users);
	}
	
	/**
	 * createUser: this function is using for creating for new user
	 * @return true
	 */
	public function createUser(){
		if(Input::has('btnSubmit')){
			$rules = array(
				'email' => 'required|email|unique:user',
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
		
		$userType = $this->listingUserType();
		return View::make('backend.modules.user.add')->with('userType', $userType);
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
			$userType = $this->listingUserType();
			$id = (integer)$id;
			$users = $this->user->where('id','=',$id)->where('id','!=',Session::get('SESSION_USER_ID'))->first();
			return View::make('backend.modules.user.edit')->with('users',$users)->with('userType',$userType);
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
	 * updateProfileUser: this function using for updating user profile
	 * @return true
	 */
	public function updateProfileUser(){
		if(Input::has('btnSubmit')){
			$this->user->where('id','=',Session::get('SESSION_USER_ID'))->update(array('name'=>trim(Input::get('name'))));
			return Redirect::to('admin/profile')->with('SECCESS_MESSAGE','Profile has been changed successfully');
		}else{
			$users = $this->user->where('id','=',Session::get('SESSION_USER_ID'))->first();
			return View::make('backend.modules.user.user_profile')->with('users',$users);
		}
	}
	
	/**
	 * changePasswordUser: this function using changing password of user
	 * @return true
	 */
	public function changePasswordUser(){
		if(Input::has('btnSubmit')){
			$rules = array(
				'old_password' => 'required',
				'password' => 'required|min:8',
				'password_confirm'=>'required|same:password',
			);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$oldPassword = Input::get('old_password');
				$isOldPassword = Auth::attempt(array('password' => $oldPassword,'id'=>Session::get('SESSION_USER_ID')));
				if($isOldPassword){
					$this->user->where('id','=',Session::get('SESSION_USER_ID'))->update(array('password'=>Hash::make(Input::get('password'))));
					return Redirect::to('admin/change_password')->with('SECCESS_MESSAGE','Password has been changed');
					
				}else{
					return Redirect::to('admin/change_password')->with('ERROR_MESSAGE','Old password is not matched');
				}
				return Redirect::to('admin/change_password');
			}else{
				return Redirect::to('admin/change_password')->withErrors($validator);
			}
		}else{
			return View::make('backend.modules.user.change_password');
		}
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
					'user_type'=>Input::get('role')
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
	
	public function listingUserType(){
		$dataArrayUserType = array();
		$listingUserType = DB::table('user_type')->select('*')->where('id','!=',4)->get();
		foreach ($listingUserType as $userType){
			$dataArrayUserType[$userType->id] = $userType->name;
		}
		return $dataArrayUserType;
	}
}
