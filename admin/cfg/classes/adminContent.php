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
                $return = array('link'=>'pages/login.php', 'styleLink'=>'assets/css/login.css', 'title'=>'tilit | login', 'scriptLink'=>'');
                return $return;
                break;
            case 'projects':
            	$return = array('link'=>'pages/projects.php', 'styleLink'=>'', 'title'=>'tilit | projects', 'scriptLink'=>'');
                return $return;
                break;
            default:
                $return = array('link'=>'pages/404.php', 'styleLink'=>'assets/css/404.css', 'title'=>'Oops!', 'scriptLink'=>'');
                return $return;
                break;
        }
    }
}