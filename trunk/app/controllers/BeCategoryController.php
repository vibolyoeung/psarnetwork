<?php

class BeCategoryController extends BaseController {

	protected $mod_category;

	public function __construct() {
		$this->mod_category = new MCategory();
	}

	/**
	 *
	 * fetchCategoryTreeList: this function using for listing sub category
	 * @return array category tree list
	 * @access public
	 */
	public function listCategory(){
		$categoryList = $this->mod_category->fetchCategoryTreeList();
		return View::make('backend.modules.category.list')->with('categoryList',$categoryList);
	}

	/**
	 *
	 * createCategory: this function using for saving new category
	 * @return true if the data has been saved successfully
	 * @access public
	 */
	public function createCategory(){
		if(Input::has('btnSubmit')){

			$rules = array(
					'name_en' => 'required|unique:m_category',
					'name_zh'=>'required|unique:m_category'
					);

					$validator = Validator::make(Input::all(), $rules);
					if ($validator->passes()) {
						$data = self::prepareDataBind();
						$this->mod_category->addSaveCategory($data);
						return Redirect::to('admin/categories')->with('SECCESS_MESSAGE','Category has been created');
					}else{
						return Redirect::to('admin/create-category')->withInput()->withErrors($validator);
					}
		}else{
			$categories = $this->mod_category->fetchCategoryTree();
			return View::make('backend.modules.category.add')->with('categories',$categories);
		}
	}

	/**
	 *
	 * editCategory: this function using for edit saved for category
	 * @param integer $id: the id of category
	 * @return true: if the category has been updated successfully
	 * @access public
	 */
	public function editCategory($id = null){
		if(Input::has('btnSubmit')){
			$id = Input::get('id');
			$rules = array(
					'name_en' => 'required',
					'name_zh'=>'required'
					);

					$validator = Validator::make(Input::all(), $rules);
					if ($validator->passes()) {
						$data = self::prepareDataBind();
						$this->mod_category->editSaveCategory($id,$data);
						return Redirect::to('admin/categories')->with('SECCESS_MESSAGE','Category has been updated');
					}else{
						return Redirect::to('admin/edit-category/'.$id)->withInput()->withErrors($validator);
					}
		}
		$id = (integer) $id;
		$cagegoryById = $this->mod_category->getCategoryById($id);

		$categories = $this->mod_category->fetchCategoryTree();
		return View::make('backend.modules.category.edit')
		->with('categoryById',$cagegoryById->data)
		->with('categories',$categories);
	}

	/**
	 *
	 * deleteCategory: this function using for delete child of category depending on parent id
	 * @param integer $id: the id of category
	 * @return true: if the child category has been deleted
	 * @access public
	 */
	public function deleteCategory($id = null){
		$id = (integer) $id;
		$this->mod_category->deleteCategory($id);
		return Redirect::to('admin/categories')->with('SECCESS_MESSAGE','Category has been deleted');
	}

	/**
	 *
	 * isPublicCategory: this function uisng for enable or disable status
	 * @param integer $id: the id of category
	 * @param integer $status: the status of category
	 * @return true: if the category status has been changed
	 * @access public
	 */
	public function isPublicCategory($id=null, $status=null){
		$id = (integer) $id;
		$status = (integer) $status;
		$this->mod_category->isStatusPublic($id, $status);
		return Redirect::to('admin/categories')->with('SECCESS_MESSAGE','Category status has been changed');
	}

	/**
	 *
	 * prepareDataBind: this function using for preparing data before inserting data into database
	 * @param param: Edit | Add
	 * @access private
	 * @return array object
	 */
	private static function prepareDataBind(){

		$data = array(
				'name_en'=>trim(Input::get('name_en')),
				'name_zh'=>trim(Input::get('name_zh')),
				'parent_id'=>trim(Input::get('parent_id'))
		);
		return $data;
	}

	/**
	 *
	 * __destruct: this is margic method using for auctomatically destroy unuseful object
	 * @return true: the unuseful object has been destroyed
	 *
	 */
	public function __destruct(){
		$this->mod_category;
	}
}
