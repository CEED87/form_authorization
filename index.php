<?php

    session_start();

    require_once "autoload/autoload.php";

    FrontController::getInstance()->route();








