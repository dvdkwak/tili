<?php
class adminContent
{
    public function getContent($url){
        switch($url){
            case 'home':
                $return = array('link'=>'pages/home.php', 'styleLink'=>'assets/css/home.css');
                return $return;
                break;
            case 'login':
                $return = array('link'=>'pages/login.php', 'styleLink'=>'');
                return $return;
                break;
            default:
                return 'pages/404.php';
                break;
        }
    }
}