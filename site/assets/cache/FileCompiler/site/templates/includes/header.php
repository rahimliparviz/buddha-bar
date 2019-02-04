<?php $cur_url =$pages->get('template=currency')->httpUrl ?>
<?php $cur_url =$pages->get('template=currency')->httpUrl ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVU248sCN9yhtcGBRs3h0_n3GHc_WA_Wb8WV6iFXQj2JUQQxot"/>
    <meta property="og:title" content="<?php echo $page->title ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo $page->url?>" />
    <meta property="og:description" content="Inside the glamorous JW Marriot Absheron Hotel Baku, brought to you by Saffron Restaurant Group – known for its thematic, sophisticated establishments – step away from the city frenzy and immerse yourself in the magical atmosphere of Buddha-Bar Baku.">

    <meta property="og:image" content="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVU248sCN9yhtcGBRs3h0_n3GHc_WA_Wb8WV6iFXQj2JUQQxot" />
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="620">




    <title><?php echo $page->title?></title>
    <link rel="stylesheet" href="<?php echo $root?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $root;?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $root;?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $root;?>css/popup.css">
    <link rel="stylesheet" href="<?php echo $root;?>css/datetime.css">


    <?php if($page->id == 1){echo  '<link rel="stylesheet" href="'.$root.'css/one_page_scroll.css">'; } ?>

    <link rel="stylesheet" href="<?php echo $root;?>css/style.css">


    <style>

        .gall_list .popup-gallery .top > a {
            width: calc(67% - 12px); }

        #gallery_sld .owl-nav, .owl-dots {
            display: block !important;
    </style>
</head>


<body   class=" <?php echo $page->page_class ?>"    style="background-image:url('<?php
if($page->template == "album"){
    echo $page->album_back_img ;
}else{
    echo $page->page_background_img->url ;
}

?>')"  >



<?php if($page->background_img) echo "<img width='50' height='50' src='{$page->background_img->url}'>"; ?>


<header <?php  if( $page->id != 1) echo 'class="inner_header"' ?>>
    <div class="burger">
        <?xml version="1.0" encoding="UTF-8"?>
        <svg width="50px" height="30px" viewBox="0 0 60 32" version="1.1" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink">
            <!-- Generator: Sketch 49.3 (51167) - http://www.bohemiancoding.com/sketch -->
            <defs></defs>
            <g id="desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="1-main-page-" transform="translate(-42.000000, -66.000000)" fill="#9C7833">
                    <g id="Group" transform="translate(42.000000, 66.000000)">
                        <rect id="Rectangle-3" x="0" y="0" width="60" height="2"></rect>
                        <rect id="Rectangle-3-Copy" x="0" y="15" width="60" height="2"></rect>
                        <rect id="Rectangle-3-Copy-2" x="0" y="30" width="60" height="2"></rect>
                    </g>
                </g>
            </g>
        </svg>
    </div>

    <?php

    if( $page->id != 1)
        echo '<div class="logo">
<a href="'.$pages->get("template='home'")->url.'">
    <img src="'.$root.'image/logo/Слой 0.png" alt="">
</a>
</div>'
    ?>



    <div class="reserv_link hidden-xs">
        <a href="<?php echo $pages->get("template='reservation'")->url ?>">
            RESERVATION
        </a>
    </div>
</header>
<section id="left_menu">
    <div class="item">
        <div class="close_menu">
            <?xml version="1.0" encoding="UTF-8"?>
            <svg width="32px" height="32px" viewBox="0 0 44 44" version="1.1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink">
                <!-- Generator: Sketch 49.3 (51167) - http://www.bohemiancoding.com/sketch -->
                <defs></defs>
                <g id="desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="4-burger-menu" transform="translate(-42.000000, -60.000000)" fill="#9C7833">
                        <g id="Group-4" transform="translate(42.000000, 60.000000)">
                            <rect id="Rectangle-3-Copy-4" transform="translate(22.000000, 22.000000) rotate(-45.000000) translate(-22.000000, -22.000000) "
                                  x="-8" y="21" width="60" height="2"></rect>
                            <rect id="Rectangle-3-Copy-4" transform="translate(22.000000, 22.000000) rotate(-315.000000) translate(-22.000000, -22.000000) "
                                  x="-8" y="21" width="60" height="2"></rect>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
        <!-- <div class="reserv_link hidden-xs">
                <a href="<?php echo $pages->get("template='reservation'")->url ?>">
                    RESERVATION
                </a>
            </div> -->
        <div class="menu">


            <!-- top navigation -->
            <ul class='topnav' role='navigation'><?php

                foreach($homepage->children as $item) {

                    echo " <li> <a href='$item->url'>$item->title</a></li> </li>";
                }


                ?></ul>



            <div class="reserv_link visible-xs">
                <a href="<?php echo $pages->get("template='reservation'")->url ?>">
                    RESERVATION
                </a>
            </div>
            <!-- <div class="bot_panel visible-xs"> -->
            <div class="bot_panel">
                
                <div class="valute_">

                       <span id="cur_span">
                    <?php   if(!isset($_COOKIE['curency_name']))echo "AZN" ?>
                    <?php   if(isset($_COOKIE['curency_name']))echo $_COOKIE['curency_name'] ?>
                    </span>
                    <ul>
                        <?php  $c = "AZN";  if(isset($_COOKIE['curency_name'])){  $c = $_COOKIE['curency_name']; } ?>

                        <?php
                        foreach($pages->get("template='home'")->currencies as $item){
                            if($item->currency != $c){

                                echo '  <li class="cur" data-name="'.strtoupper($item->currency).'" >   <a href="" >'. strtoupper($item->currency) .'</a>  </li>';

                            }
                        }
                        ?>
                    </ul>


                </div>






                <div class="lang_">

                    <span> <?php echo $user->language->title;?></span>


                    <ul>
                        <?php foreach($languages as $language) : ?>
                            <?php if($language->title !=  $user->language->title) :?>
                                <li><a href="<?=$page->localUrl($language)?>"><?=  strtoupper($language->title) ?></a></li>
                            <?php endif ;?>
                        <?php endforeach;?>
                    </ul>

                </div>







            </div>
        </div>
    </div>
    <!-- <div class="overlay"></div> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.js"  integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="  crossorigin="anonymous"></script>
    <script>
        $(".cur").click(function(event) {event.preventDefault();var a = $(this).data("name");
            $.ajax({
                type: 'GET',
                url: `https://free.currencyconverterapi.com/api/v6/convert?q=AZN_${a}&compact=y`,
            })
                .done(function(response) {
                    $.ajax({
                        type: 'GET',
                        url: `<?php echo $cur_url ?>?rate=${response[`AZN_${a}`].val + " " + a}`,
                    }).done(function() {
                        $('#cur_span').text(a);
                        location.reload()
                    })
                }).fail(function(data) {
                console.log('fail')
            });
        });
    </script>

</section>