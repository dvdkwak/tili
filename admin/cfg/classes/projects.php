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

            $target_file = basename( $_FILES["fileToUpload"]["name"]);
            $fileName = "PvE/". md5(date("Y-m-d h:i:s"));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $uploadOk = 1;
            $uploadOk .= $this->checkImageType($imageFileType);
            $uploadOk .= $this->checkImageSize();

            $this->uploadFile($uploadOk,$fileName,$target_file);

        }
    }

    public function checkImageType($imageFileType)
    {
        if ($imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf") {
            echo "Het is alleen toegestaan om word documenten of PDF bestanden te uploaden";
            return 0;
        } else {
            return 1;
        }
    }

    public function checkImageSize()
    {
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Het bestand is to groot";
            return 0;
        } else {
            return 1;
        }
    }

    public function uploadFile($uploadOk, $fileName, $target_file)
    {
        $mysqli = $this->Connect();

        $projectName = $mysqli->real_escape_string($_POST['projectname']);
        $projectDesc = $mysqli->real_escape_string($_POST['description']);
        $date = $this->getDate();

        if ($uploadOk != 111) {
            echo " Je project is helaas niet aangevraagt, probeer het opnieuw.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileName.'.pdf')) {
                echo "The file ". $target_file ." has been uploaded.";
                $query = "INSERT INTO tbl_projects (projectName,description,date,pvePath,isRequest) VALUES ('$projectName','$projectDesc','$date','$fileName','0')";
                $mysqli->query($query);
            } else {
                echo "Sorry, there was an error uploading your file.";
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
        $date = date("Y-m-d");

        return $date;
    }

    public function checkTimerButton()
    {
        $userId = $_SESSION['id'];
        if (isset($_COOKIE[$userId])) {
            echo 'disabled';
        }
    }

    public function checkTimerOffButton()
    {
        $userId = $_SESSION['id'];
        if (!isset($_COOKIE[$userId])) {
            echo 'disabled';
        }
    }

    public function isDisabledOn()
    {
        $userId = $_SESSION['id'];
        if (isset($_COOKIE[$userId])) {
            echo 'disabled="disabled"';
        }
    }

    public function isDisabledOff()
    {
        $userId = $_SESSION['id'];
        if (!isset($_COOKIE[$userId])) {
            echo 'disabled="disabled"';
        }
    }


    public function startTiming()
    {
        $mysqli = $this->Connect();

        if (isset($_POST['btnStartTiming'])) {
            $projectId   = $_POST['projectId'];
            $userId      = $_SESSION['id'];
            setcookie($userId,$userId,time() + 28800);
            $time = $this->getTime();
            $date = $this->getDate();

            $query = "INSERT INTO tbl_timeregistration (date, startTime,endTime,FK_user_id,FK_project_id) VALUES ('$date','$time','0','$userId','$projectId');
                      UPDATE tbl_users SET status = '1' WHERE id = '$userId'";
            $mysqli->multi_query($query);
            header("Location: /admin/projecten");
        }
    }

    public function stopTiming()
    {
        $mysqli = $this->Connect();

        if (isset($_POST['btnStopTiming'])) {
            $userId = $_SESSION['id'];
            setcookie($userId,"");
            $time = $this->getTime();
            $date = $this->getDate();

            $query = "UPDATE tbl_timeregistration SET endTime = '$time' WHERE FK_user_id = '$userId' AND date = '$date' AND endTime = '0';
                      UPDATE tbl_users SET status = '0' WHERE id = '$userId'";
            $mysqli->multi_query($query);
            header("Location: /admin/projecten");
        }
    }
}
