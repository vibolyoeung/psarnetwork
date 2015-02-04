<?php
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
class BeAdvertisementController extends BaseController {
	public $advertisement;
	function __construct() {
		$this->advertisement = new Advertisement ();
	}

	/**
	 * listAdvertisement: listing all avertisement
	 *
	 * @return page object
	 */
	public function listAdvertisement() {
		$advertisements = $this->advertisement->listingAdvertisment();
		return View::make ( 'backend.modules.advertisement.list' )->with ( 'advertisements', $advertisements );
	}

	/**
	 *
	 *
	 * createAdevertisement: this function using for create new advertisement
	 *
	 * @return true: if Advertisement has been created
	 * @access public
	 */
	public function createAdvertisement() {
		if (Input::has ( 'btnSubmit' )) {
			$rules = array (
					'file' => 'required|mimes:jpeg,png,bmp,gif|image',
					'title_en' => 'required',
					'title_km' => 'required',
					'url' => 'required|url',
					'startDate' => 'required',
					'expirationDate' => 'required'
			);

			$validator = Validator::make ( Input::all (), $rules );
			if ($validator->passes ()) {
				$destinationPath = base_path () . '/public/upload/advertisement/';
				self::generateFolderUpload ( $destinationPath );
				$destinationPathThumb = $destinationPath . 'thumb/';
				$file = Input::file ( 'file' );
				$fileName = $file->getClientOriginalName ();
				$fileName = self::generateFileName ( $destinationPath, $fileName );
				$data = self::prepareDataBind ( 'add', $fileName );
				$this->advertisement->saveAddAdvertisement ( $data );
				$file->move ( $destinationPath, $fileName );
				Image::make ( $destinationPath . $fileName )->resize ( Config::get ( 'constants.ADVERTISEMENT_RESIZE_WIDTH' ), Config::get ( 'constants.ADVERTISEMENT_RESIZE_HEGHT' ) )->save ( $destinationPathThumb . $fileName );
				return Redirect::to ( 'admin/advertisements' )->with ( 'SUCCESS_MESSAGE', 'Advertisement has been added successfully' );
			} else {
				return Redirect::to ( 'admin/create-advertisement' )->withInput ()->withErrors ( $validator );
			}
		}

		$advCatPages = $this->advertisement->findAllAdvertiseCategoryPages();
		$advPages = $this->advertisement->findAllAdvertisePages ();
		$licenses = $this->advertisement->findLicense();
		$paymentMethod = $this->advertisement->findPaymentMethod();

		$clients = $this->extractClients();

		return View::make ( 'backend.modules.advertisement.add' )
			->with ('advPage', $advPages->data)
			->with('licenses', $licenses->data)
			->with('advCatPages', $advCatPages->data)
			->with('paymentMethods', $paymentMethod->data)
			->with('clients', $clients);

	}

	protected function extractClients() {
		$clients = $this->advertisement->findClients();
		$clientsName = array();
		foreach($clients->data as $client) {
			$clientsName[] = $client->name;
		}

		return implode('", "', $clientsName);

	}

	function listAdvertisemntPositions($id = null) {
		$adsPostions = $this->advertisement->findPostionByPageAdsId ( $id );
		return $adsPostions->data;
	}

	function listAdvertisemntPage($id = null) {
		$advPages = $this->advertisement->findAdvPageByCatPagePositionId ( $id );
		return $advPages->data;
	}

	public function listLicense() {
		$licenses = $this->advertisement->findLicense();
		return $licenses->data;
	}

	public function listUserInfo() {
		$user = $this->advertisement->findUserByName(Input::get('name'));
		return $user->data;
	}

	/**
	 *
	 *
	 * eiditPage: this function using for updating an existing page
	 *
	 * @param
	 *        	id: the id of page
	 * @return true: if an existing page has been updated successfully
	 * @access public
	 */
	public function editAvertisement($id = null) {
		$id = (integer) $id;
		if (Input::has ('btnSubmit')) {
			$id = Input::get('hid');
			$rules = array (
					'file' => 'mimes:jpeg,png,bmp,gif|image',
					'title_en' => 'required',
					'title_km' => 'required',
					'url' => 'required|url',
					'startDate' => 'required',
					'expirationDate' => 'required'
			);
			$validator = Validator::make ( Input::all (), $rules );
			if ($validator->passes()) {
				if(Input::hasFile('file')){

					// for remove file
					$oldFileObject = $this->advertisement->findAdvertisementImageById($id);
					$this->removeFile($oldFileObject->image);

					$destinationPath = base_path() . '/public/upload/advertisement/';
					self::generateFolderUpload($destinationPath);
					$destinationPathThumb = $destinationPath.'thumb/';
					$file = Input::file('file');
					$fileName = $file->getClientOriginalName();
					$fileName = self::generateFileName($destinationPath,$fileName);
					$data = self::prepareDataBind('edit', $fileName);
					$this->advertisement->saveEditAdvertisement($id,$data, $param ='operation');
					$file->move($destinationPath, $fileName);
					Image::make($destinationPath . $fileName)
						->resize(Config::get('constants.ADVERTISEMENT_RESIZE_WIDTH'), Config::get('constants.ADVERTISEMENT_RESIZE_HEGHT'))
						->save($destinationPathThumb . $fileName);
				} else {
					$data = self::prepareDataBind('edit');
					$this->advertisement->saveEditAdvertisement($id,$data, $param ='operation');
				}
				return Redirect::to('admin/advertisements')->with('SUCCESS_MESSAGE','Advertisement has been updated successfully');
			} else {
				return Redirect::to('admin/edit-advertisement/'.$id)->withInput()->withErrors($validator);
			}
		}
		$result = $this->advertisement->saveEditAdvertisement($id);

		$advCatPages = $this->advertisement->findAllAdvertiseCategoryPages();
		$advPages = $this->advertisement->findAllAdvertisePages ();
		$licenses = $this->advertisement->findLicense();
		$paymentMethod = $this->advertisement->findPaymentMethod();

		$clients = $this->extractClients();

		return View::make ('backend.modules.advertisement.edit')
			->with ('advertisement', $result->data)
			->with ('advPage', $advPages->data)
			->with('licenses', $licenses->data)
			->with('advCatPages', $advCatPages->data)
			->with('paymentMethods', $paymentMethod->data)
			->with('clients', $clients);
	}

