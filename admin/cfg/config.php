<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];

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
include_once($root.'/admin/cfg/classes/adminContent.php');
include_once($root.'/admin/cfg/classes/user.php');
include_once($root.'/admin/cfg/classes/projects.php');
include_once($root.'/admin/cfg/classes/requests.php');
include_once($root.'/admin/cfg/classes/errorhandling.php');