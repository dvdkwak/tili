<?php
class adminContent
{
    public function getContent($url){
        switch($url){
            case 'home':
                $return = array('link'=>'pages/home.php', 'styleLink'=>'assets/css/home.css', 'title'=>'homehome', 'scriptLink'=>'');
                return $return;
                break;
            case 'login':
                $return = array('link'=>'pages/login.php', 'styleLink'=>'', 'title'=>'tilit | login', 'scriptLink'=>'');
                return $return;
                break;
            default:
                return array('link'=>'pages/404.php', 'styleLink'=>'assets/css/404.css', 'title'=>'Oops!', 'scriptLink'=>'');
                break;
        }
    }
}