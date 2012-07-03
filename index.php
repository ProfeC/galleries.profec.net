<?php
	// Show all errors
	//error_reporting(E_ALL);
	$galleryURI = null;
	
	if(!empty($_GET['g'])){
		$gallery = $_GET['g'];
		$galleryDir = dirname(__FILE__) . '/' . base64_decode($gallery);
		
		if(!empty($_GET['t'])){
			$galleryTitle = base64_decode($_GET['t']);
		} else {
			$galleryTitle = '';
		}
	} else {
		$gallery = null;
		$galleryDIR = null;
		$galleryTitle = 'Gallery Listing';
	}

	function getImageArray($thisGallery, $thisDir){
		$filesArray = array();
		$dir = opendir($thisDir);
		while (false !== ($file = readdir($dir))){
			$extension = strtolower(substr(strrchr($file, '.'), 1));
			if($extension == 'jpg'){
				$filesArray[] = $file;
			}
		}
		closedir($dir);

		return sort($filesArray); //, SORT_STRING
	}

	function getImages($thisGallery, $thisDir){
		$filesArray = array();
		$dir = opendir($thisDir);
		while (false !== ($file = readdir($dir))){
			$extension = strtolower(substr(strrchr($file, '.'), 1));
			if($extension == 'jpg'){
				$filesArray[] = $file;
			}
		}
		closedir($dir);

		sort($filesArray); //, SORT_STRING
		$fileCount = count($filesArray);
				
		echo "var imageData = [\n";
		for($i=0; $i<sizeof($filesArray); $i++){
			$image = base64_decode($thisGallery) . "/" .$filesArray[$i];
			$imageExif = exif_read_data($image, 'ANY_TAG', true);
			//print_r($imageExif);
         $imageTitle = $imageExif['FILE']['FileName'];
			$imageDescription = $imageExif['EXIF']['ExposureTime'] . 's @ ' .$imageExif['COMPUTED']['ApertureFNumber'] . ' on ISO ' . $imageExif['EXIF']['ISOSpeedRatings'];
			echo "\t\t{\"image\":\"$image\", \"title\":\"$imageTitle\", \"description\":\"$imageDescription\", \"link\":null}";
		
			if($fileCount > 1){
				echo ",\n";
				$fileCount--;
			} else {
				echo "\n\t\t\t\t\t\t]\n";
			}
		}		
	} // end getImages();

	function getSlideImages($thisDir){
		$filesArray = array();
		$dir = opendir(dirname(__FILE__) . '/' . $thisDir);
		while (false !== ($file = readdir($dir))){
			$extension = strtolower(substr(strrchr($file, '.'), 1));
			if($extension == 'jpg'){
				$filesArray[] = $file;
			}
		}
		closedir($dir);

		sort($filesArray, SORT_STRING);
		$fileCount = count($filesArray);
				
		echo "var slideImageData = [\n";
		for($i=0; $i<sizeof($filesArray); $i++){
			$image = $thisDir . "/" .$filesArray[$i];
			$imageExif = exif_read_data($image, 'ANY_TAG', true);
			//print_r($imageExif);
         $imageTitle = $imageExif['FILE']['FileName'];
			$imageDescription = $imageExif['EXIF']['ExposureTime'] . 's @ ' .$imageExif['COMPUTED']['ApertureFNumber'] . ' on ISO ' . $imageExif['EXIF']['ISOSpeedRatings'];
			// echo "\t\t{\"image\":\"$image\", \"title\":\"$imageTitle\", \"description\":\"$imageDescription\", \"link\":null}";
			echo "\t\t{\n\t\t\t'content':'<div class=\"slide_inner\"><img class=\"photo\" src=\"" . $image . "\" alt=\"" . $imageTitle . "\" /></div>'\n}";
		
			/*
			"content": "<div class='slide_inner'><a target='_blank' class='photo_link' href='#'><img class='photo' src='images/banner_bike.jpg' alt='Bike'></a><a target='_blank' class='caption' href='#'>Sample Carousel Pic Goes Here And The Best Part is that...</a></div>",
		    "content_button": "<div class='thumb'><img src='images/f2_thumb.jpg' alt='bike is nice'></div><p>Agile Carousel Place Holder</p>"
				*/
			if($fileCount > 1){
				echo ",\n";
				$fileCount--;
			} else {
				echo "\n\t\t\t\t\t\t];\n";
			}
		}		
	} // end getSlideImages();
	
	// From: http://webcache.googleusercontent.com/search?q=cache:wNFb4W-Sj_4J:www.codingforums.com/showthread.php%3Ft%3D71882+&cd=9&hl=en&ct=clnk&gl=us
	function getDirectory( $path = '.', $level = 0 ){ // Directories to ignore when listing output. Many hosts will deny PHP access to the cgi-bin.
	    $ignore = array( 'cgi-bin', '.', '..', '_' ); 
		$dirArray = array();
	    $dh = @opendir( $path ); // Open the directory to the handle $dh 
		
	    while( false !== ( $dir = readdir( $dh ) ) ){ // Loop through the directory
	        if( !in_array( $dir, $ignore ) ){ // Check that this directory is not to be ignored
	            if( is_dir( "$path/$dir" ) ){ // Its a directory, so we need to keep reading down... 
					$dirArray[] = $dir;
//	                echo "<li><a href=\"index.php?g=" . base64_encode($path . '/' . $dir) . "&t=" . base64_encode($dir) . "\">$dir</a></li>\n"; 
	            }
	        } 
	    }  
	    
	    closedir( $dh ); // Close the directory handle
		sort($dirArray); // Sort the directory array
		
		foreach ($dirArray as $directory){
			echo "<li><a href=\"index.php?g=" . base64_encode($path . '/' . $directory) . "&t=" . base64_encode($directory) . "\">$directory</a></li>\n"; 
		};
	}
	
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
   <head>
      <title><?php echo $galleryTitle; ?> - Koert-Clark Photography</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link type="text/plain" rel="author" href="http://profec.net/galleries/humans.txt" />
      <link rel="stylesheet" href="_css/bootstrap.css">
      <style>
         body {padding-top:100px; padding-bottom:40px}
      </style>
      <link rel="stylesheet" href="_css/bootstrap-responsive.css">
		<link rel="stylesheet" href="_js/agile-carousel/agile_carousel.css">
		<link rel="stylesheet" href="_css/style.css" media="screen" />
      <script src="https://www.google.com/jsapi?key=ABQIAAAAej7hXzR0rP7OpeEWXDbZwRSs398M-qenCUxXFsvB2vyWwj3LVhRwpiLOd8BN-S9sJfnM8ElmmEFGEg" type="text/javascript"></script>
      <script language="Javascript" type="text/javascript">
         //<![CDATA[
            google.load("jquery", "1");
            google.load("jqueryui", "1");
            google.load("webfont", "1");

            google.setOnLoadCallback(function(){
               WebFont.load({
                  google:{
                     //families:['Exo::latin']
					families:['Open Sans::latin']
                  }
               });
            });
         //]]>
      </script>

      <script src="_js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>
      <script type="text/javascript" src="_js/galleria/galleria-1.2.7.min.js"></script>
   </head>
	<body>

      <!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

      <div class="navbar navbar-fixed-top">
         <div class="navbar-inner">
            <div class="container">
               <h1 class="brand"><a href="/galleries/index.php" title="Koert-Clark Photography">Koert-Clark Photography</a></h1>
               <h2 id="galleryTitle" class="go-right"><?php echo $galleryTitle; ?></h2>
               <!--a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a-->
               <!--div class="nav-collapse">
                  <ul class="nav">
                     <li class="active"><a href="#">Home</a></li>
                     <li><a href="#xander">Xander</a></li>
                     <li><a href="#ada">Ada</a></li>
                     <li><a href="#meh">Everything Else</a></li>
                  </ul>
               </div--><!--/.nav-collapse -->
            </div>
         </div>
      </div>

      <div class="container">
         <?php
            if($gallery == null){
				/*echo '<div class="container">
			      <div class="hero-unit">
			        <div id="slideshow"></div>
			      </div>
				</div>
			    ';*/
				
				echo '<div id="gallery">';

					echo "<h3>2012</h3>\n<ul>\n";
					getDirectory('2012');
					echo "</ul>\n";
					
					echo "<h3>2011</h3>\n<ul>\n";
					getDirectory('2011');
					echo "</ul>\n";
					
					echo "<h3>2010</h3>\n<ul>\n";
					getDirectory('2010');
					echo "</ul>\n";
					
					echo "<h3>2009</h3>\n<ul>\n";
					getDirectory('2009');
					echo "</ul>\n";
					
					echo "<h3>2008</h3>\n<ul>\n";
					getDirectory('2008');
					echo "</ul>\n";

					echo "<h3>2007</h3>\n<ul>\n";
					getDirectory('2007');
					echo "</ul>\n";
					
					echo "<h3>2006</h3>\n<ul>\n";
					getDirectory('2006');
					echo "</ul>\n";
					
				// end gallery div
				echo '</div>';
				
				// Add script for slideshow
				echo '<script type="text/javascript" src="_js/agile-carousel/agile_carousel.alpha.js"></script>';
            } else {
               echo '<div id="gallery" class="go-shadow"></div>';
            }
         ?>
		</div>

      <script type="text/javascript">
         //<![CDATA[
         <?php 
            if($gallery != null){
               getImages($gallery, $galleryDir);
               
               echo "\n\tGalleria.loadTheme('_js/galleria/themes/classic/galleria.classic.min.js');";
               echo "\n\tGalleria.run('#gallery', {\n\t\tdataSource:imageData,\n\t\t'height':0.70,\n\t\t//'imageCrop':'height',\n\t\t'imageMargin':13,\n\t\t'responsive':true,\n\t\t'imagePan':true,\n\t\t'transition':'fade',\n\t\t'autoplay':5000,\n\t\t'thumbquality':false\n\t});\n";
            } else {
				echo "slides:[\n\t\t/* no photos on the index. This is a directory listing. */\n\t]\n";


				getSlideImages('2012/Kidstock 2012');
				
				echo'
				jQuery(document).ready(function () {
					jQuery("#slideshow").agile_carousel({
						carousel_data: slideImageData,
						carousel_outer_height: 250,
						carousel_height: 250,
						slide_height: 230,
						carousel_outer_width: 800,
						slide_width: 800,
						transition_type: "fade",
						timer: 5000
					});
				});
				';



            }
            ?>
         //]]>
         
      </script>

      <script src="_js/libs/bootstrap/bootstrap.min.js"></script>
      <script src="_js/plugins.js"></script>
      <script src="_js/script.js"></script>

		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-524508-1']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	</body>
</html>