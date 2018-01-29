<?php

	class user extends db{

        //standard login function which calles for the checked and the session set as well
        public function login( $username, $password, $location ){
            $this->checkCredentials( $username, $password );
            $this->setSession();
            $this->moveTo( $location );
        }

        public function error( $message, $sort ){
            echo '<div style="width:500px;height:50px;margin-bottom:50px;margin-left:50px;posistion:fixed;" class="my-alert-message alert alert-'.$sort.' alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    '.$message.'
                  </div>';
        }

        //function to add the user to the database
        public function addUser(){
            $mysqli = $this->Connect();

            //if the register button is clicked proceed with adding the user
            if(isset($_POST['register'])){

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
                        $prepos = !empty($prepos) ? "'$prepos'" : "NULL";

                        $insertUser = $mysqli->query("INSERT INTO tbl_users (email, password, userlevel, tel, firstName, lastName, preposition, city, address, zipCode) 
                                                      VALUES ('$email','$password','$userlvl','$telnumber','$firstname',$lastname,$prepos,$city,$address,$zipcode)");

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
        public function checkCredentials( $username, $password ){
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

            //if I get a result it means the credentials are right.
            if( $result->num_rows === 1 ){
                $this->message  = $result;
                $this->username = $username;
                $this->status   = True;
            }else{
                $this->status = False;
            }
        }

        //if status is true then we can set the session
        public function setSession(){
            if( $this->status === True ){
                $_SESSION['username'] = $this->username;
                $_SESSION['userlvl']  = $this->userlevel;
                $_SESSION['status']   = True;
            }else{
                $_SESSION['status'] = False;
            }
        }

        public function logOut( $location ){
            if( isset( $_SESSION['status'] ) ){
                $_SESSION['status'] = False;
            }
            header( "location:". $location );
        }

        public function lock( $location, $oldLocation ){
            if( !isset( $_SESSION['status'] ) || $_SESSION['status'] == False ){
                $_SESSION['oldLocation'] = $oldLocation;
                $this->moveTo($location);
            }
        }

        public function moveTo( $location ){
            header( "location:" . $location );
        }

        public function changePass( $oldPass, $newPass ){

        }
    }


?>