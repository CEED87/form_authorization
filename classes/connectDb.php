<?php

    class ConnectDb 
    {
        private $jsonArr;
    
        protected function getUsers() 
        {
            $this->jsonArr = json_decode(file_get_contents('users.json'), true);    
            return $this->jsonArr;
        }
    }

?>    