	/**
	 * deleteAdvertisement: this function using for deleting an existing advertisment
	 * @return true: if the advertisment has been deleted
	 * @param id: the id of advertisment
	 * @access public
	 *
	 */
	public function deleteAdvertisement($id=null){
		$id = (integer)$id;
		$result = $this->advertisement->deleteAdvertisement($id);
		if(1 == $result->result){
			return Redirect::to('admin/advertisements')->with('SUCCESS_MESSAGE','Advertisement has been deleted successfully');
		}else {
			return Redirect::to('admin/advertisements')->with('ERROR_MESSAGE',$result->errorMsg);
		}
	}

	/**
	 *
	 *
	 * isEnableAdvertisement: this function using for being disable and enable page
	 *
	 * @param
	 *        	status:the status of page (1 or 0)
	 * @param
	 *        	id: the id of page
	 * @return true: if the page has been changed status to 1 or 0
	 * @access public
	 */
	public function isEnableAdvertisement($status = null, $id = null) {

		$id = (integer) $id;
		$status = (integer) $status;
		$result = $this->advertisement->isPublicAdvertisement($id, $status);
		if(1 == $result->result){
			return Redirect::to('admin/advertisements')->with('SUCCESS_MESSAGE','Advertisement has been changed status successfully');
		}else {
			return Redirect::to('admin/advertisements')->with('ERROR_MESSAGE',$result->errorMsg);
		}
	}

	/**
	 *
	 *
	 * prepareDataBind: this function using for preparing data before inserting data into database
	 *
	 * @param
	 *        	param: Edit | Add
	 * @access private
	 * @return array object
	 */
	private static function prepareDataBind($param, $fileName = null) {
		$data = array (
				'title_en'        => trim ( Input::get ('title_en')),
				'title_km'        => trim ( Input::get ('title_km')),
				'link_url'        => trim ( Input::get ('url' )),
				'started_date'    => trim ( Input::get ('startDate')),
				'end_date'        => trim ( Input::get ('expirationDate')),
				'description_en'  => trim ( Input::get ('description_en')),
				'description_km'  => trim ( Input::get ('description_km')),
				'user_id'         => Input::get('user_id'),
				'adv_cat_page_id' => Input::get('pageType'),
				'adv_page_id'     => Input::get('advertisementPage'),
				'adv_position_id' => Input::get('advertisementPosition'),
				'status'          => Input::get('status'),
				'apearance'       => Input::get('apearance'),
				'payment_method'  => Input::get('paymentMethods'),
				'license_id'      => Input::get('license'),
				'user_id'         => Input::get('user_id'),
				'size'            => Input::get('size'),
				'type'            => Input::get('advertiseType'),

		);

		if ($param == 'add') {
			$data ['image'] = $fileName;
		} elseif ('edit') {
			if (! empty ( $fileName )) {
				$data ['image'] = $fileName;
			}
		}

		return $data;
	}

	/**
	 * Generation folder when uploading file doesnot exist
	 *
	 * @return boolean
	 * @access private
	 * @method generateFolderUpload
	 * @throws ErrorException
	 */
	private static function generateFolderUpload($destinationPath) {
		$destinationPathThumb = $destinationPath . '/thumb/';
		if (! file_exists ( $destinationPath )) {
			mkdir ( $destinationPath, 0777, true );
			if (! file_exists ( $destinationPathThumb )) {
				mkdir ( $destinationPathThumb, 0777, true );
			}
		}
	}

	/**
	 * Generation fileName when uploading file
	 *
	 * @return filename by generation
	 * @access public
	 * @method generateFileName
	 * @throws Exception
	 */
	public static function generateFileName($pathName, $fileName = null) {
		$temp = explode ( ".", $fileName );
		$fileName = end ( $temp );
		$fileName = time () . '.' . $fileName;
		if (file_exists ( $pathName . $fileName )) {
			return generateFileName ( $pathName );
		}

		return $fileName;
	}

	public function removeFile($fileName) {
		if(!empty($fileName)){
			$destinationPath = base_path() . '/public/upload/advertisement/';
			$destinationPathThumb = base_path() . '/public/upload/advertisement/thumb/';
			File::delete($destinationPath . $fileName);
			File::delete($destinationPathThumb . $fileName);
		}
	}
}
