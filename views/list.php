<div class="container">
	<div id="gallery">
	<?php
	$galleryArray = $this->model->getGalleryList();
	foreach($galleryArray as $gallery){
		echo "\t<h2>" . $gallery . "</h2>
		<img src=\"xxx.jpg\" height=\"50\" weight=\"50\" alt=\"test\" />
		<ul>\n";

		$dirArray = $this->model->getAlbumList($gallery);
		foreach($dirArray as $directory){
			echo "\t\t\t<li><a href=\"index.php?g=" . base64_encode($gallery ."/" . $directory) . "&t=" . base64_encode($directory) . "\">$directory</a></li>\n";
		};

		echo "\t\t</ul>\n
	";
		}
	?>
	</div>
</div>