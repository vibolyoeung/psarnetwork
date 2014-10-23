<?php

class FeSearchController extends BaseController {

	public function index($category_name=null)
	{

		return View::make('frontend.modules.search.index');
	}
}
