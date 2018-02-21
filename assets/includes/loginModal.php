<div class="modal" id="loginModal" role="dialog">
 <div class="modal-dialog">
   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header">
      <div class="text-center" style="display: block; margin: auto;">
         <h4>Login</h4>
         <img src="assets/images/logo.png" class="loginlogo" style="width:180px;"/>
      </div>
      <button type="button" class="close mr-0" data-dismiss="modal"><i class="material-icons">close</i></button>
     </div>
       <form method="post">
         <div class="modal-body">
         <div class="row">
           <div class="col-12">
             <div class="form-group">
               <label for="email">E-mail</label>
               <input type="email" class="form-control myform" id="email" name="email" placeholder="Email"/>
             </div>
           </div>
           <div class="col-12">
             <div class="form-group">
               <label for="psw"> Password</label>
               <input type="password" class="form-control myform" id="psw" name="password" placeholder="Wachtwoord">
             </div>
           </div>
         </div>
       </div>
       <div class="modal-footer">
         <p>Wachtwoord <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#pswForgotModal">Vergeten?</a></p>
         <button type="submit" name="loginBtn" class="btn bg-color-mint b-radius-none float-right" style="background:#1ABC9C;">Login</button>
       </div>
     </form>
   </div>
 </div>
</div>
