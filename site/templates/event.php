
<?php include('./includes/header.php') ?> 





<section id="event_sec">
        <div class="item">
            <div class="title">
                <h1>
                   <?php echo $page->event_name ?>
                </h1>
            </div>
            <div class="date">
                <span>
                <?php echo  $page->event_date . ', '. $page->start_time . ' - '. $page->end_time ?>
                </span>
            </div>
            <div class="photo" style="background-image:url('<?php echo $page->page_img->url ?>')"></div>
            <div class="desc">
            <?php echo $page->body ?>
            </div>
            <div class="album">
                <div class="title">
                    <h1>Albums</h1>
                </div>
                <div class="album_list">


            <?php

                for($i=0;$i<count($page->event_albums);$i++){

                    if($page->event_albums[$i] && count($page->children) == $i){
                        $p = new Page();
                        $p->setOutputFormatting(false);
                        $p->template = 'album';
                        $p->page_class= 'drakon';
                        $p->parent = $page;
                        $p->album_order = $i;
                        $p->album_back_img= $page->event_albums[$i]->page_background_img->url;
                        $p->album_name = $page->event_albums[$i]->album_name;
                        $p->title = $page->event_albums[$i]->page_title;
                  
                        $p->save();
                     }

                }


                 foreach($page->children as $key=> $e){

                echo '<div class="items">
                <a href="'.$e->url.'">
                    <div class="photo_" style='.'background-image:url('.''. $page->event_albums[$key]->cover_img->url .''.')'.'></div>
                    <div class="desc">
                        <span>'.$e->album_name.'</span>
                    </div>
                </a>
                </div>';
            }

                ?>
                </div>
            </div>
        </div>

    </section>

    <?php include('./includes/footer.php') ?>