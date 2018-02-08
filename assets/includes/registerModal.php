<div class="modal bd-example-modal-lg" id="regModal" role="dialog">
 <div class="modal-dialog  modal-lg">
   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header">
      <div class="text-center" style="display: block; margin: auto;">
         <h4>Registratie</h4>
         <img src="assets/images/logo.png" class="loginlogo" style="width:180px;"/>
      </div>
      <button type="button" class="close mr-0" data-dismiss="modal"><i class="material-icons">close</i></button>
     </div>
    <form role="form" method="post">
     <div class="modal-body">
         <div class="row">
           <div class="col-12 col-md-6">
             <div class="form-group">
               <label for="usrname">Voornaam</label>
               <input type="text" class="form-control myform" id="voornaam" name="firstname" placeholder="Voornaam"/>
             </div>
           </div>
           <div class="col-12 col-md-6">
             <div class="form-group">
               <label for="usrname">Tussenvoegsel</label>
               <input type="text" class="form-control myform" id="tussenvoegsel" name="preposition" placeholder="Tussenvoegsel"/>
             </div>
           </div>
           <div class="col-12 col-md-6">
             <div class="form-group">
               <label for="usrname">Achternaam</label>
               <input type="text" class="form-control myform" id="achternaam" name="lastname" placeholder="Achternaam"/>
             </div>
           </div>
           <div class="col-12 col-md-6">
             <div class="form-group">
               <label for="email">Telefoonnummer</label>
               <input type="text" class="form-control myform" id="telnummer" name="telnumber" placeholder="Telefoonnummer"/>
             </div>
           </div>
           <div class="col-12 col-md-6">
             <div class="form-group">
               <label for="email">E-mail</label>
               <input type="email" class="form-control myform" id="email" name="email" placeholder="Email"/>
             </div>
           </div>
           <div class="col-12 col-md-6">
             <div class="form-group">
               <label for="address">Adres</label>
               <input type="text" class="form-control myform" id="adres" name="address" placeholder="Adres"/>
             </div>
           </div>
           <div class="col-12 col-md-6">
             <div class="form-group">
               <label for="zipcode">Postcode</label>
               <input type="text" class="form-control myform" id="zipCode" name="zipcode" placeholder="Postcode"/>
             </div>
           </div>
           <div class="col-12 col-md-6">
             <div class="form-group">
               <label for="city">Stad</label>
               <input type="text" class="form-control myform" id="city" name="city" placeholder="Stad"/>
             </div>
           </div>
           <div class="col-12">
             <div class="form-group">
               <label for="psw"> Password</label>
               <input type="password" class="form-control myform" id="psw" name="password" placeholder="Wachtwoord"></input>
             </div>
           </div>
           <div class="col-12">
             <div class="form-group">
               <label for="psw"> Re-enter password</label>
               <input type="password" class="form-control myform" id="pswConf" name="repeatpass" placeholder="Wachtwoord conformeren"></input>
             </div>
           </div>
           <input type="hidden" class="form-control myform" name="userlvl" value="2"></input>
         </div>
       </div>
       <div class="modal-footer">
         <p>Heeft u al een account? <a href="" id="knoppie" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Inloggen</a></p>
         <p>Wachtwoord <a href="#">Vergeten?</a></p>
         <button type="submit" name="registerBtn" class="btn bg-color-mint b-radius-none float-right" style="background:#1ABC9C;">Registreren</button>
       </div>
     </form>
   </div>
 </div>
</div>
