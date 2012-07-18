<div class="container">
	<div id="gallery">
	<?php
		$galleryArray = $this->model->getGalleryList();
		foreach($galleryArray as $gallery){
			echo "<h2>" . $gallery . "</h2>\n<ul>";

			$dirArray = $this->model->getAlbumList($gallery);
			foreach($dirArray as $directory){
				echo "<li><a href=\"index.php?g=" . base64_encode($gallery ."/" . $directory) . "&t=" . base64_encode($directory) . "\">$directory</a></li>\n";
			};

			echo "</ul>";
		}
	?>
	</div>
</div>