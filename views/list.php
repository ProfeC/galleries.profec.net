<?php
foreach($galleryArray as $gallery){
	echo "\t<section id=\"" . $gallery . "\" class=\"galleryList row\">\n\t\t<div class=\"small-12 columns\"><header><h3 class=\"subheader\">" . $gallery . "</h3></header>
	\n";
	echo "\t\t\t<ul class=\"small-block-grid-3\">";
	
	// Get the list of albums in each gallery found
	$dirArray = $this->model->getAlbumList($gallery);
	
	foreach($dirArray as $directory){
		$imageThumbnail = $this->image->getThumbnail(GALLERY_ROOT . $gallery ."/" . $directory, 0, $galleryListImageWidth, $galleryListImageHeight);
        $imageLink = "index.php?g=" . base64_encode($gallery ."/" . $directory) . "&t=" . base64_encode($directory);
        
        // this should be from the gallery model, not model model.
        // $galleryDescription = $this->model->getDescription(GALLERY_ROOT . $gallery ."/" . $directory);
        
		echo "<li><div class=\"panel radius text-center\"><a href=\"" . $imageLink . "\" class=\"th\"><img src=\"" . $imageThumbnail . "\" alt=\"\" class=\"text-center\" /></a><h5 class=\"subheader\"><a href=\"" . $imageLink . "\">$directory</a></h5>" /*. $galleryDescription*/ . "</div></li>\n";
	};

	echo "\t\t</ul></section>\n\t";
	}
?>
