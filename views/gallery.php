<div class="row">
    <div id="gallery" class="twelve columns">
        <?php
            $galleryDescription = $this->model->getDescription($galleryDir); // this should be from the gallery model, not model model.
            if($galleryDescription != ''){
                echo "<div class=\"panel radius\">\n\t" . $galleryDescription . "\n</div>";
            }
        ?>
        <ul class="block-grid three-up" data-clearing>
        	<?php
        		$filesArray = $this->model->getImages($galleryDir);
        		$fileCount = count($filesArray);
                
        		for($i=0; $i<sizeof($filesArray); $i++){
        			$imagePath = BASE_PATH . "/" . GALLERY_ROOT . base64_decode($gallery) . "/" . $filesArray[$i];
        			$imageURL = GALLERY_ROOT . base64_decode($gallery) . "/" . $filesArray[$i];
        			$imageExif = exif_read_data($imagePath, 'ANY_TAG', true);
        			$imageTitle = $imageExif['FILE']['FileName'];
        			$imageDescription = $imageExif['EXIF']['ExposureTime'] . 's @ ' .$imageExif['COMPUTED']['ApertureFNumber'] . ' on ISO ' . $imageExif['EXIF']['ISOSpeedRatings']; // TODO: Check to see if there are values for these keys and display them if they are not empty.
			
        			echo "<li><a href=\"$imageURL\" class=\"th\"><image src=\"$imageURL\" alt=\"$imageTitle\" data-caption=\"$imageDescription\" /></a></li>";
                      
        			if($fileCount > 1){
        				echo "\n";
        				$fileCount--;
        			} else {
        				echo "\n\n";
        			}
        		}
        	?>
        </ul>
    </div>
</div>