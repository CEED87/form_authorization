<?php
    
    class ConnectDb 
    {
        private $jsonArr;
    
        protected function getUsers() 
        {
            $this->jsonArr = json_decode(file_get_contents(__DIR__ . '/users.json'), true);    
            return $this->jsonArr;
        }
    }

?>    