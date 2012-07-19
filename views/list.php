<div class="container">
	<div id="gallery">
	<?php
	// Get the list of galleries
	$galleryArray = $this->model->getGalleryList();
	foreach($galleryArray as $gallery){
		echo "\t<h2>" . $gallery . "</h2>
		\n";
		echo "\t\t\t<ul>";
		
		// Get the list of albums in each gallery found
		$dirArray = $this->model->getAlbumList($gallery);
		
		foreach($dirArray as $directory){
			// Get the list of images in the album so we can use one of them as an icon.
			$filesArray = $this->model->getImages(BASE_PATH . GALLERY_ROOT . $gallery . "/" . $directory);
			echo "<li class=\"directory\" style=\"line-height:" . ($galleryListImageHeight - 5) . "px\"><a href=\"index.php?g=" . base64_encode($gallery ."/" . $directory) . "&t=" . base64_encode($directory) . "\"><img src=\"" . GALLERY_ROOT . $gallery ."/" . $directory . "/" . $filesArray[3] . "\" height=\"" . $galleryListImageHeight . "\" weight=\"" . $galleryListImageWidth . "\" alt=\"test\" class=\"go-left\" />$directory</a></li>\n";
		};

		echo "\t\t</ul>\n
	";
		}
	?>
	</div>
</div>