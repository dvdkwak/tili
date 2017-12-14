<?php

session_start();

define('hostname', 'localhost');
define('username', 'root');
define('password', 'usbw');
define('database', 'tilit');


    //databaseclass

Class Connect {

    function Connect(){

        $mysqli = new mysqli(hostname,username,password,database);

        if(mysqli_connect_errno()) {
            
            echo mysqli_connect_errno();
            
        } else {

            return $mysqli;

        }

    }

}

//zetten van de url variabele
if(isset($_GET['url']) || !empty($_GET['url'])){
    $url = $_GET['url'];
}else{
    $url = "home";
}


    //Includes
include_once('/cfg/classes/content.php');