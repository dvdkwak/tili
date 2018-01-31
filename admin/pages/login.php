<div class="main-container">

  <div class="logo-container">
    <img src="/admin/assets/images/tilit-logo.png" height="50px" width="150px">
  </div>

  <div class="login-page">
    <div class="form"> 		
      <form method="post" class="login-form">
        <input type="text" name="username" placeholder="Username"/>
        <input type="password" name="password" placeholder="Wachtwoord"/>
        <input type="hidden" name="flag" value="login">
        <input type="submit" value="Inloggen">
      </form>
    </div>
  </div>
<?php
if (isset($_SESSION['error'])) {
  echo '<div style="width:500px;height:50px;margin-bottom:50px;margin-left:50px;posistion:fixed;" class="my-alert-message alert alert-danger alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          '.$_SESSION['error'].'
        </div>';
}
?>
</div>