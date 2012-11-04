<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <title><?php echo $this->model->getGalleryTitle(); ?> - Koert-Clark Photography</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/plain" rel="author" href="/humans.txt" />
        <link rel="stylesheet" href="stylesheets/foundation.min.css">
        <link rel="stylesheet" href="stylesheets/app.css">
        <script src="https://www.google.com/jsapi?key=ABQIAAAAej7hXzR0rP7OpeEWXDbZwRSs398M-qenCUxXFsvB2vyWwj3LVhRwpiLOd8BN-S9sJfnM8ElmmEFGEg" type="text/javascript"></script>

        <script src="javascripts/foundation/modernizr.foundation.js"></script>

        <!-- IE Fix for HTML5 Tags -->
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
	<body>

      <!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

      <div id="siteTitle" class="contain-to-grid">
          <div class="row">
              <div class="twelve columns">
                  <h1><a href="<?php echo $_SERVER['PHP_SELF'] ?>" title="Koert-Clark Photography">Koert-Clark Photography</a></h1>
              </div>
          </div>
      </div>
      <div id="siteNav">
          <div class="row">
              <div class="twelve columns">
                  <?php //include('views/navigation.php'); ?>
              </div>
          </div>
      </div>
      <div id="pageTitle" class="contain-to-grid">
          <div class="row">
              <div class="twelve columns">
                  <h2 class="subheader"><?php echo $this->model->getGalleryTitle(); ?></h2>
              </div>
          </div>
      </div>
      <div id="content">