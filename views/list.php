<div class="container">
	<div id="gallery">
	<?php
	// Get the list of galleries
	$galleryArray = $this->model->getGalleryList();
	foreach($galleryArray as $gallery){
		echo "\t<h2>" . $gallery . "</h2>
		\n";
		echo "\t\t\t<div class=\"list\">";
		
		// Get the list of albums in each gallery found
		$dirArray = $this->model->getAlbumList($gallery);
		
		foreach($dirArray as $directory){
			// Get the list of images in the album so we can use one of them as an icon. These thumbnails should be resizde by the system.
			$filesArray = $this->model->getImages(BASE_PATH . "/" . GALLERY_ROOT . $gallery . "/" . $directory);
			$imgThumbnail = $this->model->getImageThumbnail(BASE_PATH . "/" . GALLERY_ROOT . $gallery . "/" . $directory);
			$imgThumbnail = imagejpeg($imgThumbnail, null, 69);
			print_r(base64_encode($imgThumbnail));
			
			//echo "<img src=\"data:image/jpeg;base64," . base64_encode($imgThumbnail) . "\" />";
			imagedestroy($imgThumbnail);
			
			echo "<p class=\"directory\"><a href=\"index.php?g=" . base64_encode($gallery ."/" . $directory) . "&t=" . base64_encode($directory) . "\"><img src=\"" . GALLERY_ROOT . $gallery ."/" . $directory . "/" . $filesArray[0] . "\" width=\"" . $galleryListImageWidth . "\" alt=\"\" /><br />$directory</a></p>\n";
		};

		echo "\t\t</ul>\n
	";
		}
	?>
	</div>
</div>
