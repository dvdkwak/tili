<?php
include_once('cfg/config.php');
$content = new adminContent();
$page = $content->getContent($url);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php if(!empty($page['title'])){ echo $page['title']; } ?></title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php if(!empty($page['styleLink'])){ echo $page['styleLink']; } ?>">
</head>
<body>
    <?php
        include_once($page['link']);
    ?>
    <script src="jquery"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php if(!empty($page['scriptLink'])){ echo $page['scriptLink']; } ?>"></script>
</body>
</html>
