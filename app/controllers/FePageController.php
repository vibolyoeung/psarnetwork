<?php

class FePageController extends BaseController {
	private $mod_slideshow;
	private $mod_setting;
	
	function __construct(){
		$this->mod_slideshow = new Slideshow();
		$this->mod_setting = new Setting();
	}
	public function index()
	{
		$limit = $this->mod_setting->getSlidshowNumber();
		$listSlideshows = self::getSlideshowToHomePage($limit->data->setting_value);
		$listCategories = self::getCategoriesHomePage();
		//var_dump($listSubCategories);die;
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
