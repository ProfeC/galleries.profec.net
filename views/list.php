<div class="container">
	<div id="gallery">
	<?php
	// Get the list of galleries
	$galleryArray = $this->model->getGalleryList();
	foreach($galleryArray as $gallery){
		echo "\t<h2>" . $gallery . "</h2>
		\n";
		echo "\t\t\t<ul class=\"list\">";
		
		// Get the list of albums in each gallery found
		$dirArray = $this->model->getAlbumList($gallery);
		
		foreach($dirArray as $directory){
			$imageThumbnail = $this->image->getThumbnail(GALLERY_ROOT . $gallery ."/" . $directory, 0, $galleryListImageWidth, $galleryListImageHeight);
			
			echo "<li class=\"directory\" style=\"line-height:"  . ($galleryListImageHeight - 5) . "px\"><a href=\"index.php?g=" . base64_encode($gallery ."/" . $directory) . "&t=" . base64_encode($directory) . "\"><img class=\"go-left\" src=\"" . $imageThumbnail . "\" width=\"" . $galleryListImageWidth . "\" height=\"" . $galleryListImageHeight . "\" alt=\"\" />$directory</a></li>\n";
		};

		echo "\t\t</ul>\n
	";
		}
	?>
	</div>
</div>
