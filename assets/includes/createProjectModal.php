<div class="modal" id="createProjectModal" role="dialog">
 <div class="modal-dialog">
   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header">
      <div class="text-center" style="display: block; margin: auto;">
         <h4>Project Aanmaken</h4>
         <img src="assets/images/logo.png" class="loginlogo" style="width:180px;"/>
      </div>
      <button type="button" class="close mr-0" data-dismiss="modal"><i class="material-icons">close</i></button>
     </div>
       <form method="post">
         <div class="modal-body">
           <div class="row">
               <div class="col-12">
                   <div class="form-group">
           <input type="text" name="projectname" id="projectname" class="form-control input-sm" placeholder="Project naam">
                   </div>
               </div>

           </div>
               <div class="row">
                   <div class="col-12">
                   <div class="form-group">
                       <input type="text" name="description" id="description" class="form-control input-sm" placeholder="Beschrijving">
                   </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-12">
                   <div class="form-group">
                       <input type="email" name="pve" id="pve" class="form-control input-sm" placeholder="PVE Path">
                   </div>
                   </div>
               </div>
               <div class="row">
               <div class="col-12">
                   <div class="form-group">
                       <input type="text" name="details" id="details" class="form-control input-sm" placeholder="Details">
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
</div>
</div>
