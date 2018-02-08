<?php

	class requests extends db{

		//retrieving a list of requested projects from the database
		public function getRequests() {
			$mysqli = $this->Connect();

			//Getting all the projects where the isRequest is 0
			$query = 'SELECT * FROM tbl_projects WHERE isRequest = "0"';
            $result = $mysqli->query($query);
            while($item = $result->fetch_assoc()){
                $data[] = $item;
            }

            //Creating a foreach loop that displays all the results
            if (isset($data)) {
            	return $data;
            }
            
            
		}

		public function acceptRequests($id) {
			$mysqli = $this->Connect();

			$query = 'UPDATE tbl_projects SET isRequest = "1" WHERE id ='.$id;
            $result = $mysqli->query($query);

            require_once 'errorhandling.php';
            $error = new errorHandling();

            $error->setCustomError("Project succesfull accepted!", "success");
		}

		public function deleteRequests($id) {
			$mysqli = $this->Connect();

			$query = 'UPDATE tbl_projects SET isRequest = "2" WHERE id ='.$id;
            $result = $mysqli->query($query);

            require_once 'errorhandling.php';
            $error = new errorHandling();

            $error->setCustomError("Project succesfull deleted!", "danger");
		}

		public function requestProject() {
			
		}

		public function redirectUser()
		{
			if ($_SESSION['userlevel'] == 1) {
				header("Location: /admin/projecten");
			}
		}



    }


?>