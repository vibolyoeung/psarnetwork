<?php

class FeProductController extends BaseController {

    private  $mod_product;
    protected $mod_category;
    protected $mod_store;
    protected $mod_page;

    const FREE_ACCOUNT = 1;
    const ENTERPRISE_ACCOUNT = 2;

    const RESERVATION_PRODUCTS = 'reservation';
    const UNPUBLISH_PRODUCTS = 'unpublish';
    const LICENSE_PRODUCTS = 'license';
    const ALL_PRODUCTS = 'all';

    function __construct(){
        $this->mod_product = new Product();
        $this->mod_category = new MCategory();
        $this->mod_store = new Store();
        $this->mod_page = new MPage ();
    }

    /**
     * List all products
     *
     *@access public
     *@return Response
     */
    public function listAllProducts($list_type = self::ALL_PRODUCTS){
        switch ($list_type) {
            case self::RESERVATION_PRODUCTS:
                $products = $this->mod_product->findReservationProducts();
                break;
            case self::UNPUBLISH_PRODUCTS:
                $products = $this->mod_product->findUnpublicProducts();
                break;
            case self::LICENSE_PRODUCTS:
                $products = $this->mod_product->findLicenseProducts();
                break;
            default:
               $products = $this->mod_product->findAll();
                break;
        }

        $userID = Session::get('currentUserId');
        $getUserStore = $this->mod_store->getUserStore($userID);
        return View::make('frontend.modules.product.index')
            ->with('products', $products)
            ->with('dataStore', $getUserStore);
    }

    public function showPreminumProduct()
    {
        
    }

