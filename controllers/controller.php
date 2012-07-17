<?php
include_once("models/model.php");

class Controller {
	public $model;	
	
	public function __construct(){
		$this->model = new Model();
	} 
	
	public function invoke(){
		// Extra settings
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
		ini_set("report_memleaks", 1);
		ini_set("memory_limit", "64M");
						
		// Constants
		define("GALLERY_ROOT", "images/gallery/");
		
		// Variables
		$galleryURI = null;
		//$galleryFeature = $this->model->getGalleryFeature('2012/Kidstock 2012');

		if(!empty($_GET['g'])){
			$gallery = $_GET['g'];
			$galleryDir = dirname(__FILE__) . '/' . GALLERY_ROOT . '/' . base64_decode($gallery);
			$galleryTitle = $this->model->getTitle();
			
			include('views/header.php');
			include('views/gallery.php');
			include('views/footer.php');

			if(!empty($_GET['t'])){
				$galleryTitle = base64_decode($_GET['t']);
			} else {
				$galleryTitle = '';
			}
		} else {
			$gallery = null;
			$galleryDir = null;
			$galleryTitle = $this->model->getTitle();
			include('views/header.php');
			include('views/list.php');
			include('views/footer.php');
		}

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