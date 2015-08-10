<?php
class MPage extends Eloquent {
	const PAGE_USER = 1;
	const PAGE_WEBSITE = 2;
	const POSITION_TOP = 1;
	const POSITION_BOTTOM = 2;
	protected $table = "m_page";
	public $timestamps = false;
	
	/**
	 * getMainPages : is a function for getting Main Page to display front page
	 *
	 * @param        	
	 *
	 * @return true : if it main page is selected sucessfully
	 * @access public
	 * @author Socheat
	 */
	public function getMainPages($id = null, $whereArr = array()) {
		$response = new stdClass ();
		try {
			if (! is_null ( $id )) {
				$where = array (
						'status' => 1,
						'id' => $id 
				);
			} else {
				$where = array (
						'status' => 1,
						'page_belong_to' => 2
				);
			}
			if (! empty ( $whereArr )) {
				$byWhere = $whereArr;
			} else {
				$byWhere = $where;
			}
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.M_PAGE' ) )->select ( '*' )->where ( $byWhere )->get ();
			$response->result = $result;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}
		
		return $response;
	}
	
	/**
	 * getWidgetPages : is a function for getting widget Page to display front page
	 *
	 * @param        	
	 *
	 * @return true : if it widget page is selected sucessfully
	 * @access public
	 * @author Socheat
	 */
	public function getWidgetPages($where = array()) {
		$response = new stdClass ();
		try {
			if (! empty ( $where )) {
				$where = $where;
			} else {
				$where = array (
						'type' => 'widget' 
				);
			}
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.M_PAGE' ) )->select ( '*' )->where ( $where )->get ();
			$response->result = $result;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}
		
		return $response;
	}
	
	/**
	 * getUserPages : is a function for getting User Page to display front page
	 *
	 * @param        	
	 *
	 * @return true : if it User page is selected sucessfully
	 * @access public
	 * @author Socheat
	 */
	public function getUserPages($userID, $where = null, $order = array()) {
		$response = new stdClass ();
		try {
			if (! empty ( $where )) {
				$where = $where;
			} else {
				$where = array (
						'user_id' => $userID,
						'type' => 'static' 
				);
			}
			
			$result = DB::table ( Config::get ( 'constants.TABLE_NAME.S_PAGE' ) )->select ( '*' )->where ( $where )->orderBy ( 'order' )->get ();
			$response->result = $result;
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}
		
		return $response;
	}
	/**
	 * addUserPages : is a function for adding user Page to display front page
	 *
	 * @param        	
	 *
	 * @return true : if it user page is added sucessfully
	 * @access public
	 * @author Socheat
	 */
	public function addUserPages($userID, $id, $position = 1, $type = 'static') {
		$response = new stdClass ();
		try {
			$where = array (
					'user_id' => $userID,
					'm_page_id' => $id 
			);
			$checkUserPage = $this->getUserPages ( $userID, $where );
			if (empty ( $checkUserPage->result )) {
				$getPageName = $this->getMainPages ( $id );
				if (! empty ( $getPageName->result )) {
					$title = $getPageName->result [0]->title_en;
					/* add new */
					$data = array (
							'user_id' => $userID,
							'm_page_id' => $id,
							'title' => $title,
							'type' => $type,
							'position' => $position 
					);
					DB::table ( Config::get ( 'constants.TABLE_NAME.S_PAGE' ) )->insertGetId ( $data );
				}
				$response = $this->getUserPages ( $userID, array (
						'user_id' => $userID,
						'type' => $type 
				) );
			} else {
				$response->result = 0;
			}
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}
		
		return $response;
	}
	
	/**
	 * addUserPagesConfig : is a function for adding user config to display front page
	 *
	 * @param        	
	 *
	 * @return true : if it user page Config is added sucessfully
	 * @access public
	 * @author Socheat
	 */
	public function addUserPagesConfig($userID, $title = 'config', $status = 1, $type = 'config') {
		$response = new stdClass ();
		try {
			$data = array (
					'user_id' => $userID,
					'title' => $title,
					'type' => $type,
					'status' => $status 
			);
			DB::table ( Config::get ( 'constants.TABLE_NAME.S_PAGE' ) )->insertGetId ( $data );
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}
		
		return $response;
	}
	
	/**
	 * addUserPages : is a function for adding user Page to display front page
	 *
	 * @param        	
	 *
	 * @return true : if it user page is added sucessfully
	 * @access public
	 * @author Socheat
	 */
	public function updateUserPages($data, $where) {
		try {
			$response = DB::table ( Config::get ( 'constants.TABLE_NAME.S_PAGE' ))
				->where ($where)
				->update ( $data );
			return true;
		} catch ( \Exception $e ) {
			return $e->getMessage ();
		}
		
		
	}
	
