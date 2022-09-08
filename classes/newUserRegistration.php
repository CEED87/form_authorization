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
                    
                    $this->userData['empty'] = [$key => 'empty'];
                    echo json_encode($this->userData,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
                    exit();
                }
            }

            $this->userDatabase = $this->getUsers();

            if ($this->userData['password'] === $this->userData['password_confirm']) {

                $this->userData['password'] = $solt . md5($this->userData['password']);
                $this->userData['password_confirm'] = $solt . md5($this->userData['password_confirm']);
               
                foreach ($this->userDatabase as $key => $value) {
                    if ($value['login'] === $this->userData['login']) {

                        $this->userData['user'] = [$value['login'] => 'exist'];
                        echo json_encode($this->userData,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
                        exit();

                    } elseif ($value['email'] === $this->userData['email']) {

                        $this->userData['Email'] = [$value['email'] => 'exist'];
                        echo json_encode($this->userData,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
                        exit();
                    } 
                }
                $this->userDatabase[] = $this->userData;
                file_put_contents(__DIR__ . '/users.json', json_encode($this->userDatabase, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE));
  
                $this->userData['status'] = 'successfully';
                echo json_encode($this->userData,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
            } 
        }
    }

?>