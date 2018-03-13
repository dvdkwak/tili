<?php

class user extends db
{

    //standard login function which calles for the checked and the session set as well
    public function login($username, $password, $location)
    {
        if (isset($_POST['loginBtn'])) {
            $this->checkCredentials($username, $password, $location);
            $this->setSession();
        }
    }

    //function to add the user to the database
    public function register()
    {
        $mysqli = $this->Connect();
        $error = new errorHandling();
        //if the register button is clicked proceed with adding the user
        if (isset($_POST['registerBtn'])) {

            //real_escape_string to prevent sql injection
            $email = $mysqli->real_escape_string($_POST['email']);
            $password = $mysqli->real_escape_string($_POST['password']);
            $repeated = $mysqli->real_escape_string($_POST['repeatpass']);
            $firstname = $mysqli->real_escape_string($_POST['firstname']);
            $prepos = $mysqli->real_escape_string($_POST['preposition']);
            $lastname = $mysqli->real_escape_string($_POST['lastname']);
            $telnumber = $mysqli->real_escape_string($_POST['telnumber']);
            $city = $mysqli->real_escape_string($_POST['city']);
            $address = $mysqli->real_escape_string($_POST['address']);
            $zipcode = $mysqli->real_escape_string($_POST['zipcode']);
            $userlvl = $mysqli->real_escape_string($_POST['userlvl']);
            $companyname = $mysqli->real_escape_string($_POST['cname']);

            //check if the passwords match
            if ($password === $repeated) {
                //hashing the password
                $password = hash('sha512', $password);

                //check if mail exists
                $checkEmail = $mysqli->query("SELECT email FROM tbl_users WHERE email = '$email'");

                //check if the email/user already exists
                if ($checkEmail->num_rows === 0) {

                    if (empty($prepos)) {
                        $prepos = "NULL";
                    }

                    $mysqli->query("INSERT INTO tbl_users (email, password, userlevel, tel, firstName, lastName, companyName, preposition, city, address, zipCode, status)
                                                      VALUES ('$email','$password','$userlvl','$telnumber','$firstname','$lastname','$companyname','$prepos','$city','$address','$zipcode', '3')");
                    $error->setCustomError('Uw account is successvol aangevraagt, u krijgt een mail wanneer uw account is geactiveert.', "success");
                    header('Location: /');
                } else {
                    $error->setCustomError('Het email dat u heeft ingevoerd bestaat al.', "danger");
                }
            } else {
              $error->setCustomError('De wachtwoorden komen niet overeen, probeer het opnieuw.', "danger");
            }
        }
    }

    //Let us just say here things get serious
    public function checkCredentials($username, $password, $location)
    {
        require_once 'errorhandling.php';
        $error = new errorHandling();

        $mysqli = $this->connect();

        //real_escape_string to prevent sql injection
        $username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);

        //hashing the 'password' value
        $password = hash('sha512', $password);

        $query = 'SELECT * FROM tbl_users
					  WHERE email = "' . $username . '"
						AND password = "' . $password . '"';
        $result = $mysqli->query($query);
        if ($result->num_rows === 1) {
            $item = $result->fetch_object();

            if ($item->status != "3") {
                //if I get a result it means the credentials are right.
                $this->status = True;
                $this->userlevel = $item->userlevel;
                $this->id = $item->id;
                $this->firstName = $item->firstName;
                $this->lastName = $item->lastName;
                $this->moveTo($location);
            } else {
                $this->status = False;
                $error->setCustomError("Uw account is nog niet geaccepteerd.", "danger");
            }
        } else {
            $this->status = False;
            $error->setCustomError("Gebruikersnaam of wachtwoord komt niet overeen met een bestaand account.", "danger");
        }
      }

    //if status is true then we can set the session
    public function setSession()
    {
        if ($this->status === True) {
            $_SESSION['id'] = $this->id;
            $_SESSION['userlevel'] = $this->userlevel;
            $_SESSION['status'] = True;
            $_SESSION['firstName'] = $this->firstName;
            $_SESSION['lastName'] = $this->lastName;
        } else {
            $_SESSION['status'] = False;
        }
    }

    public function logOut($location)
    {
        if (isset($_SESSION['status'])) {
            session_destroy();
        }
        header("location:" . $location);
    }

    public function lock($location, $oldLocation)
    {
        if (!isset($_SESSION['status']) || $_SESSION['status'] == False) {
            $_SESSION['oldLocation'] = $oldLocation;
            $this->moveTo($location);
        }
    }

    public function moveTo($location)
    {
        header("location:" . $location);
    }

