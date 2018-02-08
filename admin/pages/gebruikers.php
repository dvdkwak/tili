<div class="main-container">

	<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Overzicht werknemers
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      <!-- table -->

        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Voornaam</th>
      <th scope="col">Achternaam</th>
      <th scope="col">E-mailadres</th>
      <th scope="col"> Project</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>testvoornaam1</td>
      <td>testvoornaam1</td>
      <td>test1@tilit.nl</td>
      <td>
								    <select class="form-control" id="exampleSelect1">
								      <option value="">Project</option>
								      <option value="0">TestProject1</option>
								      <option value="1">TestProject2</option>
								      <option value="2">TestProject3</option>
								    </select>
								</td>
    </tr>
    <tr>
      <td>testachternaam2</td>
      <td>testachternaam2</td>
      <td>test2@tilit.nl</td>
      <td><select class="form-control" id="exampleSelect1">
								      <option value="">Project</option>
								      <option value="0">TestProject1</option>
								      <option value="1">TestProject2</option>
								      <option value="2">TestProject3</option>
								    </select></td>
    </tr>
    <tr>
      <td>testvoornaam3</td>
      <td>testachternaam3</td>
      <td>test3@tilit.nl</td>
      <td><select class="form-control" id="exampleSelect1">
								      <option value="">Project</option>
								      <option value="0">TestProject1</option>
								      <option value="1">TestProject2</option>
								      <option value="2">TestProject3</option>
								    </select></td>
    </tr>
  </tbody>
</table>

      <!-- end table -->
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Werknemersaccount toevoegen
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <!-- hier begint form -->

	        <div class="row">
	        	<div class="col-xs-12 col-md-6">
			    		<form role="form" method="post">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="Voornaam">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="tussenvoegsel" id="tussenvoegsel" class="form-control input-sm" placeholder="Tussenvoegsel">
			    					</div>
			    				</div>
			    			</div>
								<div class="row">
									<div class="col-12">
					    			<div class="form-group">
					    				<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Achternaam">
					    			</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
					    			<div class="form-group">
					    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Adres">
					    			</div>
									</div>
								</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Wachtwoord">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Herhaal wachtwoord">
			    					</div>
			    				</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label for="exampleSelect1"></label>
											<select class="form-control" id="exampleSelect1">
												<option value="">Userlevel</option>
												<option value="0">Admin</option>
												<option value="1">Medewerker</option>
												<option value="2">Klant</option>
											</select>
										</div>
									</div>
								</div>
			    			<input type="hidden" name="">
			    			<input type="submit" value="Register" class="btn btn-info btn-block">
			    		</form>
			    	</div>
						<div class="col-12 col-md-6">
							<h2>Uitleg</h2>
							<p>Paragraph</p>
						</div>
	    		</div>
   		<!-- eind form -->
      </div>
    </div>
  </div>
</div>

</div>
