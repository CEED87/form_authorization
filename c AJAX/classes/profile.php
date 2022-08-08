<?php

    // session_start();
    
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

        private function checkUser() 
        {
            $data = json_decode($this->user, true);

            $this->usersDB = $this->getUsers();
            $this->login = $data['login']; 
            $this->password = 'solt' . md5($data['password']);


            // $this->login = $_POST['login']; 
            // $this->password = 'solt' . md5($_POST['password']);

            foreach ($this->usersDB as $key => $value) {
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

        
            // $www = json_decode($this->user, true);
            // print_r(json_decode(file_get_contents($this->user, true)));

            // $fff = $this->checkUser();


            // $name = $this->checkUser()['name'];
            // $login = $this->checkUser()['login'];
            // $password = $this->checkUser()['password'];

            echo "jdwfefwgefhj";
            var_dump($this->checkUser());
            // echo "<pre>";
            
            // print_r(['password' => $password, 'login' => $login]);
            // echo "</pre>";
            
            
            // if ($this->checkUser()) {

                // var_dump($this->checkUser());
            //     setcookie('password', $password, 0, '/');
            //     setcookie('login', $login, 0, '/');
            //     $_SESSION['user'] = ["full_name" => "Hello {$name}"];
                
            //     return header('Location: ../userAccount.php');             
            // }  else {
            //     $_SESSION['message'] = 'Не верный логин или пароль';
            //     return header('Location: authorization.php');
            // }  
        }
    }

?>