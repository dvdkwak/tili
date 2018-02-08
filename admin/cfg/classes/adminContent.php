<?php
class adminContent
{
    public function getContent($url){
        switch($url){
            case 'home':
                return array('link'=>'pages/home.php', 'styleLink'=>'', 'title'=>'Admin | Home', 'scriptLink'=>'');
                break;
            case 'login':
                return array('link'=>'pages/login.php', 'styleLink'=>'assets/css/login.css', 'title'=>'Admin | Login', 'scriptLink'=>'');
                break;
            case 'projecten':
            	return array('link'=>'pages/projects.php', 'styleLink'=>'', 'title'=>'Admin | Projects', 'scriptLink'=>'');
                break;
            case 'projectdetails':
                return array('link' => 'pages/projectdetails.php', 'title' => 'Admin | Projectdetails', 'styleLink' => '', 'scriptLink' => '');
                break;
            case 'aanvragen':
                return array('link'=>'pages/requests.php', 'styleLink'=>'', 'title'=>'Admin | Requests', 'scriptLink'=>'');
                break;
            case 'gebruikers':
                return array('link'=>'pages/gebruikers.php', 'styleLink'=>'', 'title'=>'Admin | gebruikersbeheer', 'scriptLink'=>'');
                break;
            default:
                return array('link'=>'pages/404.php', 'styleLink'=>'assets/css/404.css', 'title'=>'Oops!', 'scriptLink'=>'');
                break;
        }
    }
}