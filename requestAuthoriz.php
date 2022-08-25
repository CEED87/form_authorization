<?php
    $json;
    require_once "autoload/autoload.php";

    if (@$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
	    $json = json_encode($_POST, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
    
        (new Profile($json))->getUser();
     
    } else {
         $json = false;
    }

