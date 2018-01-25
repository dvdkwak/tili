<?php

	class projects extends db{

        //retrieving a list of project from the database
        public function getProjects(){
            $query = 'SELECT * FROM tbl_projects 
                      ';
            $result = $mysqli->query($query);
        }


        
        
    }


?>