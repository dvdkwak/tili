<?php
include_once('/cfg/config.php');
$content = new adminContent();
$page = $content->getContent($url);
?>
<html>
<head>
    <title>test</title>
    <link rel="stylesheet" href="<?php if(!empty($page['styleLink'])){ echo $page['styleLink']; } ?>">
</head>
<body>
    <?php
        include_once($page['link']);
    ?>
</body>
</html>
