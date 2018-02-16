<?php

	class user extends db{

        //standard login function which calles for the checked and the session set as well
        public function login($username, $password, $location)
        {   
            if (isset($_POST['loginBtn'])) {
                $this->checkCredentials( $username, $password );
                $this->setSession();
                $this->moveTo( $location );
            }
        }

        //function to add the user to the database
        public function register(){
            $mysqli = $this->Connect();

            //if the register button is clicked proceed with adding the user
            if(isset($_POST['registerBtn'])){

                //real_escape_string to prevent sql injection
                $email     = $mysqli->real_escape_string($_POST['email']);
                $password  = $mysqli->real_escape_string($_POST['password']);
                $repeated  = $mysqli->real_escape_string($_POST['repeatpass']);
                $firstname = $mysqli->real_escape_string($_POST['firstname']);
                $prepos    = $mysqli->real_escape_string($_POST['preposition']);
                $lastname  = $mysqli->real_escape_string($_POST['lastname']);
                $telnumber = $mysqli->real_escape_string($_POST['telnumber']);
                $city      = $mysqli->real_escape_string($_POST['city']);
                $address   = $mysqli->real_escape_string($_POST['address']);
                $zipcode   = $mysqli->real_escape_string($_POST['zipcode']);
                $userlvl   = $mysqli->real_escape_string($_POST['userlvl']);

                //check if the passwords match
                if ($password === $repeated) {
                    //hashing the password
                    $password = hash('sha512', $password);

                    //check if mail exists
                    $checkEmail = $mysqli->query("SELECT email FROM tbl_users WHERE email = '$email'");

                    //check if the email/user already exists
                    if($checkEmail->num_rows === 0){

                        if (empty($prepos)) {
                            $prepos = "NULL";
                        }

                        $insertUser = $mysqli->query("INSERT INTO tbl_users (email, password, userlevel, tel, firstName, lastName, preposition, city, address, zipCode) 
                                                      VALUES ('$email','$password','$userlvl','$telnumber','$firstname','$lastname','$prepos','$city','$address','$zipcode')");

                        header('Location: index.php');
                    } else {
                        $this->alert('Het email dat u heeft ingevoerd bestaat al.','danger');
                    }
                } else {
                    $this->alert('De wachtwoorden komen niet overeen, probeer het opnieuw.','danger');
                }
            }
        }

        //Let us just say here things get serious
        public function checkCredentials($username, $password)
        {
            require_once 'errorhandling.php';
            $error = new errorHandling();

            $mysqli = $this->connect();

            //real_escape_string to prevent sql injection
            $username = $mysqli->real_escape_string( $username );
            $password = $mysqli->real_escape_string( $password );

            //hashing the 'password' value
            $password = hash( 'sha512', $password );

            $query = 'SELECT * FROM tbl_users 
					  WHERE email = "'. $username .'" 
						AND password = "'. $password .'"';
            $result = $mysqli->query($query);
            $item = $result->fetch_object();

            //if I get a result it means the credentials are right.
            if( $result->num_rows === 1 ){
                $this->message   = $result;
                $this->username  = $username;
                $this->status    = True;
                $this->userlevel = $item->userlevel;
                $this->id        = $item->id;
            }else{
                $this->status = False;
                $error->setCustomError("Username or password are wrong!", "danger");
            }
        }

        //if status is true then we can set the session
        public function setSession()
        {
            if( $this->status === True ){
                $_SESSION['id']        = $this->id;
                $_SESSION['username']  = $this->username;
                $_SESSION['userlevel'] = $this->userlevel;
                $_SESSION['status']    = True;
            }else{
                $_SESSION['status'] = False;
            }
        }

        //Setting the user status to 0
        public function setStatus()
        {
            $mysqli = $this->connect();

            $userId = $_SESSION['id'];
            $query = "UPDATE tbl_user SET status = 0 WHERE id = '$userId'";
            $mysqli->query($query);
        }

        public function logOut($location)
        {
            $this->setStatus();
            if( isset( $_SESSION['status'] ) ){
                session_destroy();
            }
            header( "location:". $location );
        }

        public function lock($location, $oldLocation)
        {
            if( !isset( $_SESSION['status'] ) || $_SESSION['status'] == False ){
                $_SESSION['oldLocation'] = $oldLocation;
                $this->moveTo($location);
            }
        }

        public function moveTo($location)
        {
            header( "location:" . $location );
        }

        public function changePass($oldPass, $newPass)
        {
            
        }

        public function ifAdmin (){
            if (isset($_SESSION['userlevel']) && $_SESSION['userlevel'] == 0) 
            {
                return true;
            } else {
                return false;
            }
        }

        public function checkUserLevel($userlevels) 
        {
            if (isset($_SESSION['userlevel'])) {
                if(in_array($_SESSION['userlevel'], $userlevels)){
                    return true;
                }else{
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

        public function addMember_Project(){

            if(isset($_POST['btnProjectAddMember'])){
                $mysqli = $this->connect();

                $selectUser = $_POST['selectedUserA'];
                $selectProject = $_POST['selectedUserA'];
                $query = 'INSERT INTO tbl_users_projects (FK_users_id, FK_projects_id) VALUES ('.$selectUser.','.$selectProject.')';
                $mysqli->query($query);
            }

        }

        public function removeMember_Project(){

            if(isset($_POST['btnProjectRemoveMember'])) {
                $mysqli = $this->connect();

                $selectProjectID = $_POST['selectedUserIDR'];
                $query = 'DELETE FROM tbl_users_projects WHERE id='.$selectProjectID.'';
                $mysqli->query($query);
            }

        }

        public function getUsers($select, $where){
            $mysqli = $this->connect();
            $query = 'SELECT ' . $select . ' FROM tbl_users WHERE '. $where.'';
            $result = $mysqli->query($query);
            while($items = $result->fetch_assoc()){
                $data[] = $items;
            }
            return $data;
        }

    }


?>