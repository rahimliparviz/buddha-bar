<?php include('./includes/header.php') ?>
<?php $url =$pages->get('template=ajax')->httpUrl ?>
<?php
// Start the session
session_start();
?>



 <section  id="menu_page">
        <div class="title">
            <h1><?php echo $page->page_title ?></h1>
        </div>
        <div class="content">


          
        <input id="id" name="id"  type="hidden">
            <div id="menu_sld" class="owl-carousel">    
                <?php           
                    foreach($page->menus as $k=>$menu){
                        $active = "";
                        if($k == 0){$active ='active_' ;}else{ $active = "";}

                        echo    '<div>
                                    <div data-id="'.$k.'" class="menu_item '.$active.'">'.$menu->menu_name.'</div>
                                </div>
                                ';    
                    }

                ?> 
            </div>



  

            <div class="menu_list">
  

                    <?php  
                        foreach($pages->get('template=menus')->menus[0]->menu as $x){

                                echo '
                                
                                
                                <div class="item">
                                <ul>
                                    <li>
                                        <div class="flex_">
                                            <div class="name">'. $x->sub_menu_name.'</div>
                                        </div>
            
                                    </li>
                                </ul>
                                <ul>';


                                foreach($x->sub_menu as $z){
                                   
                                        $price;
                                        $currency;
                                        if(isset($_COOKIE['curency']))
                                        {
                                            $price = round($_COOKIE[$_COOKIE['curency_name']] * $z->price,1);
                                            $currency = $_COOKIE["curency_name"];
                                        ;}else{
                                            $price = $z->price;
                                            $currency = "AZN";
                                        }


                                    echo '
                                    
                                    <li>
            
                                    <div class="flex_">
                                        <div class="name">'.$z->name_of_food_or_drink.'</div>
                                        <div class="dots"></div>
                                        <div class="price">                             
                                             <span>'.  $price   .'</span>
                                            <span>'. $currency .'</span>
                                        </div>
                                    </div>
                                    <div class="hover">
                                    <h4>'. $z->name_of_food_or_drink.'</h4>
                                    '.$z->ingredients.'
                                    </div>
                                </li>
                                    
                                    ';
                                }
                             echo ' </ul> </div> ';
                  
                        }

                    ?>
            </div>
        </div>
    </section>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.js"  integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="  crossorigin="anonymous"></script>
  
        <script>
            $(".menu_item").click(function(event) {
            var a = $(this).data("id");
            $.ajax({
            type: 'GET',
            url: `<?php echo $url ?>?id=${a}`,


            }).done(function(response) {
            $('.menu_list').html(response)

            }).fail(function(data) {

            });

            });

        </script>
 

<?php include('./includes/footer.php') ?>
