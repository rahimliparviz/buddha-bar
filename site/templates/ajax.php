<?php
foreach($pages->get('template=menus')->menus[$_GET["id"]]->menu as $x){

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
                <span>'. $price .'</span>
               <span>'.  $currency .'</span>
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