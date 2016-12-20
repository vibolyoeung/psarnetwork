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


    /*
     *
     */
    public function ajax() {
    	$userID = Session::get ( 'currentUserId' );
		$code = Input::get ( 'id' );
		$getType = Input::get ( 'p' );
		if (! empty ( $code ) && ! empty ( $getType )) {
			switch ($getType) {
				case 'getprocat':
					$level = Input::get ( 'level' );
					if (self::FREE_ACCOUNT === (int)Session::get('currentUserAccountType')) {
						$category = $this->mod_category->getSubCategories($code);
	        			$getListHtmlCate = $this->getListCategories($category, $level);
					} else {
						$category = $this->mod_category->getSubUserCategories($userID,$code);
						$getListHtmlCate = $this->getListCategories($category,$level,null,$userID);
					}
        			$data = array(
        				'level'=>$level,
        				'html'=>$getListHtmlCate,
        			);
        			echo json_encode ( $data );
					break; 
			}
		} else {
			echo 'data not enough';
		}
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
    	/*delete temp product */
    	$productCondictions = array('pro_status'=>4);
    	$productTemp = $this->mod_product->findProductByCondition($productCondictions);
    	if(!empty($productTemp)) {
    		foreach ($productTemp as $tempPro) {
    			$this->mod_product->deleteProductById($tempPro->id);
    		}
    	}
    	/*end delete temp product */
    	$userID = Session::get('currentUserId');
    	$products = array(
    			'created_date' => date('Y-m-d'),
    			'publish_date' => Input::get('date_post'),
    			'user_id' => Session::get('currentUserId'),
    			'store_id' => Store::findStoreByUser(Session::get('currentUserId')),
    			's_category_id' => 0,
    			'pro_status' => 4,
    			'pro_transfer_type_id' => trim(Input::get('proTransferType')),
    	);
    	$productId = $this->mod_product->persistToProduct(
    			$products
    	);
    	return Redirect::to('products/edit/'.$productId);
    	die;


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
                $destinationPath = base_path() . Config::get ( 'constants.DIR_IMAGE.DEFAULT' ). 'product/';
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
                false,
            	$product_id
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
		/*get category*/
        if (self::FREE_ACCOUNT === (int)Session::get('currentUserAccountType')) {
        	$category = $this->mod_category->getSubCategories();
        	$getListHtmlCate = $this->getListCategories($category);
        } else {
        	$category = $this->mod_category->getSubUserCategories($userID);
        	$getListHtmlCate = $this->getListCategories($category,1,null,$userID);
        }



        $categoryName = '';
        $getRelateCate = DB::table(Config::get('constants.TABLE_NAME.PRODUCT_IN_CATEGORY'))
        ->where(array('product_id'=>$product_id, 'user_id'=>$userID))
        ->get();
        if(!empty($getRelateCate)) {
        	$categoryNameArr = array();
        	$categoryParentArr = array();
        	$categoryidArr = array();
        	foreach ($getRelateCate as $cateId) {
        		if (self::FREE_ACCOUNT === (int)Session::get('currentUserAccountType')) {
        			$mCate = $this->mod_category->getCategoryById($cateId->category_id);
        			if(!empty($mCate)) {
        				$field = 'name_'.Session::get('lang');
        				$categoryNameArr[] = $mCate->data->{$field};
        				$categoryParentArr[] = $mCate->data->parent_id;
        				$categoryidArr[] = $mCate->data->id;
        			}
        		} else {
        			$mCate = $this->mod_category->getUserCategoryById($cateId->category_id, $userID);
        			if(!empty($mCate->data)) {
        				$field = 'name_'.Session::get('lang');
        				$categoryNameArr[] = $mCate->data->{$field};
        				$categoryParentArr[] = $mCate->data->parent_id;
        				$categoryidArr[] = $mCate->data->m_cat_id;
        			}
        		}

        	}
        	if(!empty($categoryNameArr)) {
        		$categoryName = implode(',',$categoryNameArr);
        	}
        }
        $editCurrentCat = null;
        $categoryID = null;
        if(!empty($categoryParentArr)) {
        	$editCurrentCat = $this->getCurrentLabel($categoryParentArr,$categoryidArr);

        	$categoryID = implode(',',$categoryidArr);
        }

		/*end get category*/
        //$getCurrentCat = $this->mod_category
        $productTransferTypes = $this->mod_product->findAllTransferType();
        $productCondictions = $this->mod_product->findAllCondition();
        return View::make('frontend.modules.product.edit_product')
            ->with('proTransferType', $productTransferTypes->data)
            ->with('productCondition', $productCondictions->data)
            ->with('chooseCategory', $getListHtmlCate)
            ->with('editCategory', $editCurrentCat)
            ->with('category', $categoryID)
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

    /*create current label for view*/
    public function getCurrentLabel($labelArr, $categoryidArr) {
    	$i=0;
    	$cutList ='';
    	$col = 6;
    	$totalCol = count($labelArr);
    	$nextCol = $col - $totalCol;
    	foreach ($labelArr as $columCate) {
    		$i++;
    		$cutList .= $this->getCurrentLabelColumb($columCate, $i, $categoryidArr);
    	}
    	if($nextCol) {
	    	for ($x = 0; $x <= $nextCol -1; $x++) {
	    		$cutList .= $this->getCurrentLabelColumb(null, $x + $totalCol+1, $categoryidArr);
	    	}
    	}
    	return $cutList;
    }

    /*create referrent current label for view*/
    public function getCurrentLabelColumb($columCate, $i,$labelArr) {
    	$userID = Session::get('currentUserId');
    	$list = '<div class="col-lg-2 col-md-4 col-sm-6">';
    	$list .= '<div class="list-group" id="cat-sub-'.$i.'">';
    	if (self::FREE_ACCOUNT === (int)Session::get('currentUserAccountType')) {
    		$category = $this->mod_category->getSubCategories($columCate);
    		$list .= $this->getListCategories($category, $i, $labelArr);
    	} else {
    		$category = $this->mod_category->getSubUserCategories($userID, $columCate);
    		$list .= $this->getListCategories($category, $i, $labelArr, $userID);
    	}
    	$list .= '</div>';
    	$list .= '</div>';
    	return $list;
    }

    public function getListCategories ($catArr,$level=1, $columCate=array(),$user='') {
    	$label = '';
    	if(!empty($catArr)) {
    		$field = 'name_'.Session::get('lang');
    		$end =  @end($columCate);
    		foreach ($catArr as $labels) {
    			if(!empty($user)) {
    				$byID = $labels->m_cat_id;
    			} else {
    				$byID = $labels->id;
    			}

    			$hasSub = '';
    			$checkedcat = '';
    			if(!empty($columCate)) {
	    			if(in_array($byID,$columCate)) {
	    				if($end != $byID) {
		    				$hasSub = ' has-sub';
	    				}
		    			$checkedcat = ' active';
	    			}
    			}
    			$label .= '<a onClick="getsub(' . $byID . ','.$level.');" href="javascript:;" data-id="' . $byID . '" id="cat-list-' . $byID . '" class="list-group-item'.$checkedcat.$hasSub.'">' . $labels->{$field} . '</a>';
    		}
    	}
    	return $label;
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
        $destinationPath = base_path() . Config::get ( 'constants.DIR_IMAGE.DEFAULT' ). 'product/';
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
                    ->resize(550, 250)
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
        $destinationPath = base_path() . Config::get ( 'constants.DIR_IMAGE.DEFAULT' ). 'quotation/';
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
    private function prepareDataBindProducts($pictures, $quotation, $isAdd=true, $product_id) {
        $data = $this->additionalProducts($product_id);
        if ($isAdd === true) {
            $data['top_up'] = date('Y-m-d H:i:s');
            $data['created_date'] = date('Y-m-d');
        }
        if (!empty($pictures)) {
            $thumbnail = json_decode($pictures, true);
            $data['thumbnail'] = $thumbnail[0]['pic'];
            $data['pictures'] = $pictures;
        }
        if (!empty($quotation)) {
          $data['file_quotation'] = $quotation;
        }

        return $data;
    }

    private function additionalProducts($product_id){
    	$category = $this->generatCategory(Input::get('s_category'), $product_id);
    	$catId = '';
    	if(!empty($category)) {
    		$catId = implode(',',$category);
    	}
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
            'pro_status' => trim(Input::get('productStatus')),
            'pro_transfer_type_id' => trim(Input::get('proTransferType')),
            'is_publish' => Input::get('isPublish'),
            'contact_address' => Input::get('contact_address'),
            'contact_info' => json_encode($contactInfo)
        );
        return $data;
    }


    public function generatCategory($param,$pro_id) {
    	$userID = Session::get('currentUserId');
    	$cId = array();
    	if (!empty($param)) {
    		$label = explode(',',$param);
    		if(!empty($label)) {
    			$delWhere = array(
    					'product_id' => $pro_id,
    					'user_id' => $userID
    			);
    			DB::table(Config::get('constants.TABLE_NAME.PRODUCT_IN_CATEGORY'))->where($delWhere)->delete();
    			foreach ($label as $cate) {
    				$data = array(
    						'category_id' => $cate,
    						'product_id' => $pro_id,
    						'user_id' => $userID
    				);
    				$this->mod_category->addProductCategory($data);
    			}
    		}
    	}


//     		if(!empty($label)) {
//     			foreach ($label as $cate) {
//     				$name = trim(str_replace('&#44;', ',', $cate));
//     				if (self::FREE_ACCOUNT === (int)Session::get('currentUserAccountType')) {
//     					$userCatId = $this->mod_category->findMainCategoryBy($cate);
//     					if(!empty($userCatId->data->id)) {
//     						$mainCateID = $userCatId->data->id;
//     					}
//     				} else {
//     					$userCatId = $this->mod_category->getCategoryByName($cate,$userID);
//     					if(!empty($userCatId->data->m_cat_id)) {
//     						$mainCateID = $userCatId->data->m_cat_id;
//     					}
//     				}

//     				if(!empty($mainCateID)) {
//     					$mCate = $this->mod_category->getCategoryById($mainCateID);
//     					if(!empty($mCate)) {
//     						$cId[] = $mCate->data->id;
//     					}
//     				}
//     			}
//     		}
//     	}
//     	$allCateArr = array_unique($cId);
//     	/*add this cate to repated product*/
//     	if(!empty($allCateArr)) {
//     		$delWhere = array(
//     			'product_id' => $pro_id,
//     			'user_id' => $userID
//     		);
//     		DB::table(Config::get('constants.TABLE_NAME.PRODUCT_IN_CATEGORY'))->where($delWhere)->delete();
//     		foreach ($allCateArr as $unigeCate) {
//     			$data = array(
//     				'category_id' => $unigeCate,
//     				'product_id' => $pro_id,
//     				'user_id' => $userID
//     			);
//     			$this->mod_category->addProductCategory($data);
//     		}
//     	}
//     	/*end add this cate to repated product*/
    	//return $allCateArr;
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
