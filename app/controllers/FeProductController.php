<?php

class FeProductController extends BaseController {

    private  $mod_product;
    protected $mod_category;
    protected $mod_store;

    const FREE_ACCOUNT = 1;
    const ENTERPRISE_ACCOUNT = 2;

    function __construct(){
        $this->mod_product = new Product();
        $this->mod_category = new MCategory();
        $this->mod_store = new Store();
    }

    /**
     * List all products
     *
     *@access public
     *@return Response
     */
    public function listAllProducts(){
        $userID = Session::get('currentUserId');
        $getUserStore = $this->mod_store->getUserStore($userID);
        $products = $this->mod_product->findAll();
        return View::make('frontend.modules.product.index')
            ->with('products', $products)
            ->with('dataStore', $getUserStore);
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
            $filesQuotation = Input::file('quotation');
            $quotationFile = '';
            if(!empty($filesQuotation)){
                $quotationFile = $this->doUploadQaotation($filesQuotation);
            }   
            if (!empty($files)){
                $jsonNewFileName = $this->doUploadImages($files);
            }

            $products = $this->prepareDataBindProducts(
                $jsonNewFileName,
                $quotationFile
            );

            $productId = $this->mod_product->persistToProduct(
                $products
            );

            return Redirect::to('products/list');
        }

        if (self::FREE_ACCOUNT === Session::get('currentUserAccountType')) {
            $listCategories = $this->mod_category->fetchCategoryTree();
        } else {
            $listCategories = $this->mod_product->fetchCategoryTree();
        }
        $productTransferTypes = $this->mod_product->findAllTransferType();
        $productCondictions = $this->mod_product->findAllCondition();
        $userID = Session::get('currentUserId');
        $getUserStore = $this->mod_store->getUserStore($userID);

        return View::make('frontend.modules.product.new_product')
            ->with('proTransferType', $productTransferTypes->data)
            ->with('productCondition', $productCondictions->data)
            ->with('categoryTree', $listCategories)
            ->with('dataStore', $getUserStore);

    }

    /**
     * Update a product by product id
     *
     *@param int $product_id
     *@access public
     *@return void
     */
    public function editProduct($product_id) {
        $userID = Session::get('currentUserId');
        $getUserStore = $this->mod_store->getUserStore($userID);
        $product = $this->mod_product->findProductById($product_id);
        $listCategories = $this->mod_product->fetchCategoryTree();
        $productTransferTypes = $this->mod_product->findAllTransferType();
        $productCondictions = $this->mod_product->findAllCondition();
        return View::make('frontend.modules.product.edit_product')
            ->with('proTransferType', $productTransferTypes->data)
            ->with('productCondition', $productCondictions->data)
            ->with('categoryTree', $listCategories)
            ->with('product', $product)
            ->with('dataStore', $getUserStore);
    }

    /**
     * Renew  a product by product id
     *
     *@param int $product_id
     *@access public
     *@return void
     */
    public function topUpProduct($product_id) {

        $this->mod_product->renewProduct($product_id);
        return Redirect::to('products/list');
    }

    /**
     * Delete a product by product id
     *
     *@param int $product_id
     *@access public
     *@return void
     */
    public function deleteProduct($product_id) {
        $this->mod_product->deleteProductById($product_id);
        return Redirect::to('products/list');
    }

    /**
     * Disable or Enable  a product by product id
     *
     *@param int $product_id
     *@access public
     *@return void
     */
    public function isPublishProduct($product_id, $is_publish) {
        $this->mod_product->isPublishProduct($product_id, $is_publish);
        return Redirect::to('products/list');
    }

    /**
     * upload images operation
     *
     *@param $files
     *@access private
     *@return json  fileNames
     */
    public function doUploadImages($files){
        $destinationPath = base_path() . '/public/upload/product/';
        self::generateFolderUpload($destinationPath);
        $destinationPathThumb = $destinationPath.'thumb/';
        $images = [];
        foreach ($files as $file) {
            $originFileName = $file->getClientOriginalName();
            $newFileName = $this->generateFileName($destinationPath, $originFileName);
            $file->move($destinationPath, $newFileName);
            Image::make($destinationPath . $newFileName)
                ->resize(200, 130)
                ->save($destinationPathThumb . $newFileName);
            $images[] = array(
                'pic' => $newFileName
            );
        }

        return json_encode($images);
    }

    /**
     * Do upload quotation file operation
     * 
     * @param $file
     * @return void
     * @access private
     * @method doUploadQaotation
     * @return string $newFileName
     */
    private function doUploadQaotation($file)
    {
        $destinationPath = base_path() . '/public/upload/quotation/';
        if(!is_dir($destinationPath)){
            mkdir($destinationPath, 0777, true);
        }

        $originFile = $file->getClientOriginalName();
        $newFileName = $this->generateFileName($destinationPath, $originFile);
        $file->move($destinationPath, $newFileName);
        return $newFileName;
    }

    /**
     *
     * prepareDataBind: this function using for preparing data before inserting data into database
     *
     * @access private
     * @return array object
     */
    private static function prepareDataBindProducts($pictures, $quotation) {
        $thumbnail = json_decode($pictures, true);
        $contactInfo = array(
            'contactName' => Input::get('productTitle'),
            'contactEmail' => Input::get('contactEmail'),
            'contactHP' => Input::get('contactHP'),
            'contactLocation' => Input::get('contactLocation')
        );
        $data = array(
            'title' => trim(Input::get('productTitle')),
            'price' => trim(Input::get('productPrice')),
            'thumbnail' => $thumbnail[0]['pic'],
            'pictures' => $pictures,
            'created_date' => date('Y-m-d'),
            'pro_condition_id' => trim(Input::get('isPublish')),
            'pro_status' => trim(Input::get('productStatus')),
            'pro_transfer_type_id' => trim(Input::get('proTransferType')),
            'is_publish' => Input::get('isPublish'),
            'contact_info' => json_encode($contactInfo),
            'file_quotation' => $quotation,
            'description' => Input::get('desc'),
            'user_id' => Session::get('currentUserId'),
            'store_id' => Session::get('currentUserId'),
            's_category_id' => Input::get('s_category'),
            'top_up' => date('Y-m-d H:i:s')
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
        $fileName = sha1(uniqid(mt_rand(), true)). '.' . $fileName;
        if (file_exists($pathName . $fileName)) {
            return generateFileName($pathName);
        }

        return $fileName;
    }
}
