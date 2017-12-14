<?php
    include_once('/cfg/config.php');
    $content = new content();
    $page = $content->getContent($url);
    include_once($page);
    //dsfasdfasdf
?>