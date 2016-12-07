<?php
include '../html/subscribe.html.php';
require_once '../lib/user-data.lib.php';

$login = isset($_POST['login']);
$password = $_POST['password'];
$name = $_POST['name'];
$error = FALSE;

//je vérifie que toutes les info du formulaire sont là
if (!empty($login) && !empty($password) && !empty($name)) {


    createUser($login, $password, $name);
    header("Location: login.php");

}