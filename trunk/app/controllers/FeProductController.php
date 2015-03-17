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
			$files = Input::file('file');
			if (!empty($files)){
				$newFileNames = $this->doUploadImages($files);
			}

			return Redirect::to('products/create')
				->withInput()
				->withErrors($validator);
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
	 * upload images operation
	 *
	 * @param $files
	 *@access private
	 *@return string fileNames
	 */
	public function doUploadImages($files){
		$destinationPath = base_path() . '/public/upload/product/';
		self::generateFolderUpload($destinationPath);
		$destinationPathThumb = $destinationPath.'thumb/';
		foreach ($files as $file) {
			$fileName = $file->getClientOriginalName();
			$file->move($destinationPath, $fileName);
			Image::make($destinationPath . $fileName)
				->resize(100, 100)
				->save($destinationPathThumb . $fileName);
		}

	}

	/**
	 *
	 * prepareDataBind: this function using for preparing data before inserting data into database
	 *
	 * @access private
	 * @return array object
	 */
	private static function prepareDataBindProducts() {
		$data = array(
			'title' => trim(Input::get('title_en')),
			'price' => trim(Input::get('title_km')),
			'product_service_type_id' => trim(Input::get('desc_en')),
			'thumbnail' => trim(Input::get('desc_km')),
			'pictures' => trim(Input::get('province_id')),
			'created_date' => trim(Input::get('district_id')),
			'pro_condition_id' => trim(Input::get('amount_stair')),
			'pro_status' => trim(Input::get('market_type')),
			'pro_transfer_type_id' => trim(Input::get('market_type')),
			'is_publish' => trim(Input::get('market_type')),
			'contact_info' => trim(Input::get('market_type')),
			'file_quotation' => trim(Input::get('market_type')),
			'description' => trim(Input::get('market_type'))
		);
		return $data;
	}

	/**
	 *
	 * This function is using for preparing data before inserting data into database
	 *
	 * @return array object
	 */
	private static function prepareDateBindProductInStore() {
		$data = array(
			'pro_id' => Input::get(''),
			'user_id' => Input::get(''),
			'store_id' => Input::get(''),
			's_category_id' => Input::get('')
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
