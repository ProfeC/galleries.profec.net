<?php
    // Get the list of galleries
    //$galleryArray = $this->model->getGalleryList();
?>

<div id="main-nav">
    <div class="row collapse">
        <div class="small-12 columns">
            <div class="contain-to-grid sticky">
                <nav class="top-bar" data-topbar>
                    <ul class="title-area">
                        <li class="name">
                        <h1><a href="#">Choose a Year</a></h1>
                        </li>
                        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                    </ul>

                    <section class="top-bar-section">
                        <ul class="left">
                        <?php
                            foreach($galleryArray as $gallery){
                                echo "<li><a href=\"index.php#" . $gallery . "\">" . $gallery . "</a></li>";
                            }
                        ?>
                        </ul>
                    </section>
                </nav>
            </div>
        </div>
    </div>
</div>
