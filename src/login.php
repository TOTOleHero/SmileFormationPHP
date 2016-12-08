<?php

require_once('../lib/user-data.lib.php');
require_once('../lib/checksession.lib.php');

$error_msg = "";    

if (isset($_POST["login"]) && isset($_POST["password"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    if (checkUser($login, $password)) {
        createSession(getUser($login));
        header("Location: /src/showPlanning.php");
    }
    else {
        $error_msg = 'login incorrect';
    }
}

include('../html/login.html.php');


