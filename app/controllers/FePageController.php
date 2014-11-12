<?php

class FePageController extends BaseController {

	public function index()
	{
		
		return View::make('frontend.partials.home');
	}

}
