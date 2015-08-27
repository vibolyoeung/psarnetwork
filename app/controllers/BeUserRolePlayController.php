<?php

class BeUserRolePlayController extends BaseController {

	const USER_ROLE_PLAY_PAGE = 'backend.modules.userroleplay.list'; 
	const USER_ROLE_PLAY_EDIT_PAGE = 'backend.modules.userroleplay.edit'; 
	const ACCOUNT_ROLE_TABLE = 'constants.TABLE_NAME.ACCOUNT_ROLE'; 

	public function listUserRolePlay() {

		$result = DB::table(Config::get(self::ACCOUNT_ROLE_TABLE))
			->get();

		return View::make(self::USER_ROLE_PLAY_PAGE)
			->with('accountRole', $result);
	}

	public function editUserRolePlay($role_id) {
		if (Input::has('btnSubmit')) {
			$data = array(
				'rol_name_en' => Input::get('name_en'),
				'rol_name_km' => Input::get('name_km')
			);

			DB::table(Config::get(self::ACCOUNT_ROLE_TABLE))
				->where('rol_id', $role_id)
				->update($data);

			return Redirect::to('admin/user-role-play')
				->with('SECCESS_MESSAGE','Name has been updated successfully');
		}

		$editData = DB::table(Config::get(self::ACCOUNT_ROLE_TABLE))
			->where('rol_id', $role_id)
			->first();

		return View::make(self::USER_ROLE_PLAY_EDIT_PAGE)
			->with('editData', $editData);
	}
}