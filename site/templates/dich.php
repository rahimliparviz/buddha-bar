<?php include('./includes/header.php') ?>

  <section id="about_page">
        <div class="item">
            <div class="title">
                <h1>
                  
                <?php echo $page->title ?>
                </h1>
            </div>
            <div class="desc">
               
            <?php echo $page->body ?>
          
            </div>
        </div>
    </section>
    <div id="gallery_sld" class="owl-carousel owl-theme owl-carousel-default owl-carousel-class-light">
      
        <?php foreach( $page->images as $img) :?>

        <div class="items">
        <img  src="<?php echo $img->url ?>" alt="">
        </div>

        <?php endforeach ; ?>




    </div>







<?php include('./includes/footer.php') ?>