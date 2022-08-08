<?php
    
    class FrontController 
    {
        private $url;
        private $httpMethod;

        public static function getInstance() 
        { 
            static $instance;
            if (!isset($instance)) $instance = new self; 
            return $instance;
        }

        private function __construct() 
        {
            $this->url = $_SERVER['REDIRECT_URL'] ?? '/';
            $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        }

        private function getURL() 
        { 
            return $this->url;
        }

        private function getHTTPMethod() 
        {
            return $this->httpMethod;
        }

        public function route() 
        {
            if ($this->getURL() === '/register' && $this->getHTTPMethod() === 'POST') 
            {
                NewUserRegistration::getInstance()->addUser(); 
            }
            elseif ($this->getURL() === '/authorization' && $this->getHTTPMethod() === 'POST') 
            {
                Profile::getInstance()->getUser();
            }
        }
    }

?>