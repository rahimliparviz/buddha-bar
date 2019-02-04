<?php include('./includes/header.php') ?>

<section id="about_page">
        <div class="item">
            <div class="title">
                <h1>
                   <?php echo $page->page_title ?>
                </h1>
            </div>

  <div class="content">
            <?php
            
foreach($page->children("template=event") as $key=> $e){


    if($key % 2 == 0){

        echo ' <div class="ev_item">
        <div class="desc_">
            <h4>'. $e->event_name . ' </h4>
            '. $e->body .'
            <span>
            '. $e->event_date . ', '. $e->start_time . ' - '. $e->end_time . '
            </span>
        </div>
        <div class="photo_">
            <div class="info">
                <div class="name">
                    <p>'. $e->event_name . '</p>
                </div>
                <div class="date">
                    <p>'. $e->event_date . '</p>
                </div>
                <div class="time">
                    <p>'. $e->start_time . ' - '. $e->end_time . '</p>
                </div>
            </div>

            <a href="'.$e->url.'">  <div class="bg" style='.'background-image:url('.''. $e->page_img->url .''.')'.'></div></a>
          
        </div>
    </div>';
    }else{

        echo '
        <div class="border_ visible-xs"></div>
                <div class="ev_item left">
                <div class="photo_">
                <div class="info">
                    <div class="name">
                        <p>'. $e->event_name . '</p>
                    </div>
                    <div class="date">
                        <p>'. $e->event_date . '</p>
                    </div>
                    <div class="time">
                        <p>'. $e->start_time . ' - '. $e->end_time . '</p>
                    </div>
                </div>
                <a href="'.$e->url.'">  <div class="bg" style='.'background-image:url('.''. $e->page_img->url .''.')'.'></div></a>

            </div>
                            <div class="desc_">
                            <h4>'. $e->event_name . ' </h4>
                            '. $e->body .'
                            <span>
                            '. $e->event_date . ', '. $e->start_time . ' - '. $e->end_time . '
                            </span>
                        </div>
                  
                </div>
        
        ';
    }

} 
            ?>
        
        </div>
    </section>
<?php 


?>


    

    <?php include('./includes/footer.php') ?>