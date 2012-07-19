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
			$dh = @opendir(BASE_PATH . GALLERY_ROOT . $path); // Open the directory to the handle $dh
			
			while(false !== ($dir = readdir($dh))){ // Loop through the directory
				if(!in_array($dir, $ignore)){ // Check that this directory is not to be ignored
					if(is_dir(BASE_PATH . GALLERY_ROOT . "/$path/$dir")){ 
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
			$dh = @opendir(BASE_PATH . GALLERY_ROOT); // Open the directory to the handle $dh

			while(false !== ($dir = readdir($dh))){ // Loop through the directory
				if(!in_array($dir, $ignore)){ // Check that this directory is not to be ignored
					if(is_dir(BASE_PATH . GALLERY_ROOT . "/$dir")){ 
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

		public function getSlideImages($thisDir){
			$filesArray = array();
			$dir = opendir(dirname(__FILE__) . '/' . $thisDir);
			while (false !== ($file = readdir($dir))){
				$extension = strtolower(substr(strrchr($file, '.'), 1));
				if($extension == 'jpg'){
					$filesArray[] = $file;
				}
			}
			closedir($dir);
			sort($filesArray, SORT_STRING);
			$fileCount = count($filesArray);

			echo "var slideImageData = [\n";
			for($i=0; $i<sizeof($filesArray); $i++){
				$image = $thisDir . "/" .$filesArray[$i];
				$imageExif = exif_read_data($image, 'ANY_TAG', true);
				//print_r($imageExif);
	         $imageTitle = $imageExif['FILE']['FileName'];
				$imageDescription = $imageExif['EXIF']['ExposureTime'] . 's @ ' .$imageExif['COMPUTED']['ApertureFNumber'] . ' on ISO ' . $imageExif['EXIF']['ISOSpeedRatings'];
				// echo "\t\t{\"image\":\"$image\", \"title\":\"$imageTitle\", \"description\":\"$imageDescription\", \"link\":null}";
				echo "\t\t{\n\t\t\t'content':'<div class=\"slide_inner\"><img class=\"photo\" src=\"" . $image . "\" alt=\"" . $imageTitle . "\" /></div>'\n}";

				/*
				"content": "<div class='slide_inner'><a target='_blank' class='photo_link' href='#'><img class='photo' src='images/banner_bike.jpg' alt='Bike'></a><a target='_blank' class='caption' href='#'>Sample Carousel Pic Goes Here And The Best Part is that...</a></div>",
			    "content_button": "<div class='thumb'><img src='images/f2_thumb.jpg' alt='bike is nice'></div><p>Agile Carousel Place Holder</p>"
					*/
				if($fileCount > 1){
					echo ",\n";
					$fileCount--;
				} else {
					echo "\n\t\t\t\t\t\t];\n";
				}
			}		
		} // end getSlideImages();
	}
?>