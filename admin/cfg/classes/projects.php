<?php
include ('errorhandling.php');

class projects extends db{

    //retrieving a list of requested projects from the database
    public function getProjects() {
        $mysqli = $this->Connect();

        if (isset($_SESSION['userlevel'])) {

            $userId = $_SESSION['id'];

            if ($_SESSION['userlevel'] == 0) {
                //When userlevel is 0 (Beheerder) show all the projects
                $query = 'SELECT * FROM tbl_projects WHERE isRequest = "0" ORDER BY status ASC';
            } else {
                //When userlevel is 1 (Medewerker) show all the projects where the user is assigned to
                $query = 'SELECT a.*, b.FK_projects_id, b.FK_users_id FROM tbl_projects AS a
                INNER JOIN tbl_users_projects AS b ON a.id = b.FK_projects_id WHERE b.FK_users_id = '.$userId.' ORDER BY id DESC';
            }

            $result = $mysqli->query($query);

        }

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

            $fileSize = $_FILES["fileToUpload"]["size"];
            $target_file = basename($_FILES["fileToUpload"]["name"]);
            $fileName = "PvE/". md5(date("Y-m-d h:i:s"));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $uploadOk = 1;
            $uploadOk .= $this->checkImageType($imageFileType);
            $uploadOk .= $this->checkImageSize($fileSize);

            $this->uploadFile($uploadOk,$fileName,$target_file);
            header('admin/projecten');
        }
    }

    public function finishProject()
    {
        $mysqli = $this->Connect();

        if (isset($_POST['btnFinishProject'])) {
            $projectId   = $_POST['projectId'];

            $query = "UPDATE tbl_projects SET status = '1' WHERE id = '$projectId'";
            $mysqli->query($query);
            header("Location: /admin/projecten");
        }
    }

    public function checkImageType($imageFileType)
    {
        $error = new errorHandling();
        if ($imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf") {
            $error->setCustomError("Het is alleen toegestaan om word documenten of PDF bestanden te uploaden!","danger");
            return 0;
        } else {
            return 1;
        }
    }

    public function checkImageSize($fileSize)
    {
        $error = new errorHandling();
        if ($fileSize > 500000) {
            $error->setCustomError("Het bestand is te groot!","danger");
            return 0;
        } else {
            return 1;
        }
    }

    public function uploadFile($uploadOk, $fileName)
    {
        $mysqli = $this->Connect();
        $error = new errorHandling();

        $projectName = $mysqli->real_escape_string($_POST['projectname']);
        $projectDesc = $mysqli->real_escape_string($_POST['description']);
        $userId = $_SESSION['id'];
        $date = $this->getDate();

        if ($uploadOk != 111) {

        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileName.'.pdf')) {
                if ($_SESSION['userlevel'] == 0) {
                    $isRequest = 0;
                    $error->setCustomError("Uw project is successvol aangemaakt","success");
                } else {
                    $isRequest = 1;
                    $error->setCustomError("Uw project is successvol aangevraagt","success");
                }
                $query = "INSERT INTO tbl_projects (projectName,description,startDate,pvePath,isRequest,status) VALUES ('$projectName','$projectDesc','$date','$fileName','$isRequest','0')";
                $mysqli->query($query);

                $query2 = "SELECT id FROM `tbl_projects` WHERE description='$projectDesc'";
                $result = $mysqli->query($query2);
                $projectId = $result->fetch_object()->id;

                $query3 = "INSERT INTO `tbl_users_projects` (FK_projects_id, FK_users_id) VALUES ('$projectId','$userId')";
                $mysqli->query($query3);
                header('Location: /admin/projecten');
            } else {
                $error->setCustomError("Er is een probleem met het bestand dat u probeert te uploaden!","danger");
                header('Location: /admin/projecten');
            }
        }
    }

    public function getTime()
    {
        date_default_timezone_set('Europe/Amsterdam');
        $time = date("H:i:s");

        return $time;
    }

    public function getDate()
    {
        date_default_timezone_set('Europe/Amsterdam');
        $date = date("d-m-Y");

        return $date;
    }

    public function checkTimerButton()
    {
        $klok = $_SESSION['klok'];
        if ($klok == "1") {
            echo 'disabled';
        }
    }

    public function checkTimerOffButton()
    {
        $klok = $_SESSION['klok'];
        if ($klok == "0") {
            echo 'disabled';
        }
    }

    public function isDisabledOn()
    {
        $klok = $_SESSION['klok'];
        if ($klok == "1") {
            echo 'disabled="disabled"';
        }
    }

    public function isDisabledOff()
    {
        $klok = $_SESSION['klok'];
        if ($klok == "0") {
            echo 'disabled="disabled"';
        }
    }


    public function startTiming()
    {
        $mysqli = $this->Connect();

        if (isset($_POST['btnStartTiming'])) {
            $projectId   = $_POST['projectId'];
            $userId      = $_SESSION['id'];
            date_default_timezone_set('Europe/Amsterdam');
            $time = $this->getTime();
            $date = $this->getDate();

            $query = "INSERT INTO tbl_timeregistration (date, startTime,endTime,FK_user_id,FK_project_id) VALUES ('$date','$time','0','$userId','$projectId')";
            $mysqli->multi_query($query);

            $query2 = "UPDATE tbl_users SET status = '1' WHERE id = '$userId'";
            $mysqli->multi_query($query2);

            $query3 = "UPDATE tbl_users SET klok = '1' WHERE id = '$userId'";
            $mysqli->multi_query($query3);
            $_SESSION['klok'] = "1";
            header("Location: /admin/projecten");
        }
    }

    public function stopTiming()
    {
        $mysqli = $this->Connect();

        if (isset($_POST['btnStopTiming'])) {
            $userId = $_SESSION['id'];
            $time = $this->getTime();
            $date = $this->getDate();

            $query = "UPDATE tbl_timeregistration SET endTime = '$time' WHERE FK_user_id = '$userId' AND date = '$date' AND endTime = '0'";
            $mysqli->multi_query($query);

            $query2 = "UPDATE tbl_users SET status = '0' WHERE id = '$userId'";
            $mysqli->multi_query($query2);

            $query3 = "UPDATE tbl_users SET klok = '0' WHERE id = '$userId'";
            $mysqli->multi_query($query3);
            $_SESSION['klok'] = "0";
            header("Location: /admin/projecten");
        }
    }
}
