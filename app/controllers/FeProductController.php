<?php

class FeProductController extends BaseController {

	public function listAllProducts(){
		return View::make('frontend.modules.product.index');
	}

	public function addProduct() {
		return View::make('frontend.modules.product.new_product');
	}
}
