<?php

class BeDenyPermissionPageController extends BaseController {

	public function denyPermissionPage(){
		return View::make('backend.modules.denypermission.list');
	}

}
