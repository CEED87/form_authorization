<?php
     session_start();
    class Profile extends ConnectDb 
    {
        private $usersData;
        private $login; 
        private $password;
        private $profile;

        public static function getInstance() 
        { 
            static $instance;
            if (!isset($instance)) $instance = new self; 
            return $instance;
        }

        private function checkUser() {

            $solt = 'RbdtEWjm';

            $this->usersData = $this->getUsers();
            $this->login = $_POST['login']; 
            $this->password = $solt . md5($_POST['password']);

            foreach ($this->usersData as $key => $value) {
                if ($value['login'] === $this->login && $value['password'] === $this->password) {
                    $this->profile = ['name' => $value['full_name'], 'login' => $value['login'], 'password' => $value['password']];
                    break;
                } else {
                    $this->profile = NULL;
                }
            }
            return $this->profile;
        }

        public function getUser() {

            $name = $this->checkUser()['name'];
            $login = $this->checkUser()['login'];
            $password = $this->checkUser()['password'];
    
            if ($this->checkUser()) {
                setcookie('password', $password, time() + 3600, '/');
                setcookie('login', $login, time() + 3600, '/');
                $_SESSION['user'] = ["full_name" => $name];
                
                return header('Location: /pages/userAccount.php');             
            } else {
                $_SESSION['message'] = 'Wrong login or password';
                return header('Location: /pages/authorization.php');
            }  
        }
    }

?>