	/**
	 * addUserPages : is a function for adding user Page to display front page
	 *
	 * @param        	
	 *
	 * @return true : if it user page is added sucessfully
	 * @access public
	 * @author Socheat
	 */
	public function addUserMenuPages($data) {
		try {
			return DB::table ( Config::get ( 'constants.TABLE_NAME.S_PAGE' ) )->insertGetId ( $data );
		} catch ( \Exception $e ) {
			return $e->getMessage ();
		}
		
		return $response;
	}
	/**
	 * addUserPages : is a function for adding user Page to display front page
	 *
	 * @param        	
	 *
	 * @return true : if it user page is added sucessfully
	 * @access public
	 * @author Socheat
	 */
	public function addUserWidgetPages($userID) {
		$response = new stdClass ();
		try {
			$where = array (
					'user_id' => $userID,
					'type' => 'widget' 
			);
			$checkUserPage = $this->getUserPages ( $userID, $where );
			if (empty ( $checkUserPage->result )) {
				$getPageName = $this->getWidgetPages ( array (
						'type' => 'widget' 
				) );
				if (! empty ( $getPageName->result )) {
					$i = 0;
					foreach ( $getPageName->result as $userWidget ) {
						$i ++;
						$title = $userWidget->title_en;
						/* add new */
						$data = array (
								'user_id' => $userID,
								'm_page_id' => $userWidget->id,
								'title' => $title,
								'order' => $i,
								'type' => 'widget' 
						);
						DB::table ( Config::get ( 'constants.TABLE_NAME.S_PAGE' ) )->insertGetId ( $data );
					}
				} else {
					/*if not set to defualt*/
					$dataDefualt = array('New Arrival Products', 'Hot Promotion Products', 'Secondhand Products', 'Monthly Pay  Products');
					$i =0 ;
					foreach ( $dataDefualt as $Widget ) {
						$i ++;
						/* add new */
						$data = array (
								'user_id' => $userID,
								'title' => $Widget,
								'order' => $i,
								'type' => 'widget'
						);
						DB::table ( Config::get ( 'constants.TABLE_NAME.S_PAGE' ) )->insertGetId ( $data );
					}
					/*end if not set to defualt*/
				}
				$response->result = DB::table ( Config::get ( 'constants.TABLE_NAME.S_PAGE' ) )->select ( '*' )->where ( $where )->orderBy ( 'order', 'asc' )->get ();
			} else {
				
				/* of have add new to update */
				$getPageName = $this->getWidgetPages ( array (
						'type' => 'widget' 
				) );
				if (! empty ( $getPageName->result )) {
					$i = 0;
					foreach ( $getPageName->result as $userWidget ) {
						$i ++;
						$title = $userWidget->title_en;
						$where_check = array (
								'user_id' => $userID,
								'type' => 'widget',
								'm_page_id' => $userWidget->id 
						);
						$checkUserPageExist = $this->getUserPages ( $userID, $where_check );
						if (empty ( $checkUserPageExist->result )) {
							/* add new */
							$data = array (
									'user_id' => $userID,
									'm_page_id' => $userWidget->id,
									'title' => $title,
									'order' => $i,
									'status' => 0,
									'type' => 'widget' 
							);
							DB::table ( Config::get ( 'constants.TABLE_NAME.S_PAGE' ) )->insertGetId ( $data );
						}
					}
				}
				/* end of have add new to update */
				$response->result = DB::table ( Config::get ( 'constants.TABLE_NAME.S_PAGE' ) )->select ( '*' )->where ( $where )->orderBy ( 'order', 'asc' )->get ();
			}
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}
		return $response;
	}
	
	/**
	 * addUserPages : is a function for adding user Page to display front page
	 *
	 * @param        	
	 *
	 * @return true : if it user page is added sucessfully
	 * @access public
	 * @author Socheat
	 */
	public function addUserWidgetPage($userID, $id, $order) {
		$response = new stdClass ();
		try {
			$where = array (
					'user_id' => $userID,
					'id' => $id,
					'type' => 'widget' 
			);
			$checkUserPage = $this->getUserPages ( $userID, $where );
			if (! empty ( $checkUserPage->result )) {
				$data = array (
						'order' => $order 
				);
				$response = DB::table ( Config::get ( 'constants.TABLE_NAME.S_PAGE' ) )->where ( $where )->update ( $data );
			}
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}
		
		return $response;
	}
	/**
	 * removeUserPages : is a function for remove user Page to display front page
	 *
	 * @param        	
	 *
	 * @return true : if it user page is reoved sucessfully
	 * @access public
	 * @author Socheat
	 */
	public function removeUserPages($userID, $id) {
		$response = new stdClass ();
		try {
			$where = array (
					'user_id' => $userID,
					'id' => $id 
			);
			DB::table ( Config::get ( 'constants.TABLE_NAME.S_PAGE' ) )->where ( $where )->delete ();
		} catch ( \Exception $e ) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage ();
		}
		
		return $response;
	}
	public static function getPagesToPutOnTop() {
		$where = array (
				'page_belong_to' => self::PAGE_WEBSITE,
				'position' => self::POSITION_TOP 
		);
		
		return DB::table ( Config::get ( 'constants.TABLE_NAME.M_PAGE' ) )->where ( $where )->get ();
	}
	public static function getPagesToPutBottom() {
		$where = array (
				'page_belong_to' => self::PAGE_WEBSITE,
				'position' => self::POSITION_BOTTOM 
		);
		
		return DB::table ( Config::get ( 'constants.TABLE_NAME.M_PAGE' ) )->where ( $where )->get ();
	}
}
