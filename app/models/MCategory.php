<?php

class MCategory extends Eloquent{

	/**
	 *
	 * fetchCategoryTreeList: this function using for listing sub category
	 * @return array category tree list
	 * @param integer $parent: the parent id of category
	 * @param array $treeArray:the array tree for listing category
	 * @param integer $level: the level of listing category
	 * @access public
	 */
	function fetchCategoryTreeList($parent = 0, $treeArray = '',$level=0) {
		try {

		if(!is_array($treeArray)){
				$treeArray = array();
			}
			$result = DB::table(Config::get('constants.TABLE_NAME.M_CATEGORY'))
					->select('id','name_en','name_zh','status','parent_id')
					->where('parent_id','=',$parent)
					->orderBy('id','asc')
					->get();
			if(count($result) > 0){

				foreach ($result as $row) {
					$statusImage = ($row->status == 1) ? 'icon-ok success':'icon-remove danger';
					$treeArray[] = '<tr>';
						$treeArray[] = '<td>' . $row->id . '</td>';
						$treeArray[] = '<td>' . str_repeat ( '&#8212;&nbsp;', $level ) . $row->name_en . "</td>";
						$treeArray[] = '<td>' . str_repeat ( '&#8212;&nbsp;', $level ) . $row->name_zh . "</td>";
						$treeArray[] = '<td align="center">' . str_repeat ( '&#8212;&nbsp;', $level ) ."<a href='".URL::to('admin/status-category/'.$row->id.'/'.$row->status)."' class='".$statusImage."'></a></td>";
						$treeArray[] = '<td align="center"><a href="'.URL::to('admin/edit-category/'.$row->id).'"><i class="icon-edit primary"></i></a> <a href="'.URL::to('admin/delete-category/'.$row->id).'" ><i class="icon-trash danger"></a></i></td>';
					$treeArray[] = '</tr>';
					$treeArray = self::fetchCategoryTreeList($row->id,$treeArray,$level+1);
				}
			}
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $treeArray;
	}

	/**
	 *
	 * fetchCategoryTree: this function using for list dropdown
	 * @param integer $parent: the parent id
	 * @param string $spacing:The space for indent child
	 * @param array $treeArray: the array tree for category
	 * @return array
	 * @access public
	 */
	public function fetchCategoryTree($parent = 0, $spacing = '', $treeArray = ''){
		try {
			if(!is_array($treeArray)){
				$treeArray = array();
			}
			$result = DB::table(Config::get('constants.TABLE_NAME.M_CATEGORY'))
					->select('id','name_en','name_zh','status','parent_id')
					->where('parent_id','=',$parent)
					->orderBy('id','asc')
					->get();
			if(count($result) > 0){
				foreach ($result as $row) {
					$treeArray[] = array('id' => $row->id,'parent_id' => $row->parent_id, 'name_en' => $spacing . $row->name_en);
					$treeArray = self::fetchCategoryTree($row->id, $spacing . '&nbsp;&nbsp;',$treeArray);
				}
			}
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $treeArray;
	}

	/**
	 *
	 * getCategoryById: the function using for category by id
	 * @param integer $id: the id of category
	 * @return array category
	 * @access public
	 */
	public function getCategoryById($id){
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.M_CATEGORY'))
					->select('id','name_en','name_zh','status','parent_id')
					->where('id','=',$id)
					->orderBy('id','asc')
					->first();
			$response->data = $result;
			$response->result = 1;

		}catch (\Exception $e){
			$response->result = 0;
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $response;
	}

	/**
	 *
	 * addSaveCategory: this function using for saving new category
	 * @param array $data: this data holding all data from posting
	 * @return true if the data has been saved successfully
	 * @access public
	 */
	public function addSaveCategory($data){

		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.M_CATEGORY'))->insertGetId($data);
			$response->result = $result;
		}catch (\Eexception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
			$response->result = 0;
		}

		return $response;
	}

	/**
	 *
	 * editSaveCategory: this function using for edit saved for category
	 * @param integer $id: the id of category
	 * @param array $data: The data of holding for category
	 * @return true: if the category has been updated successfully
	 * @access public
	 */
	public function editSaveCategory($id,$data){
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.M_CATEGORY'))->where('id','=',$id)->update($data);
			$response->result = $result;
		}catch (\Eexception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
			$response->result = 0;
		}

		return $response;
	}

	/**
	 *
	 * deleteCategory: this function using for deleting category by id
	 * @param integer $id: the id of category
	 * @return true: if the category has been deleted successfully
	 * @access public
	 */
	public function deleteCategory($id=null){
		$response = new stdClass();
		try{
			$response = $this->deleteChildByParentId($id);
			$response->result = 1;
		}catch (\Exception $e){
			$response->result = 0;
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
	}

	/**
	 *
	 * deleteChildByParentId: this function using for delete child of category depending on parent id
	 * @param integer $id: the id of category
	 * @return true: if the child category has been deleted
	 * @access public
	 */
	public function deleteChildByParentId($id) {
		$result = DB::table(Config::get('constants.TABLE_NAME.M_CATEGORY'))->where('parent_id','=', $id)->get();
		DB::table(Config::get('constants.TABLE_NAME.M_CATEGORY'))->where('id','=', $id)->delete();
		if (count($result) > 0) {
			foreach ($result as $category) {
				$this->findChildByParentId($category->id);
			}
		}
	}


	/**
	 *
	 * isStatusPublic: this function uisng for enable or disable status
	 * @param integer $id: the id of category
	 * @param integer $status: the status of category
	 * @return true: if the category status has been changed
	 * @access public
	 */
	public function isStatusPublic($id, $status){

		$response = new stdClass();
		try{
			$status = ($status == 1) ? 0: 1;
			$result = DB::table(Config::get('constants.TABLE_NAME.M_CATEGORY'))->where('parent_id','=', $id)->get();
			 DB::table(Config::get('constants.TABLE_NAME.M_CATEGORY'))->where('id','=',$id)->update(array('status'=>$status));
			if (count($result) > 0) {
			foreach ($result as $category) {
				$this->isStatusPublic($category->id, $category->status);
			}
		}
		$response->result = 1;
		}catch (\Exception $e){
			$response->result = 0;
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}

		return $response;
	}
	
	

	public function getSubCategories($parent){
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.M_CATEGORY'))
			->select('id','name_en','name_zh','status','parent_id')
			->where('parent_id','=',$parent)
			->where('status','=',1)
			->orderBy('id','asc')
			->get();
		}catch (\Exception $e){
			Log::error('Message: '.$e->getMessage().' File:'.$e->getFile().' Line'.$e->getLine());
		}
		return $result;
	}

}
