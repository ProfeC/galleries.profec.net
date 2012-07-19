<?php
	class Image{
		public $title; // name -extension
		public $path; // full unc path or url?
		public $description; // from EXIF
		public $icon; // generated via imageMagik, GD or something.
		
		public function __construct($title, $path, $description, $icon){
			$this->title = $title;
			$this->path = $path;
			$this->description = $description;
			$this->icon = $icon;
		}	
	}
?>