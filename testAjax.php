<?php
$json ;
require_once "autoload/autoload.php";

    if (@$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
	    $json = json_encode($_POST, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
        // $json = @$_SERVER['HTTP_X_REQUESTED_WITH'];

        // require_once 'classes/NewUserRegistration.php';
        NewUserRegistration::getInstance()->addUser();

    } else {
        $json = false;
    }
 
echo $json;


    // $json = json_encode($_POST, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);

// var_dump($_POST);



// var_dump($json);

// print_r(@$_SERVER['HTTP_X_REQUESTED_WITH']);
// $request = $_POST['dataForm'];

// echo "<pre>";
// print_r($json);
// echo "</pre>";

