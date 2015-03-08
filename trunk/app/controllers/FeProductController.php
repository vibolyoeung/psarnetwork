<?php

class FeProductController extends BaseController {

	public function listAllProducts($lang = null){
		return View::make('frontend.modules.product.index');
	}

	public function addProduct($lang = null) {
		return View::make('frontend.modules.product.new_product');
	}
}
