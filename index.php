<?php
	include_once("controllers/controller.php");

	$controller = new Controller();
	$controller->invoke();
	
	if(!empty($_GET['g'])){
		$gallery = $_GET['g'];
		$galleryDir = dirname(__FILE__) . '/' . GALLERY_ROOT . '/' . base64_decode($gallery);
		
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
              include('./views/gallery.php');
            }
         ?>
		</div>

<?php
	// Include the footer
	include('./views/footer.php');
?>
