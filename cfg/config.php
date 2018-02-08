<?php

//zetten van de url variabele
if(isset($_GET['url']) || !empty($_GET['url'])){
    $url = $_GET['url'];
}else{
    $url = "home";
}

require_once __DIR__ . '/classes/content.php';