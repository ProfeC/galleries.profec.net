<div class="container">
	<div class="hero-unit">
		<div id="slideshow"></div>
	</div>
</div>

<!-- Add script for slideshow -->
<script type="text/javascript" src="scripts/agile-carousel/agile_carousel.alpha.js"></script>
<script type="text/javascript">
	<?php getSlideImages($galleryFeature); ?>
	
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
</script>