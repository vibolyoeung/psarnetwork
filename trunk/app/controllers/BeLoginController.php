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
			$rememberMe = Input::get('remember_me');
			$password = trim($input['password']);
				$rules = array(
					'email' => 'required|email',
					'password' => 'required',
				);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$user = array('email' => $email, 'password' => $password,'status'=>1);
				 if (Auth::attempt($user, true)) {
				 	if(4 != Auth::user()->user_type){
				 	Session::put('SESSION_USER_ID', Auth::user()->id);
					Session::put('SESSION_USER_EMAIL', Auth::user()->email);
					Session::put('SESSION_USER_ROLE',Auth::user()->user_type);
					Session::put('SESSION_LOGIN_NAME',Auth::user()->name);
					return Redirect::to('admin/dashboard');
				 	}else{
				 		return Redirect::to('admin')->with('invalid','User name and Password are not matched!');
				 	}
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

	/**
	 *
	 * sendResetPassword:this function using for sending email for reset password
	 */
	public function sendResetPassword(){
		if(Input::has('btnSendResetPassword')){
			$input = Input::all();
			$email = trim($input['email']);
				$rules = array(
					'email' => 'required|email'
				);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {

			}else{
				return Redirect::to('admin/send-forget-password')->withInput()->withErrors($validator);
			}
		}
		return View::make('backend.modules.login.send_reset_password');
	}

	/**
	 * resetPassword:this function using for reset password
	 */
	public function resetPassword(){
		return View::make('backend.modules.login.reset_password');
	}


}