    public function ifAdmin()
    {
        if (isset($_SESSION['userlevel']) && $_SESSION['userlevel'] == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkUserLevel($userlevels)
    {
        if (isset($_SESSION['userlevel'])) {
            if (in_array($_SESSION['userlevel'], $userlevels)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function redirectUser()
    {
        if ($_SESSION['userlevel'] == 1) {
            header("Location: /admin/projecten");
        }
    }


    public function removeMemberProject()
    {
        $mysqli = $this->connect();

        $selectProjectID = $_POST['inputValueRemove'];
        $query = 'DELETE FROM tbl_users_projects WHERE FK_users_id='.$selectProjectID;
        $mysqli->query($query);

    }

    public function getUsers($select, $where)
    {
        $mysqli = $this->connect();
        $query = 'SELECT ' . $select . ' FROM tbl_users WHERE ' . $where . '';
        $result = $mysqli->query($query);
        while ($items = $result->fetch_assoc()) {
            $data[] = $items;
        }
        if (empty($data)) {
        } else {
            return $data;
        }
    }

    public function getLog($id)
    {
        $mysqli = $this->connect();
        $query = '
            SELECT A.*, B.* FROM tbl_projects_log AS A INNER JOIN tbl_log AS B ON A.FK_log_id = B.id WHERE A.FK_project_id = ' . $id . ' ORDER BY B.id ASC';
        $result = $mysqli->query($query);
        while ($items = $result->fetch_assoc()) {
            $data[] = $items;
        }
        if (empty($data)) {
        } else {
            return $data;
        }
    }

    public function verLog($id, $fname, $lname, $message)
    {
        $mysqli = $this->connect();
        date_default_timezone_set('Europe/Amsterdam');
        $date = date("H:i:s d-m-Y");
        $query = "INSERT INTO tbl_log (author, message, date) VALUES ('$fname $lname','$message','$date')";
        $mysqli->query($query);

        $query2 = "SELECT id FROM `tbl_log` WHERE message='$message'";
        $result = $mysqli->query($query2);
        $item = $result->fetch_object();
        $idLog = $item->id;

        $query3 = "INSERT INTO tbl_projects_log (FK_project_id, FK_log_id) VALUES ('$id','$idLog')";
        $mysqli->query($query3);
    }

    public function getTimeRegistration($projectid)
    {
        $mysqli = $this->connect();
        $query = "SELECT A.*, B.* FROM `tbl_timeregistration` AS A INNER JOIN `tbl_users` AS B ON A.FK_user_id = B.id  WHERE A.FK_project_id = " . $projectid;
        $result = $mysqli->query($query);
        while ($items = $result->fetch_assoc()) {
            $data[] = $items;
        }
        if (empty($data)) {
        } else {
            return $data;
        }
    }

    public function sendMail()
    {
        if (isset($_POST['submitBtn'])) {
            $to = 'info@tilit.nl';
            $subject = $_POST['subject'];
            $from = $_POST['contactmail'];
            $message1 = $_POST['message'];
            $name = $_POST['name'];
            $phone = $_POST['telephone'];

            // Message
            $message = '<html>
                        <head>
                        </head>
                        <body>
                        <img src="http://tilit.nl/assets/images/TiliT_Logo2.png" alt="TiliT Logo" height="100" width="320">
                        <table>
                            <tr>
                                <td>Naam:</td><td>'.$name.'</td>
                            </tr>
                            <tr>
                                <td>Telefoonnummer:</td><td>'.$phone.'</td>
                            </tr>
                            <tr>
                                <td>Onderwerp:</td><td>'.$subject.'</td>
                            </tr>
                        </table>
                        <p>Bericht:</p>
                        <p>'.$message1.'</p>
                        </body>
                        </html>
                        ';
            // Message

            // To send HTML mail, the Content-type header must be set
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'MIME-Version: 1.0';

            // Additional headers add additional receivers (split with comma's)
            $headers[] = 'To: ';
            $headers[] = 'From: ' . $from;

            // Mail it
            mail($to, $subject, $message, implode("\r\n", $headers));
        }
    }

    public function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function getRecoveryString($email)
    {
        $mysqli = $this->Connect();

        $query = "SELECT recoveryString FROM tbl_users WHERE email = '$email'";
        $result = $mysqli->query($query);
        $string = $result->fetch_object()->recoveryString;

        return $string;
    }

    public function createRecoveryString($email)
    {
        $mysqli = $this->Connect();

        $string = $this->generateRandomString('32');

        $query = "UPDATE tbl_users SET recoveryString = '$string' WHERE email = '$email' ";
        $mysqli->query($query);
    }

    public function forgotPassword()
    {
        if (isset($_POST['forgotSubmit'])) {
            $email = $_POST['forgotEmail'];

            $this->createRecoveryString($email);
            $recoveryString = $this->getRecoveryString($email);

            $message = '<html>
                                <head>
                                </head>
                                <body>
                                    <img src="http://tilit.nl/assets/images/TiliT_Logo2.png" alt="TiliT Logo" height="120" width="386"><br />
                                    <h3>Wachtwoord veranderen voor TiliT.nl</h3><br />
                                    <p>Om uw wachtwoord te veranderen moet u deze link volgen: <a href="https://www.tilit.nl/admin/wachtwoord&string=' . $recoveryString . '">Wachtwoord Veranderen</a></p> <br />
                                    <p>Komt deze actie u niet bekent voor klik dan <a href="https://www.tilit.nl/">hier</a>.</p>
                                </body>
                            </html>';

            $subject = "Wachtwoord wijzigen TiliT";
            $from = "info@tilit.nl";

            // To send HTML mail, the Content-type header must be set
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'From: ' . $from;

            // Mail it
            mail($email, $subject, $message, implode("\r\n", $headers));
            require_once 'errorhandling.php';
            $error = new errorHandling();
            $error->setCustomError("Check uw mail om uw wachtwoord te veranderen","warning");
        }
    }

    public function changePassword()
    {
        $mysqli = $this->Connect();
        require_once 'errorhandling.php';
        $error = new errorHandling();

        if (isset($_POST['changeSubmitBtn'])) {
            $checkpassword = $mysqli->real_escape_string($_POST['password']);
            $passwordrepeat = $mysqli->real_escape_string($_POST['passwordrepeat']);

            if ($checkpassword == $passwordrepeat) {
                $password = hash('sha512', $checkpassword);
                $recovery = $_GET['string'];
                $query = "SELECT id FROM tbl_users WHERE recoveryString = '$recovery'";
                $userId = $mysqli->query($query);
                if (!$userId == '') {
                    $updatePasswordQuery = "UPDATE tbl_users SET password = '$password' WHERE recoveryString = '$recovery'";
                    $updateRecoveryQuery = "UPDATE tbl_users SET recoveryString = '' WHERE recoveryString = '$recovery'";
                    if ($mysqli->query($updatePasswordQuery)) {
                        $mysqli->query($updateRecoveryQuery);
                        $error->setCustomError("Uw wachtwoord is succesvol veranderd","warning");
                        header("Location: http://www.tilit.nl/");
                    }
                }
            }
        }
    }

    public function offerCreate($id)
    {
        $mysqli = $this->connect();
        $query = "
					SELECT A.*, B.*, C.*, D.*
					FROM `tbl_projects`							AS A
					INNER JOIN `tbl_users_projects` AS B ON A.id = B.FK_projects_id
					INNER JOIN `tbl_users` 					AS C ON B.FK_users_id = C.id
					INNER JOIN `tbl_offers` 				AS D ON C.id= D.FK_user_id AND A.id = D.FK_project_id
					WHERE A.id = " . $id . "";
        $result = $mysqli->query($query);
        while ($items = $result->fetch_assoc()) {
            $data[] = $items;
        }
        if (isset($data)) {
            return $data;
        }
    }

    public function checkSession()
    {
        if (!isset($_SESSION['status'])) {
            $_SESSION['status'] = '';
        }
    }

    public function checkProjectId($id){
      $userlvl = $_SESSION['userlevel'];
      $userID = $_SESSION['id'];
      $mysqli = $this->connect();

      if ($userlvl !== "0") {
        $query = "SELECT FK_users_id FROM tbl_users_projects WHERE FK_projects_id='$id'";
        $result = $mysqli->query($query);
        $idUser = $result->fetch_object()->FK_users_id;
        if ($idUser !== $userID) {
          header("location: /admin");
        }
      }
    }

    public function addMember($id, $email) {
      $mysqli = $this->connect();
      $error = new errorHandling();

      $query = "SELECT id, userlevel FROM tbl_users WHERE email='$email'";
      $result = $mysqli->query($query);
      if ($result->num_rows != 0) {
          $item = $result->fetch_object();
          $uID = $item->id;
          $lvl = $item->userlevel;

          if ($lvl == "1") {
              $query2 = "INSERT INTO `tbl_users_projects` (FK_projects_id, FK_users_id) VALUES ('$id','$uID')";
              $mysqli->query($query2);
              $error->setCustomError('De gebruiker is succesvol aan het project gekoppeld!', 'success');
          }
      } else {
          $error->setCustomError('Er bestaat geen gebruiker met die email!', 'warning');
      }
    }

    public function acceptNew($id){
      $mysqli=$this->connect();
      $query="UPDATE tbl_users SET status='0' WHERE id='$id'";
      $mysqli->query($query);
    }

    public function denyNew($id){
      $mysqli=$this->connect();
      $query="DELETE FROM tbl_users WHERE id='$id'";
      $mysqli->query($query);
    }

    public function deleteWorker()
    {
        $mysqli=$this->connect();
        $error = new errorHandling();
        if (isset($_POST['btnDeleteWorker'])) {
            $workerId = $_POST['workerId'];
            $query="DELETE FROM tbl_users WHERE id='$workerId'";
            $mysqli->query($query);
            $error->setCustomError('test','danger');
        }
    }

    public function getUsersProject($id)
    {
        $mysqli = $this->connect();
        $query = 'SELECT a.id,firstname,lastname,preposition,email FROM tbl_users AS a
                  INNER JOIN tbl_users_projects AS b ON a.id = b.FK_users_id WHERE FK_projects_id ='.$id;
        $result = $mysqli->query($query);
        while ($items = $result->fetch_assoc()) {
            $data[] = $items;
        }
        if (empty($data)) {
        } else {
            return $data;
        }
    }

}

?>
