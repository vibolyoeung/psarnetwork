<?php

class FePageController extends BaseController {
	private $mod_slideshow;
	function __construct(){
		$this->mod_slideshow = new Slideshow();
	}
	public function index()
	{
		$listSlideshows = self::getSlideshowToHomePage(5);
		$listCategories = self::getCategoriesHomePage();
		return View::make('frontend.partials.home')
						->with('slideshows', $listSlideshows->result)
						->with('maincategories', $listCategories->result);
	}
	
	public function getSlideshowToHomePage($limit){
		$slideshow = $this->mod_slideshow->getSlideshowToFrontEnd($limit);
		return $slideshow;
	}
	
	public function getCategoriesHomePage(){
		$Category = $this->mod_slideshow->getMainCategories();
		return $Category;
	}

}
