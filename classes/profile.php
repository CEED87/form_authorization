<?php

    session_start();
    
    class Profile extends ConnectDb 
    {
        private $usersDB;
        private $login; 
        private $password;
        private $profile;
        private $user;

        function __construct($data) 
        {
            $this->user = $data;
        }

        private function checkUser() 
        {
            $data = json_decode($this->user, true);
            $solt = 'RbdtEWjm';

            $this->usersDB = $this->getUsers();
            $this->login = $data['login']; 
            $this->password = $data['password'];

            if ($this->login == '' || $this->password == '') {
                $this->profile = 1;
                return $this->profile;
            }
          
            foreach ($this->usersDB as $key => $value) {
                if ($value['login'] === $this->login && $value['password'] === $solt . md5($this->password)) {
                    $this->profile = ['name' => $value['full_name'], 'login' => $value['login'], 'password' => $value['password']];
                    break;
                } else {
                    $this->profile = NULL;
                }
                 
            }
            return $this->profile;
        }

        public function getUser() 
        {
            if (gettype($this->checkUser()) == 'integer') {
                echo $this->checkUser();         
            } elseif (gettype($this->checkUser()) == 'array') {
               
                $name = $this->checkUser()['name'];
                $login = $this->checkUser()['login'];
                $password = $this->checkUser()['password'];

                setcookie('password', $password, 0, '/');
                setcookie('login', $login, 0, '/');
                $_SESSION['user'] = $name;
                echo $name;  
            }
             else {
                echo 0;
            }
        }   
    }

?>