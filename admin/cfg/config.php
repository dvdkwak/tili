<?php
//getting the right url
if(isset($_GET['url']) || !empty($_GET['url'])){
    $url = $_GET['url'];
}else{
    $url = "home";
}

//includes
include_once('cfg/classes/adminContent.php');