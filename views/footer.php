      <script type="text/javascript">
         //<![CDATA[
         <?php 
            if($gallery != null){
               getImages($gallery, $galleryDir);
               
               echo "\n\tGalleria.loadTheme('scripts/galleria/themes/classic/galleria.classic.min.js');";
               echo "\n\tGalleria.run('#gallery', {\n\t\tdataSource:imageData,\n\t\t'height':0.70,\n\t\t//'imageCrop':'height',\n\t\t'imageMargin':13,\n\t\t'responsive':true,\n\t\t'imagePan':true,\n\t\t'transition':'fade',\n\t\t'autoplay':5000,\n\t\t'thumbquality':false\n\t});\n";
            } else {
				echo "slides:[\n\t\t/* no photos on the index. This is a directory listing. */\n\t]\n";
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
