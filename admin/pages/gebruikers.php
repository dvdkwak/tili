<?php
	$users = new user();
	$data = $users->getUsers('*', 'NOT userlevel=2');
	$data2 = $users->getUsers('*', 'userlevel=2');
    $user->register();
?>

<div class="main-container">

	<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
			Overzicht
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      <!-- table -->
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" href="#medewerkers" data-toggle="tab" role="tab">Medewerkers</a>
					</li>
				  <li class="nav-item">
				    <a class="nav-link" href="#klanten" data-toggle="tab" role="tab">Klanten</a>
				  </li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="medewerkers" role="tabpanel">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Voornaam</th>
									<th scope="col">tussen voegsel</th>
									<th scope="col">Achternaam</th>
									<th scope="col">E-mailadres</th>
									<th scope="col">User level</th>
								</tr>
							</thead>
							<?php
								if (isset($data)) {
											foreach($data AS $item){
													switch($item['userlevel']) {
															case '0':
																	$userlevel = 'Manager';
																	break;
															case '1':
																	$userlevel = 'Medewerker';
																	break;
															case '2':
																	$userlevel = 'Klant';
																	break;
													}
													echo '<tbody>
													<tr>
														<td>'. $item['firstName'] .'</td>
														<td>'. $item['preposition'] .'</td>
														<td>'. $item['lastName'] .'</td>
														<td>'. $item['email'] .'</td>
														<td>'. $userlevel.'</td>
												</tr>

												</tbody>
										';
									}
								}
							?>
							</table>
					</div>
					<div class="tab-pane" id="klanten" role="tabpanel">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Voornaam</th>
									<th scope="col">tussen voegsel</th>
									<th scope="col">Achternaam</th>
									<th scope="col">E-mailadres</th>
									<th scope="col">User level</th>
								</tr>
							</thead>
							<?php
								if (isset($data2)) {
											foreach($data2 AS $item){
													switch($item['userlevel']) {
															case '0':
																	$userlevel = 'Manager';
																	break;
															case '1':
																	$userlevel = 'Medewerker';
																	break;
															case '2':
																	$userlevel = 'Klant';
																	break;
													}
													echo '<tbody>
													<tr>
														<td>'. $item['firstName'] .'</td>
														<td>'. $item['preposition'] .'</td>
														<td>'. $item['lastName'] .'</td>
														<td>'. $item['email'] .'</td>
														<td>'. $userlevel.'</td>
												</tr>

												</tbody>
										';
									}
								}
							?>
						</table>
					</div>
				</div>
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
