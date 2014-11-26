<?php

class BeSlideshowController extends BaseController {

	private  $mod_slideshow;
	protected  $modUserGroup;
	public function __construct(){
		$this->modUserGroup = new UserGroup();
		$this->mod_slideshow = new Slideshow();
	}

	/**
	 *
	 * listSlideshow: this function using for listing all slideshow
	 * @return array: all slideshows
	 * @access public
	 */
	public function listSlideshow()
	{
		if(!$this->modUserGroup->isAccessPermission('admin/slideshows')){
			return Redirect::to('admin/deny-permisson-page');
		}
		$result = $this->mod_slideshow->listingSlideshow();
		return View::make('backend.modules.slideshow.list')->with('slideshows',$result);
	}

	/**
	 *
	 * createSlideshow: this function using for create new slideshow
	 * @return true: if slideshow has been created
	 * @access public
	 */
	public function createSlideshow(){
		if(!$this->modUserGroup->isAccessPermission('admin/create-slideshow')){
			return Redirect::to('admin/deny-permisson-page');
		}
		if(Input::has('btnSubmit')){
			if(!$this->modUserGroup->isModifyPermission('admin/create-slideshow')){
				return Redirect::to('admin/slideshows')
				->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}
			$rules = array(
						'file' => 'required|mimes:jpeg,png,bmp,gif|image',
						'title'=>'required',
						'url'=>'required|url',
						'createdDate'=>'required',
						'ExpireDate'=>'required'
					);

			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$destinationPath = base_path() . '/public/upload/slideshow/';
				self::generateFolderUpload($destinationPath);
				$destinationPathThumb = $destinationPath.'thumb/';
				$file = Input::file('file');
				$fileName = $file->getClientOriginalName();
				$fileName = self::generateFileName($destinationPath,$fileName);
				$data = self::prepareDataBind('add', $fileName);
				$advertiser = self::prepareDataAdvertiser();
				$getLastId = $this->mod_slideshow->saveAddAdvertiser($advertiser);
				$this->mod_slideshow->saveAddSlideshow($data, $getLastId);
				$file->move($destinationPath, $fileName);
				Image::make($destinationPath . $fileName)->resize(Config::get('constants.SLIDESHOW_RESIZE_WIDTH'), Config::get('constants.SLIDESHOW_RESIZE_HEGHT'))->save($destinationPathThumb . $fileName);
				return Redirect::to('admin/slideshows')->with('SECCESS_MESSAGE','Slideshow has been added successfully');
			}else{
				return Redirect::to('admin/create-slideshow')->withInput()->withErrors($validator);
			}
		}

		return View::make('backend.modules.slideshow.add');
	}

	/**
	 *
	 * editSlideshow: this function using for updating slideshow
	 * @param id: id of slideshow
	 * @return true: if the slideshow has been updated
	 * @access public
	 */
	public function editSlideshow($id = null){
		if(!$this->modUserGroup->isAccessPermission('admin/edit-slideshow')){
			return Redirect::to('admin/deny-permisson-page');
		}
		$id = (integer) $id;
		if(Input::has('btnSubmit')){
			if(!$this->modUserGroup->isModifyPermission('admin/edit-slideshow')){
				return Redirect::to('admin/slideshows')
				->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}
			$id = Input::get('hid');
			$rules = array(
						'title'=>'required',
						'url'=>'required|url',
						'createdDate'=>'required',
						'ExpireDate'=>'required'
					);
			if(Input::hasfile('file')){
				$rules['file'] = 'mimes:jpeg,png,bmp,gif|image';
			}
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				if(Input::hasfile('file')){
					$destinationPath = base_path() . '/public/upload/slideshow/';
					self::generateFolderUpload($destinationPath);
					$destinationPathThumb = $destinationPath.'thumb/';
					$file = Input::file('file');
					$fileName = $file->getClientOriginalName();
					$fileName = self::generateFileName($destinationPath,$fileName);
					$data = self::prepareDataBind('edit', $fileName);
					$this->mod_slideshow->saveEditSlideshow($id,$data, $param ='operation');
					$file->move($destinationPath, $fileName);
					Image::make($destinationPath . $fileName)
						->resize(Config::get('constants.SLIDESHOW_RESIZE_WIDTH'), Config::get('constants.SLIDESHOW_RESIZE_HEGHT'))
						->save($destinationPathThumb . $fileName);
				}else{
					$data = self::prepareDataBind('edit');
					$this->mod_slideshow->saveEditSlideshow($id,$data, $param ='operation');
				}
				return Redirect::to('admin/slideshows')->with('SECCESS_MESSAGE','Slideshow has been added successfully');
			}else{
				return Redirect::to('admin/edit-slideshow/'.$id)->withInput()->withErrors($validator);
			}
		}
		$result = $this->mod_slideshow->saveEditSlideshow($id);
		return View::make('backend.modules.slideshow.edit')->with('slideshows', $result->data);
	}

	/**
	 * deleteSlideshow: this function using for deleting an existing slideshow
	 * @return true: if the slideshow has been deleted
	 * @param id: the id of slideshow
	 * @access public
	 *
	 */
	public function deleteSlideshow($id=null){
		if(!$this->modUserGroup->isModifyPermission('admin/delete-slideshow')){
				return Redirect::to('admin/slideshows')
				->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}
		$id = (integer)$id;
		$result = $this->mod_slideshow->deleteSlideshow($id);
		if(1 == $result->result){
			return Redirect::to('admin/slideshows')->with('SECCESS_MESSAGE','Slideshow has been deleted successfully');
		}else {
			return Redirect::to('admin/slideshows')->with('ERROR_MESSAGE',$result->errorMsg);
		}
	}

	/**
	 *
	 * isPublicSlideshow: this function using for disable and enable the slideshow
	 * @param id: the id of slideshow
	 * @param status: the status of slideshow
	 * @return true: if the slideshow has been changed status
	 * @access public
	 */
	public function isPublicSlideshow($id = null, $status = null){
		if(!$this->modUserGroup->isModifyPermission('admin/status-slideshow')){
				return Redirect::to('admin/slideshows')
				->with('ERROR_MODIFY_MESSAGE','You do not have permission to modify!');
			}
		$id = (integer) $id;
		$status = (integer) $status;
		$result = $this->mod_slideshow->isPublicSlideshow($id, $status);
		if(1 == $result->result){
			return Redirect::to('admin/slideshows')->with('SECCESS_MESSAGE','Slideshow has been changed status successfully');
		}else {
			return Redirect::to('admin/slideshows')->with('ERROR_MESSAGE',$result->errorMsg);
		}
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
				'created_date'=>trim(Input::get('createdDate')),
				'expire_date'=>trim(Input::get('ExpireDate')),
				'short_desc'=>trim(Input::get('short_desc')),
				'description'=>trim(Input::get('desc'))
		);

		if($param == 'add'){
			$data['image'] = $fileName;
		}elseif ('edit'){
			if(!empty($fileName)){
				$data['image'] = $fileName;
			}
		}

		return $data;
	}

	/**
	 *
	 * prepareDataAdvertiser: this function using for preparing advertiser
	 * @return array:
	 * @access private
	 */
	private static function prepareDataAdvertiser(){
		$data = array();
		if(Input::has('isAdvertiser')){
					$data['name'] = trim(Input::get('name'));
					$data['phone'] = trim(Input::get('phone'));
					$data['email'] = trim(Input::get('email'));
					$data['address'] = trim(Input::get('Address'));
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
