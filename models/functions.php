<?php
	function getImageArray($thisGallery, $thisDir){
		$filesArray = array();
		$dir = opendir($thisDir);
		while (false !== ($file = readdir($dir))){
			$extension = strtolower(substr(strrchr($file, '.'), 1));
			if($extension == 'jpg'){
				$filesArray[] = $file;
			}
		}
		closedir($dir);

		return sort($filesArray); //, SORT_STRING
	}

	function getImages($thisGallery, $thisDir){
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
		$fileCount = count($filesArray);
				
		echo "var imageData = [\n";
		for($i=0; $i<sizeof($filesArray); $i++){
			$image = GALLERY_ROOT . '/' . base64_decode($thisGallery) . '/' . $filesArray[$i];
			$imageExif = exif_read_data($image, 'ANY_TAG', true);
			//print_r($imageExif);
         $imageTitle = $imageExif['FILE']['FileName'];
			$imageDescription = $imageExif['EXIF']['ExposureTime'] . 's @ ' .$imageExif['COMPUTED']['ApertureFNumber'] . ' on ISO ' . $imageExif['EXIF']['ISOSpeedRatings'];
			echo "\t\t{\"image\":\"$image\", \"title\":\"$imageTitle\", \"description\":\"$imageDescription\", \"link\":null}";
		
			if($fileCount > 1){
				echo ",\n";
				$fileCount--;
			} else {
				echo "\n\t\t\t\t\t\t]\n";
			}
		}		
	} // end getImages();

	function getSlideImages($thisDir){
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
	
	// From: http://webcache.googleusercontent.com/search?q=cache:wNFb4W-Sj_4J:www.codingforums.com/showthread.php%3Ft%3D71882+&cd=9&hl=en&ct=clnk&gl=us
	function getDirectory( $path = '.', $level = 0 ){ // Directories to ignore when listing output. Many hosts will deny PHP access to the cgi-bin.
		$ignore = array( 'cgi-bin', '.', '..', '_' ); 
		$dirArray = array();
	    $dh = @opendir( GALLERY_ROOT . '/' . $path ); // Open the directory to the handle $dh 
		
	    while( false !== ( $dir = readdir( $dh ) ) ){ // Loop through the directory
	        if( !in_array( $dir, $ignore ) ){ // Check that this directory is not to be ignored
	            if( is_dir( "GALLERY_ROOT/$path/$dir" ) ){ // Its a directory, so we need to keep reading down... 
					$dirArray[] = $dir;
//	                echo "<li><a href=\"index.php?g=" . base64_encode($path . '/' . $dir) . "&t=" . base64_encode($dir) . "\">$dir</a></li>\n"; 
	            }
	        } 
	    }  
	    
	    closedir( $dh ); // Close the directory handle
		sort($dirArray); // Sort the directory array
		
		foreach($dirArray as $directory){
			echo "<li><a href=\"index.php?g=" . base64_encode($path . '/' . $directory) . "&t=" . base64_encode($directory) . "\">$directory</a></li>\n"; 
			//echo "<li><a href=\"index.php?g=" . $path . '/' . $directory . "&t=" . $directory . "\">$directory</a></li>\n"; 
		};
	}
?>
