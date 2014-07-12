<div id="galleryList">
<?php
// Get the list of galleries
$galleryArray = $this->model->getGalleryList();
foreach($galleryArray as $gallery){
	echo "\t<section class=\"row\">\n\t\t<div class=\"small-12 columns\" data-equalizer><header><h3 class=\"subheader\">" . $gallery . "</h3></header>
	\n";
	echo "\t\t\t<ul class=\"small-block-grid-3\">";
	
	// Get the list of albums in each gallery found
	$dirArray = $this->model->getAlbumList($gallery);
	
	foreach($dirArray as $directory){
		$imageThumbnail = $this->image->getThumbnail(GALLERY_ROOT . $gallery ."/" . $directory, 0, $galleryListImageWidth, $galleryListImageHeight);
        $imageLink = "index.php?g=" . base64_encode($gallery ."/" . $directory) . "&t=" . base64_encode($directory);
        
        // this should be from the gallery model, not model model.
        // $galleryDescription = $this->model->getDescription(GALLERY_ROOT . $gallery ."/" . $directory);
        
		echo "<li data-equalizer-watch><div class=\"panel radius text-center\"><a href=\"" . $imageLink . "\" class=\"th\"><img src=\"" . $imageThumbnail . "\" alt=\"\" class=\"text-center\" /></a><h4 class=\"subheader\"><a href=\"" . $imageLink . "\">$directory</a></h4>" /*. $galleryDescription*/ . "</div></li>\n";
	};

	echo "\t\t</ul></div>\n\t</section>";
	}
?>
</div>
