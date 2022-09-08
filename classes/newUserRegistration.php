<?php
    session_start();

    class NewUserRegistration extends ConnectDb 
    {
        private $userData;
        private $userDatabase;
        private $state;
        
        function __construct($userData) 
        {
            $this->userData = $userData;
        }

        public function addUser() 
        {
            $json = json_decode($this->userData, true);
            $solt = 'RbdtEWjm';

            $this->userData = [
                'full_name' => $json['full_name'],
                'login' => $json['login'],
                'email' => $json['email'],
                'password' => $json['password'],
                'password_confirm' => $json['password_confirm']
            ];

            foreach($this->userData as $key => $value) {
                if ($value == '') {
                    // $this->state = '3';
                    $this->userData['ttt'] = [$key => 'empty'];
                    echo json_encode($this->userData,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
                    // $this->state = json_encode($this->userData,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE)
                    // echo $this->state;
                    exit();
                }
            }

            $this->userDatabase = $this->getUsers();

            if ($this->userData['password'] === $this->userData['password_confirm']) {

                $this->userData['password'] = $solt . md5($this->userData['password']);
                $this->userData['password_confirm'] = $solt . md5($this->userData['password_confirm']);
               
                foreach ($this->userDatabase as $key => $value) {
                    if ($value['login'] === $this->userData['login']) {
                        $this->state = '0';
                        echo $this->state;
                        exit();
                    } elseif ($value['email'] === $this->userData['email']) {
                        $this->state = '2';
                        echo $this->state;
                        exit();
                    } 
                }
                $this->userDatabase[] = $this->userData;
                file_put_contents('users.json', json_encode($this->userDatabase, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE));
        
                $this->state = '1';
                echo $this->state;
            } 
        }
    }

?>