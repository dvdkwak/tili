<?php
    require_once __DIR__ . '/autoload.php';
    require_once __DIR__ . '/cfg/config.php';
    require_once __DIR__ . '/admin/cfg/config.php';
    $content = new content();
    $page = $content->getContent($url);
    $user = new user();
    if (isset($_POST['loginBtn'])) {
        $user->login($_POST['email'], $_POST['password'], "/admin/projecten");
    }
    $error = new errorHandling();
    $user->register();
    $user->sendMail();
    $user->forgotPassword();
    $error->getCustomError("www.tilit.nl");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - TiliT</title>
    <link rel="icon" href="/images/favicon.png">
    <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/master.css">
    <link rel="stylesheet" href="/admin/assets/css/404.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
</head>
<body>
    <div id="page1" class="page">
        <?php
            include 'assets/includes/loginModal.php';
            include 'assets/includes/pswForgotModal.php';
            include 'assets/includes/registerModal.php';
            include 'assets/includes/header.php';
            include_once($page);
            include 'assets/includes/contactForm.php';
            include 'assets/includes/footer.php';
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script src="<?php if(!empty($page['scriptLink'])){ echo $page['scriptLink']; } ?>"></script>
</body>
</html>
