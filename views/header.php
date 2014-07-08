<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title><?php echo $this->model->getGalleryTitle(); ?> - Koert-Clark Photography</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/plain" rel="author" href="/humans.txt" />
        <link rel="stylesheet" href="css/app.css">
        <script src="https://www.google.com/jsapi?key=ABQIAAAAej7hXzR0rP7OpeEWXDbZwRSs398M-qenCUxXFsvB2vyWwj3LVhRwpiLOd8BN-S9sJfnM8ElmmEFGEg" type="text/javascript"></script>

        <script src="js/modernizr.min.js"></script>
    </head>
	<body>

      <!--[if lt IE 9]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

      <div id="siteTitle" class="contain-to-grid">
          <div class="row">
              <div class="small-12 columns">
                  <h1><a href="<?php echo $_SERVER['PHP_SELF'] ?>" title="Koert-Clark Photography">Koert-Clark Photography</a></h1>
              </div>
          </div>
      </div>
      <div id="siteNav">
          <div class="row">
              <div class="small-12 columns">
                  <?php //include('views/navigation.php'); ?>
              </div>
          </div>
      </div>
      <div id="pageTitle" class="contain-to-grid">
          <div class="row">
              <div class="small-12 columns">
                  <h2 class="subheader"><?php echo $this->model->getGalleryTitle(); ?></h2>
              </div>
          </div>
      </div>
      <div id="content">