<?php

//zetten van de url variabele
if(isset($_GET['url']) || !empty($_GET['url'])){
    $url = $_GET['url'];
}else{
    $url = "home";
}


    //Includes
include_once('/cfg/classes/content.php');