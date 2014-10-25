<?php

class BeStoreController extends BaseController {

	protected $mod_store;

	public  function __construct(){
		$this->mod_store = new Store();
	}

	/**
	 *
	 * listStore: this function using for listing all stores
	 * @param string $store_name
	 * @param integer $id
	 * @return array
	 * @access public
	 */
	public function listStore($store_name=null, $id = null)
	{
		$id = (integer) $id;
		$result = $this->mod_store->listingStores($id);
		return View::make('backend.modules.store.list')
				->with('stores', $result->data)
				->with('storeName', $store_name)
				->with('id',$id);
	}

	/**
	 *
	 * createStore: this function using for saving data into Store
	 * @param string $store_name
	 * @param integer $id
	 * @return boolean: true if the data has been saved successfully
	 * @access public
	 */
	public function createStore($store_name=null, $id = null)
	{
		if(Input::has('btnSubmit')){
			$rules = array(
						'file' => 'required|mimes:jpeg,png,bmp,gif|image',
						'title_en'=>'required',
						'title_zh'=>'required',
						'stair'=>'required|numeric'
						);

						$validator = Validator::make(Input::all(), $rules);
						if ($validator->passes()) {
							$destinationPath = base_path() . '/public/upload/store/';
							self::generateFolderUpload($destinationPath);
							$destinationPathThumb = $destinationPath.'thumb/';
							$file = Input::file('file');
							$fileName = $file->getClientOriginalName();
							$fileName = self::generateFileName($destinationPath,$fileName);
							$data = self::prepareDataBind('add', $fileName, $id);
							$result = $this->mod_store->saveAddStore($data);
							$file->move($destinationPath, $fileName);
							Image::make($destinationPath . $fileName)->resize(Config::get('constants.STORE_RESIZE_WIDTH'), Config::get('constants.STORE_RESIZE_HEGHT'))->save($destinationPathThumb . $fileName);
							return Redirect::to('admin/market/store/'.$store_name.'/'.$id)->with('SECCESS_MESSAGE','Store has been added successfully');
						}else{
							return Redirect::to('admin/market/store/create/'.$store_name.'/'.$id)->withInput()->withErrors($validator);
						}
		}


		return View::make('backend.modules.store.add')
		->with('storeName', $store_name)
		->with('id',$id);
	}

	/**
	 *
	 * editStore: this function using for save existing data
	 * @param string $store_name
	 * @param integer $stor_id
	 * @param integer $id: the id of market
	 * @return boolean: true if the existing data has been saved successfully
	 * @access public
	 */
	public function editStore($stor_id = null, $store_name=null,$id = null)
	{
		if(Input::has('btnSubmit')){
			$id = Input::get('hid');
			$rules = array(
						'title_en'=>'required',
						'title_zh'=>'required',
						'stair'=>'required|numeric'
						);
						if(Input::hasfile('file')){
							$rules['file'] = 'mimes:jpeg,png,bmp,gif|image';
						}
						$validator = Validator::make(Input::all(), $rules);
						$sup_id = Input::get('id');
						if ($validator->passes()) {

							if(Input::hasfile('file')){

								$destinationPath = base_path() . '/public/upload/store/';
								self::generateFolderUpload($destinationPath);
								$destinationPathThumb = $destinationPath.'thumb/';
								$file = Input::file('file');
								$fileName = $file->getClientOriginalName();
								$fileName = self::generateFileName($destinationPath,$fileName);
								$data = self::prepareDataBind('edit', $fileName);
								$this->mod_store->saveEditStore($stor_id,$data,$fileName);
								$file->move($destinationPath, $fileName);
								Image::make($destinationPath . $fileName)
								->resize(Config::get('constants.STORE_RESIZE_WIDTH'), Config::get('constants.STORE_RESIZE_HEGHT'))
								->save($destinationPathThumb . $fileName);
							}else{
								$data = self::prepareDataBind('edit');
								$this->mod_store->saveEditStore($stor_id,$data,$file=null);
							}
							return Redirect::to('admin/market/store/'.$store_name.'/'.$sup_id)->with('SECCESS_MESSAGE','Store has been updated successfully');
						}else{
							return Redirect::to('admin/market/store/edit/'.$stor_id.'/'.$store_name.'/'.$sup_id)->withInput()->withErrors($validator);
						}
		}

		$stor_id = (integer) $stor_id;
		$store = $this->mod_store->listingEditData($stor_id,$id);
		return View::make('backend.modules.store.edit')
		->with('stores', $store->data)
		->with('storeName', $store_name)
		->with('id',$id);
	}

	/**
	 * deleteStore: this function using for deleting an existing store
	 * @param string $store_name
	 * @param integer $stor_id
	 * @param integer $id
	 * @return true: if the market has been deleted
	 * @param id: the id of market
	 * @access public
	 *
	 */
	public function deleteStore($stor_id = null, $store_name=null,$id = null){
		$id = (integer)$stor_id;
		$result = $this->mod_store->deleteStore($stor_id);
		if(1 == $result->result){
			return Redirect::to('admin/market/store/'.$store_name.'/'.$id)->with('SECCESS_MESSAGE','Store has been deleted successfully');
		}else {
			return Redirect::to('admin/market/store/'.$store_name.'/'.$id)->with('ERROR_MESSAGE',$result->errorMsg);
		}
	}

	/**
	 *
	 * prepareDataBind: this function using for preparing data before inserting data into database
	 * @param param: Edit | Add
	 * @access private
	 * @return array object
	 */
	private static function prepareDataBind($param, $fileName=null, $id=null){

		$data = array(
				'title_en'=>trim(Input::get('title_en')),
				'title_zh'=>trim(Input::get('title_zh')),
				'desc_en'=>trim(Input::get('desc_en')),
				'desc_zh'=>trim(Input::get('desc_zh')),
				'stair'=>trim(Input::get('stair'))
		);

		if($param == 'add'){
			$data['image'] = $fileName;
			$data['sup_id']=$id;
		}elseif ('edit'){
			if(!empty($fileName)){
				$data['image'] = $fileName;
			}
		}

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
