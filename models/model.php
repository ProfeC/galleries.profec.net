<?php
	include_once("models/gallery.php");
	include_once("models/image.php");
	
	class Model {
		public function getGalleryTitle(){
			if(!empty($_GET['t'])){
				$title = base64_decode($_GET['t']);
			} else {
				$title = 'Gallery Listing';
			}
			
			return $title;
		}
		
		public function getAlbumList($path = '.'){
			$ignore = array('cgi-bin', '.', '..', '_'); 
			$dirArray = array();
			$dh = @opendir(BASE_PATH . "/" . GALLERY_ROOT . $path); // Open the directory to the handle $dh
			
			while(false !== ($dir = readdir($dh))){ // Loop through the directory
				if(!in_array($dir, $ignore)){ // Check that this directory is not to be ignored
					if(is_dir(BASE_PATH . "/" . GALLERY_ROOT . "/$path/$dir")){ 
						$dirArray[] = $dir;
					}
				} 
			}  

			closedir($dh); // Close the directory handle
			sort($dirArray); // Sort the directory array
			
			return $dirArray;
		}
		
		public function getGalleryList(){
			$ignore = array('cgi-bin', '.', '..', '_');
			$dirArray = array();
			$dh = @opendir(BASE_PATH . "/" . GALLERY_ROOT); // Open the directory to the handle $dh

			while(false !== ($dir = readdir($dh))){ // Loop through the directory
				if(!in_array($dir, $ignore)){ // Check that this directory is not to be ignored
					if(is_dir(BASE_PATH . "/" . GALLERY_ROOT . "/$dir")){ 
						$dirArray[] = $dir;
					}
				}
			}  
			
			closedir($dh); // Close the directory handle
			rsort($dirArray); // Sort the directory array
			
			return $dirArray;
		}
		
		public function getGalleryFeature($gallery){
			return $gallery;
		}
		
		public function getImages($thisDir){
			$filesArray = array();
			$dir = opendir($thisDir);
			while (false !== ($file = readdir($dir))){
				$extension = strtolower(substr(strrchr($file, '.'), 1));
				if($extension == 'jpg'){
					$filesArray[] = $file;
				}
			}
			closedir($dir);
			sort($filesArray); //, SORT_STRING
			
			return $filesArray;
		}
		
		public function getImageThumbnail($thisDir, $thisImage = 0){
			// get the array of images for this directory
			$imageArray = self::getImages($thisDir);
			// get the specified image
			$imageFile = $thisDir . "/" . $imageArray[$thisImage];
			
			/* Attempt to open */
			$imageThumbnail = imagecreatefromjpeg($imageFile);
		
			/* See if it failed */
			if(!$imageThumbnail){
				/* Create a black image */
				$imageThumbnail  = imagecreatetruecolor(150, 30);
				$bgc = imagecolorallocate($imageThumbnail, 255, 255, 255);
				$tc  = imagecolorallocate($imageThumbnail, 0, 0, 0);
		
				imagefilledrectangle($imageThumbnail, 0, 0, 150, 30, $bgc);
		
				/* Output an error message */
				imagestring($imageThumbnail, 1, 5, 5, 'Error loading ' . $imageFile, $tc);
			}
			
			return $imageThumbnail;
		}
		
		public function getSlideImages($thisDir){
			$filesArray = array();
            $galleryDir = 'images/gallery/';
			$dir = opendir($galleryDir . $thisDir);
			while (false !== ($file = readdir($dir))){
				$extension = strtolower(substr(strrchr($file, '.'), 1));
				if($extension == 'jpg'){
					$filesArray[] = $file;
				}
			}
			closedir($dir);
			sort($filesArray, SORT_STRING);
			$fileCount = count($filesArray);

			for($i=0; $i<sizeof($filesArray); $i++){
				$image = $galleryDir . $thisDir . "/" .$filesArray[$i];
				$imageExif = exif_read_data($image, 'ANY_TAG', true);
                // print_r($imageExif);
	         $imageTitle = $imageExif['FILE']['FileName'];
				$imageDescription = $imageExif['EXIF']['ExposureTime'] . 's @ ' .$imageExif['COMPUTED']['ApertureFNumber'] . ' on ISO ' . $imageExif['EXIF']['ISOSpeedRatings'];
				
                // echo "\t\t{\"image\":\"$image\", \"title\":\"$imageTitle\", \"description\":\"$imageDescription\", \"link\":null}";
                
				echo "\t\t<img class=\"photo\" src=\"" . $image . "\" alt=\"" . $imageTitle . "\" data-caption=\"caption" . $i . "\" />";
                
				if($fileCount > 1){
					echo "\n";
					$fileCount--;
				} else {
					echo "\n";
				}
			}		
		} // end getSlideImages();
	}
?>