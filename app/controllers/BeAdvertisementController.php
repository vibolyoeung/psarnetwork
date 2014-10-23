<?php

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
class BeAdvertisementController extends BaseController {

	public $advertisement;

	function __construct(){
		$this->advertisement = new Advertisement();
	}

	/**
	 * listAdvertisement: listing all avertisement
	 * @return page object
	 */
	public function listAdvertisement(){
		$advertisement = $this->advertisement->orderBy('id','DESC')->paginate(Config::get('constants.BACKEND_PAGINATION_PAGE'));
		return View::make('backend.modules.advertisement.list')->with('advertisement',$advertisement);
	}

	/**
	 *
	 * createAdevertisement: this function using for create new advertisement
	 * @return true: if Advertisement has been created
	 * @access public
	 */
	public function createAdvertisement(){
		if(Input::has('btnSubmit')){
			$rules = array(
						'file' => 'required|mimes:jpeg,png,bmp,gif|image',
						'title'=>'required',
						'url'=>'required|url',
						'startDate'=>'required',
						'expirationDate'=>'required'
					);

			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$destinationPath = base_path() . '/public/upload/advertisement/';
				self::generateFolderUpload($destinationPath);
				$destinationPathThumb = $destinationPath.'thumb/';
				$file = Input::file('file');
				$fileName = $file->getClientOriginalName();
				$fileName = self::generateFileName($destinationPath,$fileName);
				$data = self::prepareDataBind('add', $fileName);
				$advertiser = self::prepareDataAdvertiser();
				$getLastId = $this->advertisement->saveAddAdvertiser($advertiser);
				$this->advertisement->saveAddAdvertisement($data, $getLastId);
				$file->move($destinationPath, $fileName);
				Image::make($destinationPath . $fileName)->resize(Config::get('constants.ADVERTISEMENT_RESIZE_WIDTH'), Config::get('constants.ADVERTISEMENT_RESIZE_HEGHT'))->save($destinationPathThumb . $fileName);
				return Redirect::to('admin/advertisements')->with('SECCESS_MESSAGE','Advertisement has been added successfully');
			} else {
				return Redirect::to('admin/create-advertisement')->withInput()->withErrors($validator);
			}
		}
		$advPages = $this->advertisement->findAllAdvertisePages();
		return View::make('backend.modules.advertisement.add')->with('advPage', $advPages->data);
	}

	function listAdvertisemntPositions($id=null) {
		$adsPostions = $this->advertisement->findPostionByPageAdsId($id);
		return $adsPostions->data;
	}

	/**
	 *
	 * eiditPage: this function using for updating an existing page
	 * @param id: the id of page
	 * @return true: if an existing page has been updated successfully
	 * @access public
	 */
	public function editAvertisement($id=null){
		$id = (integer)$id;
		if(Input::has('btnSubmit')){
			$rules = array('title' => 'required');
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$id = Input::get('id');
				$data = $this->prepareDataBind('edit');
				$this->m_page->where('id','=',$id)->update($data);
				return Redirect::to('admin/pages')->with('SECCESS_MESSAGE','Page has been updated successfully');
			}else {
				return Redirect::to('admin/edit_page')->withInput()->withErrors($validator);
			}
		}
		$pages = $this->m_page->where('id','=',$id)->first();
		return View::make('backend.modules.page.edit')->with('pages',$pages);
	}

	/**
	 *
	 * deletePage: this function using for deleting an existing page
	 * @param id: the id of page
	 * @return true: if an existing page has been deleted successfully
	 * @access public
	 */
	public function deleteAdvertisement($id = null){
		$id = (integer) $id;
		$this->advertisement->where('id','=',$id)->delete();
		return Redirect::to('admin/advertisements')->with('SECCESS_MESSAGE','Advertisement has been deleted successfully');
	}

	/**
	 *
	 * isEnableAdvertisement: this function using for being disable and enable page
	 * @param status:the status of page (1 or 0)
	 * @param id: the id of page
	 * @return true: if the page has been changed status to 1 or 0
	 * @access public
	 */
	public function isEnableAdvertisement($status=null,$id=null){
		$id = (integer) $id;
		$status = (integer) $status;
		$status = (1==$status) ? 0 : 1;
		$this->advertisement->where('id','=',$id)->update(array('status'=>$status));
		return Redirect::to('admin/pages')->with('SECCESS_MESSAGE','Status has been changed successfully');
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
				'title'=>trim(Input::get('title')),
				'link_url'=>trim(Input::get('url')),
				'start_date'=>trim(Input::get('startDate')),
				'expire_date'=>trim(Input::get('expirationDate')),
				'description'=>trim(Input::get('description'))
		);

		if($param == 'add'){
			$data['image'] = $fileName;
			$data['user_id'] = Session::get('SESSION_USER_ID');
		}elseif ('edit'){
			if(!empty($fileName)){
				$data['image'] = $fileName;
				$data['user_id'] = Session::get('SESSION_USER_ID');
			}
		}

		return $data;
	}

}
