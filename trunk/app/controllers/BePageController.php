<?php

class BePageController extends BaseController {

	public $m_page;

	function __construct(){
		$this->m_page = new MPage();
	}

	/**
	 * listPage: listing all pages 
	 * @return page object
	 */
	public function listPage(){
		$page = $this->m_page->orderBy('id','DESC')->paginate(Config::get('constants.BACKEND_PAGINATION_PAGE'));
		return View::make('backend.modules.page.list')->with('pages',$page);
	}
	
	/**
	 * createPage: this function using for create a new page 
	 * @return true if the page has been created successfully
	 * @access public 
	 */
	public function createPage(){
		if(Input::has('btnSubmit')){
			$rules = array('title' => 'required');
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$data = $this->prepareDataBind('add');
				$this->m_page->insert($data);
				return Redirect::to('admin/pages')->with('SECCESS_MESSAGE','Page has been created successfully');
			}else {
				return Redirect::to('admin/create_page')->withInput()->withErrors($validator);
			}
		}
				return View::make('backend.modules.page.add');
	}
	
	/**
	 * 
	 * eiditPage: this function using for updating an existing page
	 * @param id: the id of page 
	 * @return true: if an existing page has been updated successfully
	 * @access public
	 */
	public function editPage($id=null){
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
	public function deletePage($id = null){
		$id = (integer) $id;
		$this->m_page->where('id','=',$id)->delete();
		return Redirect::to('admin/pages')->with('SECCESS_MESSAGE','Page has been deleted successfully');
	}
	
	/**
	 * 
	 * isEnablePage: this function using for being disable and enable page 
	 * @param status:the status of page (1 or 0)
	 * @param id: the id of page 
	 * @return true: if the page has been changed status to 1 or 0
	 * @access public 
	 */
	public function isEnablePage($status=null,$id=null){
		$id = (integer) $id;
		$status = (integer) $status;
		$status = (1==$status) ? 0 : 1;
		$this->m_page->where('id','=',$id)->update(array('status'=>$status));
		return Redirect::to('admin/pages')->with('SECCESS_MESSAGE','Status has been changed successfully');
	}
	
	/**
	 * 
	 * prepareDataBind: this function using for preparing data before inserting to database
	 * @param param: the parameter of edit and add
	 * @return data array 
	 * @access private
	 */
	private function prepareDataBind($param){
		$data = array(
			'title'=>Input::get('title'),
			'short_desc' => Input::get('desc')
		);
		if($param == 'add'){
			$data['create_at'] = date('Y-m-d');
			$data['sys_user_id'] = Session::get('SESSION_USER_ID');
		}elseif ($param == 'edit'){
			$data['update_at'] = date('Y-m-d');
		}
		
		return $data;
	}

}
