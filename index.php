<?php
	// Include globals
	// Show all errors
	error_reporting(E_ALL);
	$galleryURI = null;
	$galleryRoot = 'images/gallery';
	$galleryFeature = $galleryRoot . '/' . '2012/Kidstock 2012';

	if(!empty($_GET['g'])){
		$gallery = $_GET['g'];
		$galleryDir = dirname(__FILE__) . '/' . $galleryRoot . '/' . base64_decode($gallery);

		if(!empty($_GET['t'])){
			$galleryTitle = base64_decode($_GET['t']);
		} else {
			$galleryTitle = '';
		}
	} else {
		$gallery = null;
		$galleryDir = null;
		$galleryTitle = 'Gallery Listing';
	}

	// Include functions
	include('./models/functions.php');
	
	// Include the header..
	include('./views/header.php');

?>

      <div class="container">
         <?php
            if($gallery == null){
				//include('views/carousel.php');
				include('./views/list.php');
            } else {
               echo '<div id="gallery" class="go-shadow"></div>';
            }
         ?>
		</div>

<?php
	// Include the footer
	include('./views/footer.php');
?>
