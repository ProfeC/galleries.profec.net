<div id="content" class="row">
	<div id="galleryList" class="twelve columns">
	<?php
	// Get the list of galleries
	$galleryArray = $this->model->getGalleryList();
	foreach($galleryArray as $gallery){
		echo "\t<h3 class=\"subheader\">" . $gallery . "</h3>
		\n";
		echo "\t\t\t<ul class=\"block-grid three-up\">";
		
		// Get the list of albums in each gallery found
		$dirArray = $this->model->getAlbumList($gallery);
		
		foreach($dirArray as $directory){
			$imageThumbnail = $this->image->getThumbnail(GALLERY_ROOT . $gallery ."/" . $directory, 0, $galleryListImageWidth, $galleryListImageHeight);
            $imageLink = "index.php?g=" . base64_encode($gallery ."/" . $directory) . "&t=" . base64_encode($directory);
            
            // this should be from the gallery model, not model model.
            $galleryDescription = $this->model->getDescription(GALLERY_ROOT . $gallery ."/" . $directory);
            
			echo "<li><div class=\"panel radius\"><a href=\"" . $imageLink . "\" class=\"th\"><img src=\"" . $imageThumbnail . "\" width=\"" . $galleryListImageWidth . "\"  height=\"" . $galleryListImageHeight . "\" alt=\"\" /></a><h5><a href=\"" . $imageLink . "\">$directory</a></h5>" . $galleryDescription . "</div></li>\n";
		};

		echo "\t\t</ul>\n
	";
		}
	?>
	</div>
</div>
