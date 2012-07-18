<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
   <head>
      <title><?php echo $this->model->getGalleryTitle(); ?> - Koert-Clark Photography</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link type="text/plain" rel="author" href="/humans.txt" />
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
               <h1 class="brand"><a href="<?php echo $_SERVER['PHP_SELF'] ?>" title="Koert-Clark Photography">Koert-Clark Photography</a></h1>
               <h2 id="galleryTitle" class="go-right"><?php echo $this->model->getGalleryTitle(); ?></h2>
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
