<?php
	//include_once("models/gallery.php");
	
	class Model {
		public function getGalleryList($path = '.', $level = 0){
			$ignore = array('cgi-bin', '.', '..', '_'); 
			$dirArray = array();
			$dh = @opendir(GALLERY_ROOT . '/' . $path); // Open the directory to the handle $dh 
			
			while(false !== ($dir = readdir($dh))){ // Loop through the directory
				if(!in_array($dir, $ignore)){ // Check that this directory is not to be ignored
					if(is_dir(GALLERY_ROOT . "/$path/$dir")){ 
						$dirArray[] = $dir;
					}
				} 
			}  
			
			closedir($dh); // Close the directory handle
			sort($dirArray); // Sort the directory array
			
			foreach($dirArray as $directory){
				echo "<li><a href=\"index.php?g=" . base64_encode($path . '/' . $directory) . "&t=" . base64_encode($directory) . "\">$directory</a></li>\n";
			};
		}
		
		public function getGallery($title){
			// we use the previous function to get all the books and then we return the requested one.
			// in a real life scenario this will be done through a db select command
			$allGalleries = $this->getGalleryList();
			return $allGalleries[$title];
		}
	}
?>