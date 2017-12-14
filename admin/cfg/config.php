<?php
session_start();

define('hostname', 'localhost');
define('username', 'root');
define('password', 'usbw');
define('database', 'tilit');


Class db{
    function Connect(){
        $mysqli = new mysqli(hostname,username,password,database);

        if(mysqli_connect_errno()){
            echo mysqli_connect_errno();
        }else{
            return $mysqli;
        }
    }
}

//getting the right url
if(isset($_GET['url']) || !empty($_GET['url'])){
    $url = $_GET['url'];
}else{
    $url = "home";
}

//includes
include_once('cfg/classes/adminContent.php');