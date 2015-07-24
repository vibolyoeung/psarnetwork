<?php

class BeUserController extends BaseController {

	protected  $user;
	protected  $modUserGroup;

	const CLIENT_USER = 4;

	public function __construct() {
		$this->user = new User();
		$this->modUserGroup = new UserGroup();
	}

	/**
	 * listUser: listing all system users
	 * @return users object
	 */
	public function listUser(){
		if(!$this->modUserGroup->isAccessPermission('admin/users')){
			return Redirect::to('admin/deny-permisson-page');
		}
		$arrUserGroup = array(''=>'Please Select User Group');
		$status = array(''=>'Please Select Status',0=>'Disable', 1=>'Enable');
		$userGroup = $this->modUserGroup->getUserGroup();
		foreach ($userGroup->data as $user_group){
			$arrUserGroup[$user_group->id] = $user_group->name;
		}
		
		$users = $this->user->where('id','!=', Session::get('SESSION_USER_ID'))
				->where('user_type', '!=', self::CLIENT_USER)
				->orderBy('id','DESC')
				->paginate(Config::get('constants.BACKEND_PAGINATION_USER'));
		
		return View::make('backend.modules.user.list')
				->with('users', $users)
				->with('status', $status)
				->with('arrUserGroup', $arrUserGroup);
	}


	/**
	 * listUser: listing all client users
	 * @return users object
	 */
	public function listClientUser(){
		$clientUsers = $this->user->where('id','!=', Session::get('SESSION_USER_ID'))
				->where('user_type', self::CLIENT_USER)
				->orderBy('id','DESC')
				->paginate(Config::get('constants.BACKEND_PAGINATION_USER'));
		
		return View::make('backend.modules.user.client_user')
			->with('clientUsers', $clientUsers);
	}

	/**
	 * filterUsers: listing all users by filter
	 * @return users object
	 */
	public function filterUsers(){
		$filterName = Input::get('filter_name');
		$filterEmail = Input::get('filter_email');
		$filterRole = Input::get('filter_role');
		$filterStatus = Input::get('filter_status');
		$arrUserGroup = array();
		$userGroup = $this->modUserGroup->getUserGroup();
		foreach ($userGroup->data as $user_group){
			$arrUserGroup[$user_group->id] = $user_group->name;
		}
		$query = DB::table(Config::get('constants.TABLE_NAME.USER'));
		if(!empty($filterName)){
			$query->where('name', 'LIKE', '%'. $filterName .'%');
		}
		if(!empty($filterEmail)){
			$query->where('email', 'LIKE', '%'. $filterEmail .'%');
		}
		if(!empty($filterRole)){
			$query->where('user_type','=', $filterRole);
		}
		if(!empty($filterStatus)){
			$query->where('status','=', $filterStatus);
		}
		$query->where('id','!=',Session::get('SESSION_USER_ID'));
		$query->where('user_type','!=',Config::get('constants.CLIENT_USER'));
		$query->orderBy('id','DESC');
		$users = $query->get();
		return View::make('backend.modules.user.filter_user')
				->with('users', $users)
				->with('arrUserGroup', $arrUserGroup);
	}

	/**
	 * createUser: this function is using for creating for new user
	 * @return true
	 */
	public function createUser(){
		if(!$this->modUserGroup->isAccessPermission('admin/create')){
			return Redirect::to('admin/deny-permisson-page');
		}
		if(Input::has('btnSubmit')){
			if(!$this->modUserGroup->isModifyPermission('admin/create')){
					return Redirect::to('admin/users')
					->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}
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
		if(!$this->modUserGroup->isAccessPermission('admin/edit')){
			return Redirect::to('admin/deny-permisson-page');
		}
		if(Input::has('btnSubmit')){
			if(!$this->modUserGroup->isModifyPermission('admin/edit')){
					return Redirect::to('admin/users')
					->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}
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
		if(!$this->modUserGroup->isModifyPermission('admin/delete')){
				return Redirect::to('admin/users')
				->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
		}
		$id = (integer)$id;
		$this->user->where('id','=',$id)->where('id','!=',Session::get('SESSION_USER_ID'))->delete();
		return Redirect::to('admin/users')->with('SECCESS_MESSAGE','User has been deleted successfully');
	}

	/**
	 *
	 * changeStatusUser: this is function for changing status of user
	 * @param  status: the status of user
	 */
	public function changeStatusUser($status = null, $id = null, $route = null){
		if(!$this->modUserGroup->isModifyPermission('admin/status')){
				return Redirect::to('admin/users')
				->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
		}
		if($status == 1){
			$status = 0;
		}else{
			$status = 1;
		}
		if ($route == self::CLIENT_USER) {
			$routeName = 'admin/users/clients';
		} else {
			$routeName = 'admin/users';
		}
		$this->user->where('id','=',$id)->update(array('status'=>$status));
		return Redirect::to($routeName)->with('SECCESS_MESSAGE','User status has been changed successfully');
	}

	/**
	 *
	 * updateProfileUser: this function using for updating user profile
	 * @return true
	 */
	public function updateProfileUser(){
		if(!$this->modUserGroup->isAccessPermission('admin/profile')){
			return Redirect::to('admin/deny-permisson-page');
		}
		if(Input::has('btnSubmit')){
			if(!$this->modUserGroup->isModifyPermission('admin/profile')){
					return Redirect::to('admin/profile')
					->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}
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
		if(!$this->modUserGroup->isAccessPermission('admin/change-password')){
			return Redirect::to('admin/deny-permisson-page');
		}
		if(Input::has('btnSubmit')){
			if(!$this->modUserGroup->isModifyPermission('admin/change-password')){
					return Redirect::to('admin/change-password')
					->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}
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
					return Redirect::to('admin/change-password')->with('SECCESS_MESSAGE','Password has been changed');

				}else{
					return Redirect::to('admin/change-password')->with('ERROR_MESSAGE','Old password is not matched');
				}
				return Redirect::to('admin/change-password');
			}else{
				return Redirect::to('admin/change-password')->withErrors($validator);
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
				'user_type'=>Input::get('role'),
				'telephone'=>Input::get('telephone'),
				'address'=>Input::get('address'),
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

	/**
	 *
	 * listingUserType: this function using for listing all user types
	 * @return array of user type
	 * @access public
	 */
	public function listingUserType(){
		$dataArrayUserType = array();
		$listingUserType = DB::table('user_type')->select('*')->where('id','!=', 4)->get();
		foreach ($listingUserType as $userType){
			$dataArrayUserType[$userType->id] = $userType->name;
		}
		return $dataArrayUserType;
	}

	/**
	 * deleteClientUser: this function using for delete a existing client users
	 * @return true
	 * @param id: id of user
	 */
	public function deleteClientUser($id=null){
		$id = (integer)$id;
		$this->user->where('id','=', $id)
			->where('id','!=', Session::get('SESSION_USER_ID'))
			->delete();
		return Redirect::to('admin/users/clients')
			->with('SECCESS_MESSAGE','User has been deleted successfully');
	}
}
