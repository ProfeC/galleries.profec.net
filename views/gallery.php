<div class="row">
    <div id="gallery" class="small-12 columns">
        <?php
            $galleryDescription = $this->model->getDescription($galleryDir); // this should be from the gallery model, not model model.
            if($galleryDescription != ''){
                echo "<div class=\"panel radius\">\n\t" . $galleryDescription . "\n</div>";
            }
        ?>
        <!-- <ul class="small-block-grid-5 clearing-thumbs" data-clearing> -->
            <?php
                $filesArray = $this->model->getImages($galleryDir);
                $fileCount = count($filesArray);
                
                for($i=0; $i<sizeof($filesArray); $i++){
                    $imagePath = BASE_PATH . "/" . GALLERY_ROOT . base64_decode($gallery) . "/" . $filesArray[$i];
                    $imageURL = GALLERY_ROOT . base64_decode($gallery) . "/" . $filesArray[$i];
                    // $imageURL = $this->image->getThumbnail(BASE_PATH . "/" . GALLERY_ROOT . base64_decode($gallery), $i, 250, 250);
                    $imageExif = exif_read_data($imagePath, 'ANY_TAG', true);
                    $imageTitle = $imageExif['FILE']['FileName'];
                    $imageDescription = $imageExif['EXIF']['ExposureTime'] . 's @ ' .$imageExif['COMPUTED']['ApertureFNumber'] . ' on ISO ' . $imageExif['EXIF']['ISOSpeedRatings']; // TODO: Check to see if there are values for these keys and display them if they are not empty.
                    
                    if($imageExif['COMPUTED']['Height'] > 1000){
                        $brickType = "medium";
                    } else {
                        $brickType = "";
                    }
            
                    echo "<a href=\"$imageURL\"><image src=\"$imageURL\" alt=\"$imageTitle\" data-caption=\"$imageDescription\" /></a>";

                    //print_r($imageExif);
                      
                    if($fileCount > 1){
                        echo "\n";
                        $fileCount--;
                    } else {
                        echo "\n\n";
                    }
                }
            ?>
    </div>
</div>