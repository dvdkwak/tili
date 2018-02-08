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
            if (isset($data)) {
            	return $data;
            }
		}

		public function requestProject()
		{
			if (isset($_POST['saveProject'])) {
				$mysqli = $this->Connect();

				$projectName = $mysqli->real_escape_string($_POST['projectname']);
				$projectDesc = $mysqli->real_escape_string($_POST['description']);
				$fileName = "PvE/". md5(date("Y-m-d h:i:s"));

				$uploadOk = 1;
				// Check if image file is a actual image or fake image
				
			    if ($uploadOk == 0) {
				    echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileName.'.pdf')) {
				        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				    } else {
				        echo "Sorry, there was an error uploading your file.";
				    }
				}
				
				$insertUserQuery = "INSERT INTO tbl_projects (projectName,description,pvePath,isRequest) VALUES ('$projectName','$projectDesc','$fileName','0')";

				if ($mysqli->query($insertUserQuery)) {
					echo 'gelukt';
				}

			}
		}

		public function uploadFile($fileName) {

			
		}

    }


?>