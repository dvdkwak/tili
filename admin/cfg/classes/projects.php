<?php

	class projects extends db{

		//retrieving a list of requested projects from the database
		public function getProjects() {
			$mysqli = $this->Connect();

			if (isset($_SESSION['userlevel'])) {

				$userId = $_SESSION['id'];

				if ($_SESSION['userlevel'] == 0) {
					//When userlevel is 0 (Beheerder) show all the projects
					$query = 'SELECT * FROM tbl_projects WHERE isRequest = "1"';
				} else {
					//When userlevel is 1 (Medewerker) show all the projects where the user is assigned to
					$query = 'SELECT a.*, b.FK_projects_id, b.FK_users_id FROM tbl_projects AS a
					INNER JOIN tbl_users_projects AS b ON a.id = b.FK_projects_id WHERE b.FK_users_id = '.$userId;
				}

			}
			
            $result = $mysqli->query($query);
            while($item = $result->fetch_assoc()){
                $data[] = $item;
            }

            //Creating a foreach loop that displays all the results
            return $data;
		}

    }


?>