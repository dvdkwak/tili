<?php

	class requests extends db
    {

        //retrieving a list of requested projects from the database
        public function getRequests()
        {
            $mysqli = $this->Connect();

            //Getting all the projects where the isRequest is 1
            $query = 'SELECT * FROM tbl_projects WHERE isRequest = "1"';
            $result = $mysqli->query($query);
            while ($item = $result->fetch_assoc()) {
                $data[] = $item;
            }

            //Creating a foreach loop that displays all the results
            if (isset($data)) {
                return $data;
            }


        }

        public function acceptRequests()
        {
            $mysqli = $this->Connect();

            $error = new errorHandling();

            if (isset($_POST['btnAcceptRequest'])) {
                $projectId = $_POST['requestID'];

                $query = 'UPDATE tbl_projects SET isRequest = "0" WHERE id =' . $projectId;
                if ($mysqli->query($query)) {
                    //$this->sendAcceptMail($projectId);
                    $error->setCustomError("Project succesfull accepted!", "success");
                }
            }
        }

        public function deleteRequests()
        {
            $mysqli = $this->Connect();

            $error = new errorHandling();

            if (isset($_POST['btnDeleteRequest'])) {
                $projectId = $_POST['requestID'];
                $query = 'UPDATE tbl_projects SET isRequest = "2" WHERE id =' . $projectId;

                if ($mysqli->query($query)) {
                    $this->sendDeclineMail($projectId);
                    $error->setCustomError("Project succesfull deleted!", "success");
                }
            }
        }

        public function redirectUser()
        {
            if (!$_SESSION['userlevel'] == 0) {
                header("Location: /admin/projecten");
            }
        }

        public function getUserMail($projectId)
        {
            $mysqli = $this->Connect();

            $query = "SELECT c.email FROM tbl_projects AS a 
                      INNER JOIN tbl_users_projects AS b ON a.id = b.FK_projects_id
                      INNER JOIN tbl_users AS c ON b.FK_users_id = c.id
                      WHERE c.userlevel = 2 AND a.id = '$projectId'";
            $result = $mysqli->query($query)->fetch_object();
            $email = $result->email;

            return $email;
        }

        public function sendAcceptMail($projectId)
        {
            $email = $this->getUserMail($projectId);
            $to = $email;
            $subject = "Aanvraag project TiliT";
            $from = "info@tilit.nl";

            // Message
            $message = '<html>
                        <head>
                        </head>
                        <body>
                        <img src="http://tilit.nl/assets/images/TiliT_Logo2.png" alt="TiliT Logo" height="100" width="320">
                        <p>Bericht:</p>
                        <p>Uw project is succesvol geaccepteerd</p>
                        </body>
                        </html>
                        ';

            // To send HTML mail, the Content-type header must be set
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'From: ' . $from;

            // Mail it
            mail($to, $subject, $message, implode("\r\n", $headers));
        }

        public function sendDeclineMail($projectId)
        {
            $email = $this->getUserMail($projectId);
            $to = $email;
            $subject = "Aanvraag project TiliT";
            $from = "info@tilit.nl";

            // Message
            $message = '<html>
                        <head>
                        </head>
                        <body>
                        <img src="http://tilit.nl/assets/images/TiliT_Logo2.png" alt="TiliT Logo" height="100" width="320">
                        <p>Bericht:</p>
                        <p>De aanvraag voor uw project is helaas geweigerd, neem contact met ons op voor verdere informatie.</p>
                        </body>
                        </html>
                        ';

            // To send HTML mail, the Content-type header must be set
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'From: ' . $from;

            // Mail it
            mail($to, $subject, $message, implode("\r\n", $headers));
        }
    }