<?php
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
?>