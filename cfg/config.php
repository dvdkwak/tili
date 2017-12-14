<?php

session_start();

define('hostname', 'localhost');
define('username', 'root');
define('password', 'usbw');
define('database', 'tilit');


    //databaseclass

class db{
    public $mysqli;

    public function __construct(){
        $this->mysqli = new mysqli(hostname, username, password, database);

        if($this->mysqli->connect_errno()){
            return $this->mysqli->connect_errno();
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