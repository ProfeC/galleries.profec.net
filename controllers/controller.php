<?php
include_once("models/model.php");

class Controller {
	public $model;	
	
	public function __construct(){
		$this->model = new Model();
		$this->image = new Image();
	}
	
	public function invoke(){
		// Extra settings
		error_reporting(E_ALL);
		ini_set("display_errors", true);
		ini_set("report_memleaks", true);
		ini_set('html_errors', true);
		ini_set("memory_limit", "64M");
						
		// Constants
		define("GALLERY_ROOT", "images/gallery/");
		define("THUMBNAIL_ROOT", "images/thumbs");
		define('BASE_PATH',realpath('.'));
		define('BASE_URL', dirname($_SERVER["SCRIPT_NAME"]));
		
		// Variables
		$galleryURI = null;
		$gallery = null;
		$galleryDir = null;
		$galleryFeature = $this->model->getGalleryFeature('2012\/3');
		$galleryListImageHeight = 200;
		$galleryListImageWidth = 300;

		if(!empty($_GET['g'])){
			$gallery = $_GET['g'];
			$galleryDir = (BASE_PATH . "/" . GALLERY_ROOT . base64_decode($gallery));
			
			include('views/header.php');
			include('views/gallery.php');
			include('views/footer.php');
		} else {
            // this is the index
			include('views/header.php');
			//include('views/carousel.php');
			include('views/list.php');
			include('views/footer.php');
		}
	}
}
?>