<?php
class Image{
	/*
	public $title; // name -extension
	public $path; // full unc path or url?
	public $description; // from EXIF
	public $icon; // generated via imageMagik, GD or something.
	
	public function __construct($title, $path, $description, $icon){
		$this->title = $title;
		$this->path = $path;
		$this->description = $description;
		$this->icon = $icon;
	}
	*/
	
	public static function getThumbnail($directory, $imageID = 0, $thumbWidth, $thumbHeight){
		// Reference: http://stackoverflow.com/questions/7393319/resize-images-with-php
		$imageArray = model::getImages($directory);
		$originalFile = $directory . "/" . $imageArray[$imageID];
		$basename = pathinfo($originalFile, PATHINFO_FILENAME);
		$newFilename = sprintf("%s_%sx%s.jpg", $basename, $thumbWidth, $thumbHeight);
		
		if(file_exists(THUMBNAIL_ROOT . "/" . $newFilename)){
			return THUMBNAIL_ROOT . "/" . $newFilename;
		} else {
			list($width_orig, $height_orig, $image_type) = @getimagesize($originalFile);
			$img = FALSE;
			
			// Get the image and create a thumbnail
			switch($image_type){
				case 1:
					$img = @imagecreatefromgif($originalFile);
					break;
				case 2:
					$img = @imagecreatefromjpeg($originalFile);
					break;
				case 3:
					$img = @imagecreatefrompng($originalFile);
					break;
			}
			
			if(!$img){
				echo "ERROR: Could not create image handle from path.";
			}
			
			// Build the thumbnail
			if($width_orig > $height_orig){
				$width_ratio = $thumbWidth / $width_orig;
				$new_width   = $thumbWidth;
				$new_height  = $height_orig * $width_ratio;
			} else {
				$height_ratio = $thumbHeight / $height_orig;
				$new_width    = $width_orig * $height_ratio;
				$new_height   = $thumbHeight;
			}
			
			$new_img = @imagecreatetruecolor($new_width, $new_height);
			
			// Fill the image black
			if(!@imagefilledrectangle($new_img, 0, 0, $new_width, $new_height, 0)){
				echo "ERROR: Could not fill new image";
			}
			
			if(!@imagecopyresampled($new_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig)){
				echo "ERROR: Could not resize old image onto new bg.";
			}
			
			// Use a output buffering to load the image into a variable
			ob_start();
			imagejpeg($new_img, NULL, 69);
			$image_contents = ob_get_contents();
			ob_end_clean();
			
			// lastly (for the example) we are writing the string to a file
			$fh = fopen(BASE_PATH . "/" . THUMBNAIL_ROOT . "/" . $newFilename, "a+");
			
			fwrite($fh, $image_contents);
			fclose($fh);
			
			return BASE_URL . "/" . THUMBNAIL_ROOT . "/" . $newFilename;
		}
	}
}
?>