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
            <div class="why_sec">
                <div class="title">
                    <h1>
                    <?php echo $page->why_choose_us ?>
                    </h1>
                </div>
                <div class="list">

                <?php foreach( $page->why_choose_us_list as $item) :?>

                    <div class="items">
                        <p><?php echo $item->why_choose_us ?></p>
                    </div>

                 <?php endforeach ; ?>

               
                   
                    
                </div>
            </div>
        </div>
    </section>

    <?php include('./includes/footer.php') ?>