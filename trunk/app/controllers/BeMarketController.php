<?php

class BeMarketController extends BaseController {

	protected $mod_market;
	protected $modUserGroup;

	public  function __construct(){
		$this->mod_market = new Market();
		$this->modUserGroup = new UserGroup();
	}

	/**
	 *
	 * listMarket: this function using for listing all markets
	 * @return array
	 * @access public
	 */
	public function listMarket()
	{
		if(!$this->modUserGroup->isAccessPermission('admin/markets')){
			return Redirect::to('admin/deny-permisson-page');
		}
		$marketType = $this->mod_market->listingMarketsType();
		$result = $this->mod_market->listingMarkets();
		return View::make('backend.modules.market.list')
		->with('markets', $result->data)
		->with('marketType', $marketType->data);
	}

	/**
	 *
	 * filterMarket: this function using for filter all markets
	 * @return array
	 * @access public
	 */
	public function filterMarket(){
		$marketType = $this->mod_market->listingMarketsType();
		$result = $this->mod_market->listingMarkets();
		return View::make('backend.modules.market.filter_market')
		->with('markets', $result->data)
		->with('marketType', $marketType->data);
	}

	/**
	 *
	 * createMarket: this function using for saving data into market
	 * @return boolean: true if the data has been saved successfully
	 * @access public
	 */
	public function createMarket()
	{
		if(!$this->modUserGroup->isAccessPermission('admin/create-market')){
			return Redirect::to('admin/deny-permisson-page');
		}
		if(Input::has('btnSubmit')){
			if(!$this->modUserGroup->isModifyPermission('admin/create-market')){
				return Redirect::to('admin/markets')
				->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}
			$rules = array(
						'file' => 'required|mimes:jpeg,png,bmp,gif|image',
						'title_en'=>'required',
						'title_zh'=>'required',
						'province_id'=>'required',
						'district_id'=>'required',
						'amount_stair'=>'required',
						'market_type'=>'required'
						);

						$validator = Validator::make(Input::all(), $rules);
						if ($validator->passes()) {
							$destinationPath = base_path() . '/public/upload/market/';
							self::generateFolderUpload($destinationPath);
							$destinationPathThumb = $destinationPath.'thumb/';
							$file = Input::file('file');
							$fileName = $file->getClientOriginalName();
							$fileName = self::generateFileName($destinationPath,$fileName);
							$data = self::prepareDataBind('add', $fileName);
							$result = $this->mod_market->saveAddMarket($data);
							$file->move($destinationPath, $fileName);
							Image::make($destinationPath . $fileName)
							->resize(Config::get('constants.MARKET_RESIZE_WIDTH'), Config::get('constants.MARKET_RESIZE_HEGHT'))
							->save($destinationPathThumb . $fileName);
							return Redirect::to('admin/markets')->with('SECCESS_MESSAGE','Market has been added successfully');
						}else{
							return Redirect::to('admin/create-market')->withInput()->withErrors($validator);
						}
		}
		$marketType = $this->mod_market->listingMarketsType();
		$provinces = $this->mod_market->listingProvinces();

		return View::make('backend.modules.market.add')
		->with('provinces', $provinces->data)
		->with('marketTypes', $marketType->data);
	}

	/**
	 *
	 * editMarket: this function using for save existing data
	 * @param integer $id: the id of market
	 * @return boolean: true if the existing data has been saved successfully
	 * @access public
	 */
	public function editMarket($id = null)
	{
		if(!$this->modUserGroup->isAccessPermission('admin/edit-market')){
			return Redirect::to('admin/deny-permisson-page');
		}

		if(Input::has('btnSubmit')){
			if(!$this->modUserGroup->isModifyPermission('admin/edit-market')){
				return Redirect::to('admin/markets')
				->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}
			$id = Input::get('hid');
			$rules = array(
						'title_en'=>'required',
						'title_zh'=>'required',
						'province_id'=>'required',
						'district_id'=>'required',
						'amount_stair'=>'required',
						'market_type'=>'required'
						);
						if(Input::hasfile('file')){
							$rules['file'] = 'mimes:jpeg,png,bmp,gif|image';
						}
						$validator = Validator::make(Input::all(), $rules);
						if ($validator->passes()) {
							$id = Input::get('id');
							if(Input::hasfile('file')){
								$destinationPath = base_path() . '/public/upload/market/';
								self::generateFolderUpload($destinationPath);
								$destinationPathThumb = $destinationPath.'thumb/';
								$file = Input::file('file');
								$fileName = $file->getClientOriginalName();
								$fileName = self::generateFileName($destinationPath,$fileName);
								$data = self::prepareDataBind('edit', $fileName);
								$this->mod_market->saveEditMarket($id,$data,$fileName);
								$file->move($destinationPath, $fileName);
								Image::make($destinationPath . $fileName)
								->resize(Config::get('constants.MARKET_RESIZE_WIDTH'), Config::get('constants.MARKET_RESIZE_HEGHT'))
								->save($destinationPathThumb . $fileName);
							}else{
								$data = self::prepareDataBind('edit');
								$this->mod_market->saveEditMarket($id,$data,$file=null);
							}
							return Redirect::to('admin/markets')->with('SECCESS_MESSAGE','Market has been added successfully');
						}else{
							return Redirect::to('admin/edit-market/'.$id)->withInput()->withErrors($validator);
						}
		}
		$id = (integer) $id;
		$marketType = $this->mod_market->listingMarketsType();
		$provinces = $this->mod_market->listingProvinces();
		$mk = $this->mod_market->listingEditData($id);
		return View::make('backend.modules.market.edit')
		->with('provinces', $provinces->data)
		->with('mk', $mk->data)
		->with('marketTypes', $marketType->data);
	}

	/**
	 * deleteMarket: this function using for deleting an existing market
	 * @return true: if the market has been deleted
	 * @param id: the id of market
	 * @access public
	 *
	 */
	public function deleteMarket($id=null){
		if(!$this->modUserGroup->isModifyPermission('admin/delete-market')){
				return Redirect::to('admin/markets')
				->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
		}
		$id = (integer)$id;
		$result = $this->mod_market->deleteMarket($id);
		if(1 == $result->result){
			return Redirect::to('admin/markets')->with('SECCESS_MESSAGE','Market has been deleted successfully');
		}else {
			return Redirect::to('admin/markets')->with('ERROR_MESSAGE',$result->errorMsg);
		}
	}

	public function listingDistricts($id = null){
		$id = (integer) $id;
		$districts = $this->mod_market->listingDistricts($id);
		return $districts->data;
	}

	/**
	 *
	 * prepareDataBind: this function using for preparing data before inserting data into database
	 * @param param: Edit | Add
	 * @access private
	 * @return array object
	 */
	private static function prepareDataBind($param, $fileName=null){

		$data = array(
				'title_en'=>trim(Input::get('title_en')),
				'title_zh'=>trim(Input::get('title_zh')),
				'desc_en'=>trim(Input::get('desc_en')),
				'desc_zh'=>trim(Input::get('desc_zh')),
				'province_id'=>trim(Input::get('province_id')),
				'district_id'=>trim(Input::get('district_id')),
				'amount_stair'=>trim(Input::get('amount_stair')),
				'market_type'=>trim(Input::get('market_type'))
		);

		if($param == 'add'){
			$data['image'] = $fileName;
			$data['created_date']=date('Y-m-d');
		}elseif ('edit'){
			$data['modify_date']=date('Y-m-d');
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
