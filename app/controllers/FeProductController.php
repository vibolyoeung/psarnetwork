<?php

class FeProductController extends BaseController {

	private  $mod_product;

	function __construct(){
		$this->mod_product = new Product();
	}

	/**
	 * List all products
	 *
	 *@access public
	 *@return Response
	 */
	public function listAllProducts(){
		return View::make('frontend.modules.product.index');
	}

	/**
	 * Add new product
	 *
	 *@access public
	 *@return Response
	 */
	public function addProduct() {
		if(Input::has('btnAddProduct')) {
			var_dump(Input::all());die;

		}
		$productTransferTypes = $this->mod_product->findAllTransferType();
		$productCondictions = $this->mod_product->findAllCondition();
		return View::make('frontend.modules.product.new_product')
			->with('proTransferType', $productTransferTypes->data)
			->with('productCondition', $productCondictions->data);

	}
}
