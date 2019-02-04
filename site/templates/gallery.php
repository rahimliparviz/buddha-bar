<?php namespace ProcessWire;?> 
<?php include('./includes/header.php') ?> 


<?php
$items = array();
foreach( $page->images as $img){ array_push($items,$img); }
foreach( $page->videos_links as $video){array_push($items,$video);}
shuffle($items);
?>


 <section id="about_page">
        <div class="item">
            <div class="title">
                <h1>
                <?php echo $page->title ?>
                </h1>
            </div>
        </div>
        <div class="gall_list">
            <div class="popup-gallery">
                 <div class="top">
                    <div class="flex_">
                    <?php item($items[0]) ?>
                    <?php item($items[1]) ?> 
                       
                    </div>
                    <?php item($items[2],true) ?>
                </div> 
                <?php item($items[3]) ?>
                <?php item($items[4]) ?>
                <?php item($items[5]) ?>
            </div>

 <div class="popup-gallery more_photos" style="display:none">

 <?php
    
    for($i=6;$i < count($items);$i++){
        item($items[$i]);
    }
 
 ?>
               
</div>
            <div class="more_photo text-center">
                <a href="" class="photo_btn">
                <?php echo $page->button ?>
                </a>
            </div>


        </div>
    </section>



<?php include('./includes/footer.php') ?>