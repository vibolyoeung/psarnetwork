<?php

class BeLoginController extends BaseController {

 	protected  $user;

	public function __construct() {
		$this->user = new User();
	}
	
	/**
	 * showLogin: this function display form login page
	 * 
	 */
	public function showLogin()
	{
		return View::make('backend.modules.login.index');
	}
	
	/**
	 * doLogin: this function validation username and password 
	 * @return true | false 
	 * 
	 */
	public function doLogin(){
		if(Input::has('btnLogin')){
			$input = Input::all();
			$email = trim($input['email']);
			$password = trim($input['password']);
				$rules = array(
					'email' => 'required|email',
					'password' => 'required',
				);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$user = array('email' => $email, 'password' => $password);
				 if (Auth::attempt($user)) {
				 	Session::put('SESSION_USER_ID', Auth::user()->email);
					Session::put('SESSION_USER_EMAIL', Auth::user()->email);
					Session::put('SESSION_USER_ROLE',Auth::user()->user_role_id);
					Session::put('SESSION_LOGIN_NAME',Auth::user()->name);
					return Redirect::to('admin/dashboard');
				 }else {
				 	return Redirect::to('admin')->with('invalid','User name and Password are not matched!');
				 }
				
			}else{
				return Redirect::to('admin')->withInput()->withErrors($validator);
			}
		}
	}
	
	/**
	 * doLogout: this function using for logout operation
	 * @return true if logout success
	 */
	public function doLogout(){
		Auth::logout();
		return Redirect::to('login');
	}
	
	/**
	 * dashboard: this function display all modules in controll panel
	 * 
	 */
	public function dashboard(){
		return View::make('backend.partials.dashboard');
	}
}
