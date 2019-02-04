<?php


setcookie('curency', $_GET['rate'], time() + (86400 * 30), "/"); 


    $rate =  $_GET['rate'];

    $currency = explode(" ", $rate);

    $cookie_value = $currency[0];
    $cookie_name = $currency[1];


   

    setcookie('curency_name', $currency[1], time() + (86400 * 30), "/"); 

    if(!isset($_COOKIE[$cookie_name])){
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day//

       // setcookie($cookie_name, $cookie_value, time() + 5, "/"); // 86400 = 5 second//
    }





?>