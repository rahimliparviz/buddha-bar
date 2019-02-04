<footer class="main_footer <?php  if( $page->id != 1) echo 'class="transparent"' ?> ">

        <div class="text">
            <h1>
                Follow us on social media
            </h1>
        </div>

        <div class="soc_ul">
            <ul>
            <?php
            foreach( $pages->get('template=footer')->socials as $social){

               echo "<li> <a href='{$social->link}'>  <i class='fa fa-{$social->icon}'></i> </a></li>";
            }   
           ?>
            </ul>
        </div>

        <div class="sharks">
            <a href="http://digitalsharks.az/" target="_blank">
                Created by <img src="<?php echo $config->urls->templates;?>/image/icons/shark.svg" alt=""> Digital Sharks
            </a>
        </div>
    </footer>
    <script src="<?php echo $root;?>/js/plugin/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="<?php echo $root;?>/js/plugin/bootstrap.min.js"></script>
    <script src="<?php echo $root;?>/js/plugin/owl.carousel.min.js"></script>
    <script src="<?php echo $root;?>/js/plugin/datetime.js"></script>




    <script src="<?php echo $root;?>/js/plugin/magnific_pop.js"></script>
    <script src="<?php echo $root;?>/js/currency.js"></script>
    <script src="<?php echo $root;?>/js/main.js"></script>
</body>

</html>