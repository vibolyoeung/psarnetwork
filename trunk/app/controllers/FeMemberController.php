<?php

class FeMemberController extends BaseController {

    private $mod_category;
    private $mod_setting;

    function __construct() {
        $this->mod_slideshow = new Slideshow();
    	$this->mod_category = new MCategory();
    	$this->mod_setting = new Setting();
    }

    public function index() {

        $listCategories = self::getCategoriesHomePage();
        return View::make('frontend.modules.member.index')
                        ->with('slideshows', $listSlideshows->result)
                        ->with('maincategories', $listCategories->result);
    }
    public function index()
    {
    	$limit = $this->mod_setting->getSlidshowNumber();
    	$listSlideshows = self::getSlideshowToHomePage($limit->data->setting_value);
    	$listCategories = self::getCategoriesHomePage();
    	return View::make('frontend.modules.member.index')
    	->with('slideshows', $listSlideshows->result)
    	->with('maincategories', $listCategories->result);
    }
    public function register($usertype = '') {
        if (!empty($usertype)) {
            if ($usertype == 'enterprise') {
                return View::make('frontend.modules.member.enterprise');
            } else {
                return View::make('frontend.modules.member.freesell');
            }
        } else {
            return View::make('frontend.modules.member.register');
        }
    }
    
    public function getSlideshowToHomePage($limit){
    	$slideshow = $this->mod_slideshow->getSlideshowToFrontEnd($limit);
    	return $slideshow;
    }
    
    public function getCategoriesHomePage(){
    	$Category = $this->mod_category->getMainCategories();
    	return $Category;
    }

    public function getCategoriesHomePage() {
        $Category = $this->mod_category->getMainCategories();
        return $Category;
    }

}
