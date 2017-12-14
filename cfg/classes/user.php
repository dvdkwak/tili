<?php

	class user extends db{

        //standard login function which calles for the check and the session set as well
        public function login( $username, $password, $location ){
            $this->checkCredentials( $username, $password );
            $this->setSession();
            $this->moveTo( $location );
        }

        //Let us just say here things get serious
        public function checkCredentials( $username, $password ){
            $mysqli = $this->connect();

            //real_escape_string to prevent sql injection
            $username = $mysqli->real_escape_string( $username );
            $password = $mysqli->real_escape_string( $password );

            //hashing the 'password' value
            $password = hash( 'sha256', $password );

            $query = 'SELECT * FROM tbl_users 
					  WHERE username = "'. $username .'" 
						AND password = "'. $password .'"';
            $result = $mysqli->query($query);

            //if I get a result it means the credentials are right.
            if( $result->num_rows === 1 ){
                $this->message = $result;
                $this->username = $username;
                $this->status = True;
            }else{
                $this->status = False;
            }
        }

        //if status is true then we can set the session
        public function setSession(){
            if( $this->status === True ){
                $_SESSION['username'] = $this->username;
                $_SESSION['status'] = True;
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
                header( "location:". $location );
            }
        }

        public function moveTo( $location ){
            header( "location:" . $location );
        }

        public function changePass( $oldPass, $newPass ){
            $mysqli = $this->connect();

            if( !isset( $_SESSION['loggedIn'] ) || $_SESSION['loggedIn'] === False ){
                $return = "U moet eerst ingelogd zijn om uw wachtwoord te kunnen veranderen.";
                return $return;
            }else{
                $oldPass = $mysqli->real_escape_string( $oldPass );
                $newPass = $mysqli->real_escape_string( $newPass );

                $oldPass = hash( "sha256", $oldPass );
                $newPass = hash( "sha256", $newPass );

                $query = 'SELECT * FROM tbl_users
					  WHERE username = "'. $_SESSION['username'] .'" 
						AND password = "'. $oldPass .'"';
                $result = $mysqli->query( $query );

                if( $result->num_rows === 1 ){
                    $query = 'UPDATE tbl_users
								 SET password = "'. $newPass .'"
							   WHERE username = "'. $_SESSION['username'] .'"';
                    $mysqli->query( $query );
                    $return = "geslaagd!";
                }else{
                    $return = "Verkeerde wachtwoord Ingevult!";
                }
                $this->message = $return;
            }
        }
    }


?>