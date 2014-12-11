<?php

class Slideshow extends Eloquent{


	/**
	 *
	 * listingSlideshow: list all slideshows
	 * @return array: get all slideshows
	 * @access public
	 * @throws Exception: can not list slideshow
	 */
	public function listingSlideshow(){
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.SLIDESHOW').' AS s')
					->select('s.id','s.title','s.image','s.status','s.created_date','s.expire_date','sp.name','sp.email','sp.phone','sp.address')
					->leftJoin(Config::get('constants.TABLE_NAME.ADVERTISER_PROFILE').' AS sp','s.advertiser_id','=','sp.id')
					->orderBy('s.id','desc')
					->paginate(Config::get('constants.BACKEND_PAGINATION_SLIDESHOW'));
			$response->data = $result;
			$response->result = 1;
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return  $response;
	}
	
	public function getSlideshowFe(){
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.SLIDESHOW').' AS s')
			->select('s.id','s.title','s.image','s.status','s.created_date','s.expire_date','sp.name','sp.email','sp.phone','sp.address')
			->leftJoin(Config::get('constants.TABLE_NAME.ADVERTISER_PROFILE').' AS sp','s.advertiser_id','=','sp.id')
			->orderBy('s.id','desc');
			$response->data = $result;
			$response->result = 1;
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return  $response;
	}

	/**
	 *
	 * saveAddSlideshow:this function using for create new slideshow
	 * @param getLastId: this last id of slideshow
	 * @param data: the data of slideshow
	 * @return true: if the slideshow has been created
	 * @access public
	 * @throws Exception
	 */
	public function saveAddSlideshow($data = array(),$getLastId){

		$response = new stdClass();
		try {
			$data = $data;
			if(!empty($getLastId->isEmpty)){
				$data['advertiser_id'] = $getLastId->lastId;
			}
			DB::table(Config::get('constants.TABLE_NAME.SLIDESHOW'))->insertGetId($data);
			$response->result =1;
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return $response;
	}

	/**
	 *
	 * saveAddAdvertiser: this function using for addin new advertiser
	 * @param advertiser: data of advertisers
	 * @return true: if the slideshow has been created
	 * @access public
	 * @param unknown_type $advertiser
	 */
	public function saveAddAdvertiser($advertiser = array()){
		$response = new stdClass();
		try {
			if(!empty($advertiser)){
				$getLastId = DB::table(Config::get('constants.TABLE_NAME.ADVERTISER_PROFILE'))->insertGetId($advertiser);
				$response->lastId = $getLastId;
				$response->result = 1;
				$response->isEmpty = 1;
			}else {
				$response->isEmpty = '';
			}
		}catch (\Exception $e){
			$response->result = 0;
			Log::error($e->getMessage());
			$response->errorMsg = $e->getMessage();
		}
		return $response;
	}

	/**
	 *
	 * saveEditSlideshow: this function using for editing an existing slideshow
	 * @param id: the id of slideshow
	 * @param param: listing or operation
	 * @param data: the pareparation data befor inserting
	 * @return true: if the an existing slideshow has been edited successfully
	 * @access public
	 * @throws Exception
	 */
	public function saveEditSlideshow($id, $data = array(), $param = null){
		$response = new stdClass();
		try {
			if($param == 'operation'){
				$result = DB::table(Config::get('constants.TABLE_NAME.SLIDESHOW'))->where('id','=',$id)->update($data);
				$response->result = 1;
			}else{
				$listing = DB::table(Config::get('constants.TABLE_NAME.SLIDESHOW'))->where('id','=', $id)->first();
				$response->data = $listing;
				$response->result = 1;
			}
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}

		return $response;
	}

	/**
	 *
	 * deleteSlideshow: this function using for deleting an existing slideshow
	 * @param id: the id of slideshow
	 * @return true: if an existing slideshow has been deleted
	 * @access public
	 * @throws Exception
	 */
	public function deleteSlideshow($id){
		$response = new stdClass();
		try {
			$fileName = DB::table(Config::get('constants.TABLE_NAME.SLIDESHOW'))->select('image') ->where('id','=',$id)->first();
			if(!empty($fileName->image)){
				$destinationPath = base_path() . '/public/upload/slideshow/';
				$destinationPathThumb = base_path() . '/public/upload/slideshow/thumb/';
				File::delete($destinationPath . $fileName->image);
				File::delete($destinationPathThumb . $fileName->image);
			}
			$result = DB::table(Config::get('constants.TABLE_NAME.SLIDESHOW'))->where('id','=',$id)->delete();
			$response->result =$result;
			if(0==$result){
				$response->errorMsg = 'Can not delete slideshow';
			}
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
		return $response;
	}


	/**
	 *
	 * isPublicSlideshow: this function using for enable and disable slideshow
	 * @param id: the id of slideshow
	 * @param status: the status of slideshow
	 * @return 1|0 if the Slideshow has been chnaged status
	 * @access public
	 * @throws Exception
	 */
	public function isPublicSlideshow($id, $status){
		$response = new stdClass();
		try {
			$status = ($status == 1) ? 0 : 1;
			$result = DB::table(Config::get('constants.TABLE_NAME.SLIDESHOW'))->where('id','=', $id)->update(array('status'=>$status));
			$response->result = $result;
			if(0==$result){
				$response->errorMsg = 'Can not chnage status of slideshow';
			}
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}

		return $response;
	}
	
	/**
	 *
	 * getSlideshowToFrontEnd: this function using for listing slideshows
	 * @param limit: the limitation of a mount of slideshow to display
	 * @return array object
	 * @access public
	 * @throws Exception
	 */
	
	public function getSlideshowToFrontEnd($limit){
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.SLIDESHOW').' AS s')
			->select(
					's.id','s.title AS sli_title','s.image AS sli_image',
					's.status AS sli_status','s.created_date AS sli_created_date','s.short_desc AS sli_desc',
					's.product_id AS pro_id','s.expire_date AS sli_expire_date','s.link_url',
					'p.title AS pro_title','p.image AS pro_image','p.status AS pro_status',
					'p.created_date AS pro_created_date','p.expire_date AS pro_expire_date')
					->leftJoin(Config::get('constants.TABLE_NAME.PRODUCT').' AS p','p.id','=','s.product_id')
					->where('s.status','=', 1)
					->take($limit)->get();
			$response->result = $result;
		}catch (\Exception $e){
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}
	
		return $response;
	}
}
