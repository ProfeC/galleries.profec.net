<?php
	// Show all errors
	//error_reporting(E_ALL);
	$galleryURI = null;
	$galleryRoot = 'images';
	
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
	
	include('./models/functions.php');
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
      <link rel="stylesheet" href="css/bootstrap.css">
      <style>
         body {padding-top:100px; padding-bottom:40px}
      </style>
      <link rel="stylesheet" href="css/bootstrap-responsive.css">
		<link rel="stylesheet" href="scripts/agile-carousel/agile_carousel.css">
		<link rel="stylesheet" href="css/style.css" media="screen" />
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

      <script src="scripts/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>
      <script type="text/javascript" src="scripts/galleria/galleria-1.2.7.min.js"></script>
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
				include('views/carousel.php');
				include('views/list.php');
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
               
               echo "\n\tGalleria.loadTheme('scripts/galleria/themes/classic/galleria.classic.min.js');";
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

      <script src="scripts/libs/bootstrap/bootstrap.min.js"></script>
      <script src="scripts/plugins.js"></script>
      <script src="scripts/script.js"></script>

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