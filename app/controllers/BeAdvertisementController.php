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
					'title' => 'required',
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
				return Redirect::to ( 'admin/advertisements' )->with ( 'SECCESS_MESSAGE', 'Advertisement has been added successfully' );
			} else {
				return Redirect::to ( 'admin/create-advertisement' )->withInput ()->withErrors ( $validator );
			}
		}
		$advPages = $this->advertisement->findAllAdvertisePages ();
		return View::make ( 'backend.modules.advertisement.add' )->with ( 'advPage', $advPages->data );
	}
	function listAdvertisemntPositions($id = null) {
		$adsPostions = $this->advertisement->findPostionByPageAdsId ( $id );
		return $adsPostions->data;
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
					'file' => 'required|mimes:jpeg,png,bmp,gif|image',
					'title' => 'required',
					'url' => 'required|url',
					'startDate' => 'required',
					'expirationDate' => 'required'
			);
			$validator = Validator::make ( Input::all (), $rules );
			if ($validator->passes()) {
				if(Input::hasfile('file')){
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
				return Redirect::to('admin/advertisements')->with('SECCESS_MESSAGE','Advertisement has been updated successfully');
			}else {
				return Redirect::to('admin/edit-advertisement/'.$id)->withInput()->withErrors($validator);
			}
		}
		$result = $this->advertisement->saveEditAdvertisement($id);
		$advPages = $this->advertisement->findAllAdvertisePages ();
		return View::make ('backend.modules.advertisement.edit')->with ('advertisement', $result->data)->with('advPages', $advPages->data);
	}

	/**
	 *
	 *
	 * deletePage: this function using for deleting an existing page
	 *
	 * @param
	 *        	id: the id of page
	 * @return true: if an existing page has been deleted successfully
	 * @access public
	 */
	public function deleteAdvertisement($id = null) {
		$id = ( integer ) $id;
		$this->advertisement->where ( 'id', '=', $id )->delete ();
		return Redirect::to ( 'admin/advertisements' )->with ( 'SECCESS_MESSAGE', 'Advertisement has been deleted successfully' );
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
		$id = ( integer ) $id;
		$status = ( integer ) $status;
		$status = (1 == $status) ? 0 : 1;
		$this->advertisement->where ( 'id', '=', $id )->update ( array (
				'status' => $status
		) );
		return Redirect::to ( 'admin/pages' )->with ( 'SECCESS_MESSAGE', 'Status has been changed successfully' );
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
				'title'           => trim ( Input::get ( 'title' ) ),
				'link_url'        => trim ( Input::get ( 'url' ) ),
				'started_date'    => trim ( Input::get ( 'startDate' ) ),
				'expire_date'     => trim ( Input::get ( 'expirationDate' ) ),
				'description'     => trim ( Input::get ( 'description' ) ),
				'adv_page_id'     => Input::get('advertisementPage'),
				'adv_position_id' => Input::get('advertisementPosition'),
				'status'          => Input::get('status'),
		);

		if ($param == 'add') {
			$data ['image'] = $fileName;
			$data ['user_id'] = Session::get ( 'SESSION_USER_ID' );
		} elseif ('edit') {
			if (! empty ( $fileName )) {
				$data ['image'] = $fileName;
				$data ['user_id'] = Session::get ( 'SESSION_USER_ID' );
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
}
