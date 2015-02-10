<?php
class FeFreePageController extends BaseController {

	function __construct() {

	}

	public function freePage($name) {
		return View::make('frontend.modules.freepage.free_page')
            ->with('name', $name);
	}

}