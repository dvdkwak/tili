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
  $error->getCustomError();
?>
</div>