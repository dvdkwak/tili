<?php
    $user = new user();
    $user->lock("login", "/admin/");

    if(isset($_POST['logout']) && $_POST['logout'] == "true"){
        $user->logOut('/');
    }
?>

<h1>fck this pasta.</h1>

<form method="post">
    <input type="hidden" name="logout" value="true">
    <input type="submit" value="logout">
</form>