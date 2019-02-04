<?php

 
$m = array();

foreach($pages->get("template='menus'")->menus as$k => $menu){
    if($menu->on_home_page == 1) {

       
      array_push($m,$menu);
     

    }
  
}

foreach($m[$_GET["id"]]->menu as $x){

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