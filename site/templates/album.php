<?php namespace ProcessWire;?> 
<?php include('./includes/header.php') ?>


<?php
$items = array();

foreach( $page->parent->event_albums[$page->album_order]->images as $img){ array_push($items,$img); }
foreach( $page->parent->event_albums[$page->album_order]->videos_links as $video){array_push($items,$video);}
shuffle($items);
?>




<section id="about_page">
        <div class="item">
            <div class="title">
                <h1>
                   <?php echo $page->album_name ?>
                </h1>
            </div>
        </div>
        <div class="event_gall_list">
            <div class="popup-gallery">

            <?php 
            
            foreach($items as $item){
                item($item);
            };
            
            ?>
    
            </div>
        </div>
    </section>


    <?php include('./includes/footer.php') ?>