    /**
     * Add new product
     *
     *@access public
     *@return Response
     */
    public function addProduct() {
    	$userID = Session::get('currentUserId');
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

        if (self::FREE_ACCOUNT === (int)Session::get('currentUserAccountType')) {
            $listCategories = $this->mod_category->fetchCategoryTree();
        } else {
            $listCategories = $this->mod_product->getCategoryTree( $userID, $parent = 0 );
        }
        $productTransferTypes = $this->mod_product->findAllTransferType();
        $productCondictions = $this->mod_product->findAllCondition();
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
        if (Input::has('btnAddProduct')) {

            $files = Input::file('file');
            $hiddenFilesArr = Input::get('hiddenFiles');
            $delimagArr = Input::get('delimag');
            $filesQuotation = Input::file('quotation');
            $quotationFile = '';
            $jsonNewFileName = '';
            if(!empty($filesQuotation)){
                $quotationFile = $this->doUploadQaotation($filesQuotation);
            }   
            if (!empty($files[0])){
                $jsonNewFileName = $this->doUploadImages($files,$hiddenFilesArr);
            } else {
                /*get old image*/
                $newImg = array();
                if(!empty($hiddenFilesArr)) {
                    foreach($hiddenFilesArr as $oldImg) {
                        $newImg[]['pic'] = $oldImg;
                    }
                }
                /*end get old image*/
                $jsonNewFileName = json_encode($newImg);
            }
            
            /*remove old image*/
            if(!empty($delimagArr)) {
                $destinationPath = base_path() . '/public/upload/product/';
                foreach($delimagArr as $delImg) {
                    $oldName = $destinationPath . '/' . $delImg;
                    $thumb = $destinationPath . '/thumb/' . $delImg;
                    if (File::exists($oldName)) {
                        File::delete($oldName, $thumb);
                    }
                }
            }
            /*end remove old image*/
            

            $products = $this->prepareDataBindProducts(
                $jsonNewFileName,
                $quotationFile,
                false
            );
            
            $this->mod_product->updateToProduct(
                $products,
                $product_id
            );

            return Redirect::to('products/list');
        }

        $userID = Session::get('currentUserId');
        $getUserStore = $this->mod_store->getUserStore($userID);
        $product = $this->mod_product->findProductById($product_id);

        if (self::FREE_ACCOUNT === (int)Session::get('currentUserAccountType')) {
            $listCategories = $this->mod_category->fetchCategoryTree();
        } else {
            $listCategories = $this->mod_product->getCategoryTree(
                $userID,
                $parent=0,
                $level=0, 
                $product->s_category_id
            );
        } 

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
    public function doUploadImages($files,$oldFile = null) {
        $destinationPath = base_path() . '/public/upload/product/';
        self::generateFolderUpload($destinationPath);
        $destinationPathThumb = $destinationPath.'thumb/';
        $destinationPathPicSlideshow = $destinationPath.'/picslideshow/';
        $destinationPathThumbSlideshow = $destinationPath.'/thumbslideshow/';
        $images = [];
        /*get old image*/
        $newImg = array();
        if(!empty($oldFile)) {
            foreach($oldFile as $oldImg) {
                $newImg[]['pic'] = $oldImg;
            }
        }
        /*end get old image*/

        foreach ($files as $file) {
            if (!empty($file)) {
                $originFileName = $file->getClientOriginalName();
                $newFileName = $this->generateFileName($destinationPath, $originFileName);
                $file->move($destinationPath, $newFileName);
                Image::make($destinationPath . $newFileName)
                    ->resize(140, 115)
                ->save($destinationPathThumb . $newFileName);
                Image::make($destinationPath . $newFileName)
                    ->resize(500, 250)
                ->save($destinationPathPicSlideshow . $newFileName);
                Image::make($destinationPath . $newFileName)
                    ->resize(90, 55)
                ->save($destinationPathThumbSlideshow . $newFileName);
                $images[] = array(
                    'pic' => $newFileName
                );
            }
        }
        $dataArr = array_merge($images, $newImg);
        return json_encode($dataArr);
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
    private function prepareDataBindProducts($pictures, $quotation, $isAdd=true) {
        $data = $this->additionalProducts();
        if ($isAdd === true) {
            $data['top_up'] = date('Y-m-d H:i:s');
            $data['created_date'] = date('Y-m-d');
        } 
        if (!empty($pictures)) {
            $thumbnail = json_decode($pictures, true);
            $data['thumbnail'] = $thumbnail[0]['pic'];
            $data['pictures'] = $pictures;
            $data['pictures_slideshow'] = $pictures;
            $data['thumbnails_slideshow'] = $pictures;
        }
        if (!empty($quotation)) {
          $data['file_quotation'] = $quotation;  
        }
        
        return $data;
    }

    private function additionalProducts(){
        $contactInfo = array(
            'contactName' => Input::get('contactName'),
            'contactEmail' => Input::get('contactEmail'),
            'contactHP' => Input::get('contactHP'),
            'contactLocation' => Input::get('contactLocation')
        );
        $data = array(
            'title' => trim(Input::get('productTitle')),
            'price' => trim(Input::get('productPrice')),
            'publish_date' => Input::get('date_post'),
            'pro_condition_id' => trim(Input::get('productCondition')),
            'description' => Input::get('desc'),
            'user_id' => Session::get('currentUserId'),
            'store_id' => Store::findStoreByUser(Session::get('currentUserId')),
            's_category_id' => Input::get('s_category'),
            'pro_status' => trim(Input::get('productStatus')),
            'pro_transfer_type_id' => trim(Input::get('proTransferType')),
            'is_publish' => Input::get('isPublish'),
            'contact_info' => json_encode($contactInfo)
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
        $destinationPathPicSlideshow = $destinationPath.'/picslideshow/';
        $destinationPathThumbSlideshow = $destinationPath.'/thumbslideshow/';
        
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        if (!file_exists($destinationPathThumb)) {
            mkdir($destinationPathThumb, 0777, true);
        }

        if (!file_exists($destinationPathPicSlideshow)) {
            mkdir($destinationPathPicSlideshow, 0777, true);
        }

        if (!file_exists($destinationPathThumbSlideshow)) {
            mkdir($destinationPathThumbSlideshow, 0777, true);
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
