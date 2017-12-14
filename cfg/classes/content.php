<?php
class content
{
    public function getContent($url){
        switch ($url){
            case "home":
                return "/pages/home.php";
                break;
            default:
                return "/pages/404.php";
                break;
        }
    }
}