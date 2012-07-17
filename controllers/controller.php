<?php
include_once("models/model.php");

class Controller {
	public $model;	
	
	public function construct(){
		$this->model = new Model();
	} 
	
	public function invoke(){				
		// Constants
		define("GALLERY_ROOT", "images/gallery/");
		
		// Variables
		$galleryURI = null;
		$galleryFeature = GALLERY_ROOT . '2012/Kidstock 2012';
		
		// Show all errors
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
		ini_set("report_memleaks", 1);
		ini_set("memory_limit", "64M");
		
		/*if (!isset($_GET['gallery'])){
			// no gallery is requested, we'll show a list of all available books
			$galleries = $this->model->getGalleryList();
			include 'view/list.php';
		} else {
			// show the requested book
			$gallery = $this->model->getGallery($_GET['gallery']);
			include 'view/gallery.php';
		}*/
	}
}
?>