<?php include('./includes/header.php') ?>


  <section id="about_page">
        <div class="item">
            <div class="title">
                <h1>
                   <?php echo $page->page_title ?>
                </h1>
            </div>

            <?php
                foreach ($page->musics as $m){
                    echo '
                     <div class="music_item">
                        <div class="music_sec">
                            <div class="m_desc">
                                <p>
                                     '.$m->body .'
                                </p>
                            </div>
                            <div class="m_photo" style="background-image:url('.$m->music_img->url.')"></div>
                        </div>
                            '.$m->link.'
                      </div>
                    ';
                }
            ?>

        </div>

  </section>






<?php include('./includes/footer.php') ?>