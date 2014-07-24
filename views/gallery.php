<div class="row">
    <div class="small-12 columns">
        <?php
            $galleryDescription = $this->model->getDescription($galleryDir); // this should be from the gallery model, not model model.
            if($galleryDescription != ''){
                echo "<div class=\"panel radius\">\n\t" . $galleryDescription . "\n</div>";
            }
        ?>
        <ul id="free-wall" class="clearing-thumbs" data-clearing>
        <!-- <div class="clearing-thumbs" data-clearing> -->
            <?php
                $filesArray = $this->model->getImages($galleryDir);
                $fileCount = count($filesArray);
                
                for($i=0; $i<sizeof($filesArray); $i++){
                    $imagePath = BASE_PATH . "/" . GALLERY_ROOT . base64_decode($gallery) . "/" . $filesArray[$i];
                    $imageURL = GALLERY_ROOT . base64_decode($gallery) . "/" . $filesArray[$i];
                    $imageThumb = $this->image->getThumbnail(BASE_PATH . "/" . GALLERY_ROOT . base64_decode($gallery), $i, 250, 250);
                    $imageExif = exif_read_data($imagePath, 'ANY_TAG', true);
                    $imageTitle = $imageExif['FILE']['FileName'];
                    $imageDescription = $imageExif['EXIF']['ExposureTime'] . 's @ ' .$imageExif['COMPUTED']['ApertureFNumber'] . ' on ISO ' . $imageExif['EXIF']['ISOSpeedRatings']; 
                    // TODO: Check to see if there are values for these keys and display them if they are not empty.
                    
                    if($imageExif['COMPUTED']['Height'] > 1000){
                        $brickType = 'size42';
                    } else {
                        $brickType = 'size44';
                    }
            
                    echo "<li class=\"brick\"><a href=\"$imageURL\"><image class=\"$brickType\" src=\"$imageThumb\" alt=\"$imageTitle\" data-caption=\"$imageDescription\" /></a></li>";
                    // echo "<div " . $brickType . "><a href=\"#\" class=\"th\" data-reveal-id=\"gallery-image-" . $i . "\"><image src=\"$imageThumb\" alt=\"$imageTitle\" data-caption=\"$imageDescription\" /></a></div>";
                      
                    if($fileCount > 1){
                        echo "\n";
                        $fileCount--;
                    } else {
                        echo "\n\n";
                    }
                }
            ?>
        
            <!-- <?php
                // $filesArray = $this->model->getImages($galleryDir);
    //             $fileCount = count($filesArray);
    //
    //             for($i=0; $i<sizeof($filesArray); $i++){
    //                 $imageURL = GALLERY_ROOT . base64_decode($gallery) . "/" . $filesArray[$i];
    //                 $imageExif = exif_read_data($imagePath, 'ANY_TAG', true);
    //                 $imageTitle = $imageExif['FILE']['FileName'];
    //                 $imageDescription = $imageExif['EXIF']['ExposureTime'] . 's @ ' .$imageExif['COMPUTED']['ApertureFNumber'] . ' on ISO ' . $imageExif['EXIF']['ISOSpeedRatings'];
    //                 //print_r($imageExif);
    //                 echo "<div id=\"gallery-image-" . $i . "\" class=\"reveal-modal\" data-reveal>";
    //                 echo "<image class=\"text-center\" src=\"$imageURL\" alt=\"$imageTitle\" />";
    //                 echo "<p class=\"text-center\">$imageDescription</p>";
    //                 echo "<a class=\"close-reveal-modal\">&#215;</a>";
    //                 echo "</div>";
    //
    //                 if($fileCount > 1){
    //                     echo "\n";
    //                     $fileCount--;
    //                 } else {
    //                     echo "\n\n";
    //                 }
    //             }
            ?> -->
            
        <!-- </div> -->
        </ul>
    </div>
</div>