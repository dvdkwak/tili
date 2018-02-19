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

		public function acceptRequests() {
			$mysqli = $this->Connect();

            $error = new errorHandling();

            if (isset($_POST['btnAcceptRequest'])) {
                $id = $_POST['requestID'];

                $query = 'UPDATE tbl_projects SET isRequest = "1" WHERE id ='.$id;
                if ($mysqli->query($query)) {
                    $error->setCustomError("Project succesfull accepted!", "success");
                }
            }
		}

		public function deleteRequests() {
			$mysqli = $this->Connect();

            $error = new errorHandling();

            if (isset($_POST['btnDeleteRequest'])) {
                $id = $_POST['requestID'];
                $query = 'UPDATE tbl_projects SET isRequest = "2" WHERE id ='.$id;

                if ($mysqli->query($query)) {
                    $error->setCustomError("Project succesfull deleted!", "danger");
                }
            }
		}

		public function requestProject() {
			
		}

		public function redirectUser()
		{
			if (!$_SESSION['userlevel'] == 0) {
				header("Location: /admin/projecten");
			}
		}



    }


?>