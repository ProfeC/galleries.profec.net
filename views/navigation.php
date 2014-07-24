<?php
    // Get the list of galleries
    //$galleryArray = $this->model->getGalleryList();
?>

<div class="contain-to-grid sticky">
    <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name">
            <h1><a href="#">Choose a Year</a></h1>
            </li>
            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
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