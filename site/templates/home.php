<?php include('./includes/header.php') ?>
<?php $url =$pages->get('template=home_ajax')->httpUrl ?>
<?php $cur_url =$pages->get('template=currency')->httpUrl ?>

<?php session_start(); ?>

 <div id="full_page">
     <section class="qwerty" id="home_sld">


         <div id="owl-demo" class="owl-carousel owl-theme owl-carousel-default owl-carousel-class-light">

             <?php
             foreach($page->images as $image) {

                 echo
                     "<div class='item'>
                <div class='slider-img' style="."background-image:url('$image->url')"."> </div>
               
                </div>";
             }
             ?>

         </div>
         <div class="bottom_footer hidden-xs">
             <div class="soc_ul">
                 <ul>
                     <?php

                     foreach( $pages->get('template=footer')->socials as  $social){

                         echo "<li> <a href='{$social->link}'>  <i class='fa fa-{$social->icon}'></i> </a></li>";
                     }
                     ?>

                 </ul>
             </div>

             <form style="display:none" id="cur_form" action="<?php echo $pages->get('template=currency')->httpUrl ?>" method="GET"> -->
                 <input id='cur' name="rate" type="text">

             </form>


                 <div class="right_panel">
                   <div class="valute">
                     <ul>
                         <?php  $c = "AZN";  if(isset($_COOKIE['curency_name'])){  $c = $_COOKIE['curency_name']; } ?>

                         <?php
                         foreach($page->currencies as $item){
                             if($item->currency != $c){

                                 echo '  <li class="cur" data-name="'.strtoupper($item->currency).'" >   <a href="" >'. strtoupper($item->currency) .'</a>  </li>';

                             }
                         }
                         ?>
                     </ul>

                     <span id="cur_span">
                    <?php   if(!isset($_COOKIE['curency_name']))echo "AZN" ?>
                    <?php   if(isset($_COOKIE['curency_name']))echo $_COOKIE['curency_name'] ?>
                    </span>
                 </div>


                 <div class="lang">
                     <ul>
                         <?php foreach($languages as $language) : ?>
                             <?php if($language->title !=  $user->language->title) :?>
                                 <li><a href="<?=$page->localUrl($language)?>"><?=  strtoupper($language->title) ?></a></li>
                             <?php endif ;?>
                         <?php endforeach;?>
                     </ul>
                     <span> <?php echo $user->language->title;?></span>
                 </div>



             </div>
         </div>
     </section>
     <section class="qwerty" id="menu_sec" style="background-image:url('<?php echo $page->menu_back_img->url;?>')">
         <div class="item">
             <div class="title">
                 <h1><?php echo $page->menu_title ?></h1>
             </div>


             <div class="menu_control">
                 <ul>
                     <?php


                     $m = array();

                     foreach($pages->get("template='menus'")->menus as$k => $menu){
                         if($menu->on_home_page == 1) {


                             array_push($m,$menu);
                             echo ' <li class="home_menu" data-id = '.$k.'>  <a href="">'.$menu->menu_name.'</a>   </li> ';

                         }

                     }


                     ?>


                 </ul>
             </div>




             <div class="menu_list">


                 <?php
                 foreach($m[0]->menu as $x){

                     echo '
                                
                                
                                <ul class="hidden-xs">
                                <li>'. $x->sub_menu_name.'</li>
                              
                           ';


                     foreach($x->sub_menu as $z){
                         echo '
                                    

                                    <li>'.$z->name_of_food_or_drink.'</li>
        
                                    
                                    ';
                     }
                     echo ' </ul>';

                 }

                 ?>


             </div>
             <div class="see_all">
                 <a href="<?php echo $pages->get('template="menus"')->httpUrl ?>"><?php echo  $page->menu_button ?></a>
             </div>



             <script src="https://code.jquery.com/jquery-3.3.1.slim.js"  integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="  crossorigin="anonymous"></script>

             <script>
                 $(".home_menu").click(function(event) {

                     event.preventDefault();
                     var a = $(this).data("id");


                     $.ajax({
                         type: 'GET',
                         url: `<?php echo $url ?>?id=${a}`,


                     })
                         .done(function(response) {
                             $('.menu_list').html(response)

                         }).fail(function(data) {
                         console.log('fail')
                     });

                 });


                 $(document).ready(function() {

                     $(".cur").click(function(event) {


                         event.preventDefault();
                         var a = $(this).data("name");
                         $.ajax({
                             type: 'GET',
                             url: `https://free.currencyconverterapi.com/api/v6/convert?q=AZN_${a}&compact=y`,
                         })
                             .done(function(response) {

                                 $.ajax({
                                     type: 'GET',
                                     url: `<?php echo $cur_url ?>?rate=${response[`AZN_${a}`].val + " " + a}`,
                                 }).done(function(){

                                     $('#cur_span').text(a);
                                     location.reload()


                                 })




                             }).fail(function(data) {
                             console.log('fail')
                         });
                     });
                 })

































             </script>
         </div>
     </section>
     <section class="book_services qwerty" style="background-image:url('<?php echo $page->book_a_table_back_image->url;?>')">
         <div class="item">

             <?php 	foreach($languages as $language) {
                 // if this page is not viewable in the language, skip it
                 if(!$page->viewable($language)) continue;
                 // get the http URL for this page in the given language
                 $url = $page->localHttpUrl($language);
                 // hreflang code for language uses language name from homepage
                 $hreflang = $homepage->getLanguageValue($language, 'name');
                 // output the <link> tag: note that this assumes your language names are the same as required by hreflang.
                 echo "\n\t<link rel='alternate' hreflang='$hreflang' href='$url' />";
             } ?>

             <div class="title">
                 <h1><?php  echo $page->book_a_table_title ?></h1>
             </div>
             <div class="desc">
                 <?php echo $page->book_a_table_desc ?>

             </div>
             <div class="book_now">
                 <a href="<?php echo $pages->get('template="events"')->httpUrl ?>"><?php echo $page->book_a_table_button ?></a>
             </div>
         </div>
     </section>
     <section class="book_services qwerty left_" style="background-image:url('<?php echo $page->services_back_img->url;?>')">
         <div class="item left">
             <div class="title">
                 <h1><?php echo $page->services_title ?></h1>
             </div>
             <div class="desc">
                 <?php echo $page->services_desc ?>

             </div>
             <div class="book_now">
                 <a href="<?php echo $pages->get('template="service"')->httpUrl ?>"><?php echo $page->services_button ?></a>
             </div>
         </div>
     </section>
 </div>

