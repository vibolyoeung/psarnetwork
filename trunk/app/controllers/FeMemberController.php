<?php

class FeMemberController extends BaseController {

    private $mod_category;
    private $mod_setting;

    function __construct() {
        $this->mod_slideshow = new Slideshow();
    	$this->mod_category = new MCategory();
    	$this->mod_setting = new Setting();
       
    }


    public function index()
    {
    	$listCategories = self::getCategoriesHomePage();
    	return View::make('frontend.modules.member.index')
    	->with('maincategories', $listCategories->result);	
    }
    public function register($usertype = '',$step='') {
         $limit = $this->mod_setting->getSlidshowNumber();
    	$listCategories = self::getCategoriesHomePage();

        if (!empty($usertype)) {
//            switch($step){
//                case 'agree':
//                $paramate = $usertype.'-'.$agree
//               break;
//            }
             return View::make('frontend.modules.member.'.$usertype.'-'.$step)
    	       ->with('maincategories', $listCategories->result);   
//            if ($usertype == 'enterprise') {
//                return View::make('frontend.modules.member.enterprise')
//    	       ->with('maincategories', $listCategories->result);
//            } else {
//                return View::make('frontend.modules.member.freesell')
//	           ->with('maincategories', $listCategories->result);
//            }
        } else {
            return View::make('frontend.modules.member.register')
    	       ->with('maincategories', $listCategories->result);
        }
    }
    
    public function addmenuajax (){
        $this->layout = null;
        $Category = Input::get('Category');
        $SubCategory = Input::get('SubCategory');
        $MainMenu = Input::get('MainMenu');
        if(!empty($MainMenu)|| !empty($SubCategory)||!empty($Category)) {
            echo json_encode(array('MainMenu' => $Category, 'Category'=>$Category, 'SubCategory'=>$SubCategory));
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


}
