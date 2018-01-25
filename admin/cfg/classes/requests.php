<?php

	class requests extends db{

		//retrieving a list of requested projects from the database
		public function getRequests() {
			$mysqli = $this->Connect();

			//Getting all the projects where the isRequest is 1
			$query = 'SELECT * FROM tbl_projects WHERE isRequest = "1"';
            $result = $mysqli->query($query);
            $result->fetch_all();

            //Creating a foreach loop that displays all the results
            foreach($result as $row){

            	echo '
            	<div class="container-fluid">
					<div id="medewerker" class="container">
						<div class="card">
							<div class="card-header custom-header">
								<h5 style="color:white;">' . $row['projectName'] . '</hp>
								<button type="button" class="snikker btn btn-dark btn-custom-trans float-right"><i class="material-icons">&#xE872;</i></button>
								<button type="button" class="snikker btn btn-dark btn-custom-trans float-right"><i class="material-icons">&#xE876;</i></button>
							</div>
							<div class="card-body">
								<h5 class="card-title">Voetbalclub</h5>
								<p class="card-text">' . $row['description'] . '</p>
								<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">Bekijk PvE</button>
							</div>
						</div>
					</div>
				</div>
				';

            }
            
		}

    }


?>