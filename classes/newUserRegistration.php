<?php
     session_start();
    class NewUserRegistration extends ConnectDb 
    {
        private $userData;
        private $userDatabase;
        private $ttt;


        public static function getInstance() 
        { 
            static $instance;
            if (!isset($instance)) $instance = new self; 
            return $instance;
        }

        function __construct() 
        {
            $solt = 'RbdtEWjm';
            $this->userData = [
                'full_name' => $_POST['full_name'],
                'login' => $_POST['login'],
                'email' => $_POST['email'],
                'password' => $solt . md5($_POST['password']),
                'password_confirm' => $solt . md5($_POST['password_confirm'])
            ];
            
        }

        public function getFormRegistr()
        {
            $_SESSION['message'] = '';
            $_SESSION['user'] = '';
            header('Location: /pages/register.php'); 
        }

        public function addUser() 
        {
            $this->userDatabase = $this->getUsers();

            if ($this->userData['password'] === $this->userData['password_confirm']) {
                foreach ($this->userDatabase as $key => $value) {
                    if ($value['login'] === $this->userData['login']) {
                        $_SESSION['message'] = 'User with this login already exists!';
                        header('Location: /pages/register.php');
                        exit();
                    }  
                }
                $this->userDatabase[] = $this->userData;
                file_put_contents('users.json', json_encode($this->userDatabase, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE));
        
                $_SESSION['message'] = 'Registration completed successfully!';

                return  header('Location: /pages/authorization.php');
        
            } else {
                return header('Location: /pages/register.php');
            }
        }
    }

?>