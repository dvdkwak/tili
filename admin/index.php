<?php

require_once __DIR__ . '/../autoload.php';

include_once('cfg/config.php');

$user  = new user();
$error = new errorHandling();

if($url!="login"){
    $user->lock("/admin/login", "/admin");
}

if($url == "logout"){
    $user->logOut('/');
}

$content = new adminContent();
$page = $content->getContent($url);

if(isset($_POST['flag']) && $_POST['flag'] == "login"){
    $user->login($_POST['username'], $_POST['password'], $_SESSION['oldLocation']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php if(!empty($page['title'])){ echo $page['title']; } ?></title>
    <link rel="stylesheet" href="/admin/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/assets/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="/admin/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php if(!empty($page['styleLink'])){ echo '/admin/'.$page['styleLink']; } ?>">
</head>
<body>
    <ul class="main-navbar">
        <li class="main-navbar-item"><a href="/admin/projecten">Projecten</a></li>
    <?php
        if ($user->checkUserLevel(array('0'))) {
            echo '<li class="main-navbar-item"><a href="/admin/gebruikers">Gebruikers</a></li>';
        }
        if ($user->checkUserLevel(array('0', '2'))) {
            echo '<li class="main-navbar-item"><a href="/admin/aanvragen">Aanvragen</a></li>';
        }
    ?>
        <li class="main-navbar-item float-right"><a href="/admin/logout">Uitloggen</a></li>
    </ul>
    <?php
        include_once($page['link']);
    ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>