<?php include('./includes/footer.php'); ?>

<script src="<?php echo $root;?>/js/plugin/one_page_scroll.js"></script>

<script>

    $("#full_page").onepage_scroll({
        sectionContainer: ".qwerty",     // sectionContainer accepts any kind of selector in case you don't want to use section
        easing: "ease",                  // Easing options accepts the CSS3 easing animation such "ease", "linear", "ease-in",
                                         // "ease-out", "ease-in-out", or even cubic bezier value such as "cubic-bezier(0.175, 0.885, 0.420, 1.310)"
        animationTime: 1200,             // AnimationTime let you define how long each section takes to animate
        pagination: false,                // You can either show or hide the pagination. Toggle true for show, false for hide.
        updateURL: false,                // Toggle this true if you want the URL to be updated automatically when the user scroll to each page.
        // This option accepts a callback function. The function will be called before the page moves.
        // This option accepts a callback function. The function will be called after the page moves.
        loop: true,                     // You can have the page loop back to the top/bottom when the user navigates at up/down on the first/last page.
        keyboard: true,                  // You can activate the keyboard controls
        responsiveFallback: false,        // You can fallback to normal page scroll by defining the width of the browser in which
        // you want the responsive fallback to be triggered. For example, set this to 600 and whenever
        // the browser's width is less than 600, the fallback will kick in.
        direction: "vertical"            // You can now define the direction of the One Page Scroll animation. Options available are "vertical" and "horizontal". The default value is "vertical".
    });











</script>



