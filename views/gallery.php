<div class="container">
	<div id="gallery" class="go-shadow"></div>
</div>

<script type="text/javascript">
	//<![CDATA[
	<?php
		$filesArray = $this->model->getImages($galleryDir);
		$fileCount = count($filesArray);
		
		echo "var imageData = [\n";
		for($i=0; $i<sizeof($filesArray); $i++){
			$imagePath = BASE_PATH . "/" . GALLERY_ROOT . base64_decode($gallery) . "/" . $filesArray[$i];
			$imageURL = GALLERY_ROOT . base64_decode($gallery) . "/" . $filesArray[$i];
			$imageExif = exif_read_data($imagePath, 'ANY_TAG', true);
			$imageTitle = $imageExif['FILE']['FileName'];
			$imageDescription = $imageExif['EXIF']['ExposureTime'] . 's @ ' .$imageExif['COMPUTED']['ApertureFNumber'] . ' on ISO ' . $imageExif['EXIF']['ISOSpeedRatings']; // TODO: Check to see if there are values for these keys and display them if they are not empty.
			
			echo "{\"image\":\"$imageURL\", \"title\":\"$imageTitle\", \"description\":\"$imageDescription\", \"link\":null}";

			if($fileCount > 1){
				echo ",\n";
				$fileCount--;
			} else {
				echo "\n]\n";
			}
		}
	?>
 
	Galleria.loadTheme('scripts/galleria/themes/classic/galleria.classic.min.js');
	Galleria.run(
	'#gallery',{
		dataSource:imageData
		,'height':0.70
		//,'imageCrop':'height'
		,'imageMargin':13
		,'responsive':true
		,'imagePan':true
		,'transition':'fade'
		,'autoplay':3000
		,'thumbquality':false
	});
	//]]>
</script>