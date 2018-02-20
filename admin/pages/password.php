<div class="main-container">

  <div class="logo-container">
    <img src="/admin/assets/images/tilit-logo.png" height="50px" width="150px">
  </div>

  <div class="login-page">
    <div class="form"> 		
      <form method="post" class="login-form">
        <input type="password" name="password" placeholder="Wachtwoord"/>
        <input type="password" name="passwordrepeat" placeholder="Wachtwoord herhalen"/>
        <input type="submit" name="changeSubmitBtn" value="Veranderen">
      </form>
    </div>
  </div>

<?php 
  $error->getCustomError();
?>
</div>