<?php
class ImageController extends BaseController {
	public function phpThumb($image)
	{
		$paths = Input::get('p');
		if(!$paths) {
			die('please set your file paths. ex: ?p=product');
		}
		//$src = Input::get('src');
		/* 
		 * size=left|right|type // size=100 meant 100% or 40%
		 * size=100|100|adaptive or size=100, mean size=100% 
		 */
		$reSize = Input::get('size');
		$reSizeArr = explode('|', $reSize);
		
		/*
		 * crop=left|right|top|bottom
		 * crop=100|100 // crop from center
		 */
		$crop = Input::get('crop');
		$cropArr = explode('|', $crop);
		

		$height = Input::get('h') ? Input::get('h') : 0;
		$width = Input::get('w') ? Input::get('w') : 0;
		//return 'test';
		$destinationPath = base_path () . Config::get ( 'constants.DIR_IMAGE.DEFAULT' ).$paths.'/';
		$file = $destinationPath . $image;
		$thumb = App::make('phpthumb');
		if($reSize) {
			/*you can set adaptive or percent 100, 100, 'percent'*/
			if(!empty($reSizeArr[1])) {
				$sW = $reSizeArr[0];
				$sH = $reSizeArr[1];
				$sT = 'adaptive';
			} else if(!empty($reSizeArr[0])){
				$sW = $reSizeArr[0];
				$sH = 0;
				$sT = 'adaptive';
			} else {
				$sW = $reSize;
				$sH = 0;
				$sT = 'percent';
			}
			$thumb->create('resize', array($file, $sW, $sH, $sT));
		} else if($crop) {
			if(!empty($cropArr[3])) {
				$fLeft = $cropArr[0];
				$fRight = $cropArr[1];
				$fTop = $cropArr[2];
				$fBottom = $cropArr[3];
				$thumb->create('crop', array($file,'basic', $fLeft, $fRight, $fTop, $fBottom));
			} else if(!empty($cropArr[1])) {
				$fLeft = $cropArr[0];
				$fRight = $cropArr[1];
				$thumb->create('crop', array($file,'center', $fLeft, $fRight));
			} else if(!empty($cropArr[0])) {
				$fLeft = $cropArr[0];
				$fRight = 0;
				$thumb->create('crop', array($file,'center', $fLeft, $fRight));
			} else {
				$fLeft = $crop;
				$fRight = 0;
				$thumb->create('crop', array($file,'center', $fLeft, $fRight));
			}
		} else if(!empty($height) && !empty($width)) {
			$sT = 'adaptive';
			$thumb->create('resize', array($file, $width, $height, $sT));
		} else if($height) {
			$newHeight = $height;
			list($width, $height, $type, $attr) = getimagesize($file);
			$newWidth = $this->getSizeByFixedHeight($newHeight, $height, $width);
			$sT = 'adaptive';
			$thumb->create('resize', array($file, $newWidth, $newHeight, $sT));
		} else if($width) {
			$newWidth = $width;
			list($width, $height, $type, $attr) = getimagesize($file);
			$newHeight = $this->getSizeByFixedWidth($newWidth, $height, $width);
			$sT = 'adaptive';
			$thumb->create('resize', array($file, $newWidth, $newHeight, $sT));
		} else {
			$thumb->create('', array($file));
		}
		$thumb->show();
		//$img->create('', array($file, 400, 400, 'center'))->show();
		//$file = 'http://phpthumb.gxdlabs.com/wp-content/themes/phpthumb/images/header_bg.png';
// 		App::make('phpthumb')
// 		->create('crop', array($file, 'center', 200, 200))
// 		//->create('crop', array($file, 'basic', 100, 100, 300, 200))
// 		//->create('resize', array($file, 400, 400, 'adaptive'))
// 		//->rotate(array('degree', 180))
// 		//->reflection(array(40, 40, 80, true, '#a4a4a4'))
// 		->show();
		//->save(base_path() . '/', 'aaa.jpg');
		//App::make('phpthumb')->create()->view()->save();
	}
	private function getSizeByAuto($newWidth, $newHeight,$height,$width) {
		
	}
	private function getSizeByFixedHeight($newHeight,$height,$width)
	{
		$ratio = $width / $height;
		$newWidth = $newHeight * $ratio;
		return $newWidth;
	}
	
	private function getSizeByFixedWidth($newWidth,$height,$width)
	{
		$ratio = $height / $width;
		$newHeight = $newWidth * $ratio;
		return $newHeight;
	}
	
}