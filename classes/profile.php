<?php

    session_start();
    
    class Profile extends ConnectDb 
    {
        private $usersDB;
        private $login; 
        private $password;
        private $profile;
        private $user;

        public function __construct($data) 
        {
            $this->user = $data;
        }

        public function checkUser() 
        {
            $data = json_decode($this->user, true);
            $solt = 'RbdtEWjm';
// 
            $this->usersDB = $this->getUsers();
            $this->login = $data['login']; 
            $this->password = $data['password'];
          

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



        public function getUser() {

         
            // $www = json_decode($this->user, true);
            // print_r(json_decode(file_get_contents($this->user, true)));

            // $fff = $this->checkUser();


            // var_dump($this->checkUser());
            

            
            if ($this->checkUser()) {

                $name = $this->checkUser()['name'];
                $login = $this->checkUser()['login'];
                $password = $this->checkUser()['password'];
                
                setcookie('password', $password, 0, '/');
                setcookie('login', $login, 0, '/');
                $_SESSION['user'] = $name;
                
                // return header('Location: ./userAccount.php'); 
                echo $name;            
            }  else {
                // $_SESSION['message'] = 'Не верный логин или пароль';
                // return header('Location: authorization.php');
                echo 0;
            }  
        }
    }

?>