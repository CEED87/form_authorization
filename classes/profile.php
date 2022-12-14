<?php

    session_start();
    
    class Profile extends ConnectDb 
    {
        private $usersDB;
        private $login; 
        private $password;
        private $profile;
        private $user;

        private $data;

        function __construct($data) 
        {
            $this->user = $data;
        }

        private function checkUser() 
        {
            $this->data = json_decode($this->user, true);
            $solt = 'RbdtEWjm';

            $this->usersDB = $this->getUsers();
            $this->login = $this->data['login']; 
            $this->password = $this->data['password'];

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
                echo json_encode($this->data,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);

            } elseif (gettype($this->checkUser()) == 'array') {
               
                $name = $this->checkUser()['name'];
                $login = $this->checkUser()['login'];
                $password = $this->checkUser()['password'];

                setcookie('password', $password, 0, '/');
                setcookie('login', $login, 0, '/');
                $_SESSION['user'] = $name;
        
                echo json_encode($this->checkUser(),JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
            }
             else {
                $this->data = ['user' => 'not found'];
                echo json_encode($this->data);
            }
        }   
    }

?>