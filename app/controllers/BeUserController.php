<?php

class BeUserController extends BaseController {

 	protected  $user;

	public function __construct() {
		$this->user = new User();
	}
	
	public function listUser(){
		return View::make('backend.modules.user.list');
	}
	
	public function createUser(){
		if(Input::has('btnSubmit')){
			$input = Input::all();
			$email = trim($input['email']);
			$password = trim($input['password']);
				$rules = array(
					'email' => 'required|email',
					'password' => 'required',
				);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$data = array(
							'email'=>$email,
							'password'=>Hash::make($password)
							);
				$this->user->insert($data);
				return Redirect::to('admin/users')->with('successCreate','One user added!');
			}else{
				return Redirect::to('admin/create')->withInput()->withErrors($validator);
			}
		}
		return View::make('backend.modules.user.add');
	}
	
	public function editUser(){
		return View::make('backend.modules.user.edit');
	}

}
