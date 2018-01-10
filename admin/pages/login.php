<?php
if(isset($_POST['flag']) && $_POST['flag'] == "set"){
    $user = new user();
    $user->login($_POST['username'], $_POST['password'], $_SESSION['oldLocation']);
}
?>

<form method="post">
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="hidden" name="flag" value="set">
    <input type="submit" value="login">
</form>
