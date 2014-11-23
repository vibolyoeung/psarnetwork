<?php

class FePageController extends BaseController {
	private $mod_slideshow;
	function __construct(){
		$this->mod_slideshow = new Slideshow();
	}
	public function index()
	{
		$listSlideshows = self::getSlideshowToHomePage(10);
		return View::make('frontend.partials.home')->with('slideshows', $listSlideshows->result);
	}
	
	public function getSlideshowToHomePage($limit){
		$slideshow = $this->mod_slideshow->getSlideshowToFrontEnd($limit);
		return $slideshow;
	}

}
