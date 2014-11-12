<?php

class FeDetailController extends BaseController {

	public function index($product_name=null,$product_id=null)
	{

		return View::make('frontend.modules.detail.index');
	}
}
