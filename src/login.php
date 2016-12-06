<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../lib/user-data.lib.php');
require_once('../lib/checksession.lib.php');


$login = $_POST["login"];
$password = $_POST["password"];
$error_msg = "";
if (checkUser($login, $password)) {


    createSession();

    header("Location: /src/showPlanning.php");
} else {

    $error_msg = 'login incorrect';
}



require('../html/login.html.php');
