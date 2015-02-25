<?php

class Slideshow extends Eloquent{

	// Type
	const HOMEPAGE = 1;

	// Position
	const SLIDE_SHOW = 1;


	public function getSlideShowHomePageFe ($limit) {
		$response = new stdClass();
		try {
			$result = DB::table(Config::get('constants.TABLE_NAME.ADVERTISEMENT').' AS adv')
			->where('status', 1)
			->where('adv_position_id', self::HOMEPAGE)
			->where('adv_page_id', self::SLIDE_SHOW)
			->orderBy('adv.id','desc')
			->take('limit', $limit)->get();
			$response->result = $result;
		} catch (\Exception $e) {
			$response->result = 0;
			$response->errorMsg = $e->getMessage();
		}

		return $response;
	}
}
