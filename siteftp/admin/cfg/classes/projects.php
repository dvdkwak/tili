<?php

	class projects extends db{

		//retrieving a list of requested projects from the database
		public function getProjects() {
			$mysqli = $this->Connect();

			//Getting all the projects where the isRequest is 1
			$query = 'SELECT * FROM tbl_projects WHERE isRequest = "0"';
            $result = $mysqli->query($query);
            while($item = $result->fetch_assoc()){
                $data[] = $item;
            }

            //Creating a foreach loop that displays all the results
            return $data;
            
		}

    }


?>