<?php
define('SUPER_ADMINISTRATOR',1);
define('ADMINISTRATOR',2);
define('ADMIN',3);
class BeUserController extends BaseController {

 	protected  $user;

	public function __construct() {
		$this->user = new User();
	}
	
	public function listUser(){
			$users = $this->user->all();
		return View::make('backend.modules.user.list')->with('users',$users);
	}
	
	public function createUser(){
		if(Input::has('btnSubmit')){
			$input = Input::all();
			$name = trim($input['name']);
			$email = trim($input['email']);
			$password = trim($input['password']);
			$role = $input['Role'];
				$rules = array(
					'email' => 'required|email|unique:system_user',
					'password' => 'required|min:8',
					'name'=>'required',
					'Role'=>'required'
				);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$data = array(
							'email'=>$email,
							'password'=>Hash::make($password),
							'name'=>$name,
							'user_role_id'=>$role,
							'create_at'=>date('Y-m-d')
							);
				$this->user->insert($data);
				return Redirect::to('admin/users')->with('successCreate','One user added!');
			}else{
				return Redirect::to('admin/create')->withInput()->withErrors($validator);
			}
		}
		return View::make('backend.modules.user.add');
	}
	
	public function editUser($id=null){
		if(Input::has('btnSubmit')){
		}else{
			$users = $this->user->where('id','=',$id)->first();
			return View::make('backend.modules.user.edit')->with('users',$users);
		}
	}
	

}
