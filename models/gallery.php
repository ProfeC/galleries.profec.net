<?php
	class Gallery{
		public $title;
		public $path;
		public $description;
		public $icon;
		
		public function __construct($path, $title, $description, $icon){
			$this->title = $title;
			$this->path = $path;
			$this->description = $description;
			$this->icon = $icon;
		}
		
	}
?>