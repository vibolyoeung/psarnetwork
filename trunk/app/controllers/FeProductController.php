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

		}

		$listCategories = $this->mod_product->fetchCategoryTree();
		$productTransferTypes = $this->mod_product->findAllTransferType();
		$productCondictions = $this->mod_product->findAllCondition();
		return View::make('frontend.modules.product.new_product')
			->with('proTransferType', $productTransferTypes->data)
			->with('productCondition', $productCondictions->data)
			->with('categoryTree', $listCategories);

	}

/**
	 *
	 * prepareDataBind: this function using for preparing data before inserting data into database
	 * @param param: Edit | Add
	 * @access private
	 * @return array object
	 */
	private static function prepareDataBind($param) {
		$data = array(
			'title_en'=>trim(Input::get('title_en')),
			'title_km'=>trim(Input::get('title_km')),
			'desc_en'=>trim(Input::get('desc_en')),
			'desc_km'=>trim(Input::get('desc_km')),
			'province_id'=>trim(Input::get('province_id')),
			'district_id'=>trim(Input::get('district_id')),
			'amount_stair'=>trim(Input::get('amount_stair')),
			'market_type'=>trim(Input::get('market_type'))
		);
		return $data;
	}

	/**
	 * Generation folder when uploading file doesnot exist
	 * @return boolean
	 * @access private
	 * @method generateFolderUpload
	 * @throws ErrorException
	 */
	private static function generateFolderUpload($destinationPath) {

		$destinationPathThumb = $destinationPath.'/thumb/';
		if (!file_exists($destinationPath)) {
			mkdir($destinationPath, 0777, true);
			if (!file_exists($destinationPathThumb)) {
				mkdir($destinationPathThumb, 0777, true);
			}
		}

	}

	/**
	 * Generation fileName when uploading file
	 * @return filename by generation
	 * @access public
	 * @method generateFileName
	 * @throws Exception
	 */
	public static function generateFileName($pathName, $fileName = null) {

		$temp = explode(".", $fileName);
		$fileName = end($temp);
		$fileName = time(). '.' . $fileName;
		if (file_exists($pathName . $fileName)) {
			return generateFileName($pathName);
		}

		return $fileName;
	}
}
